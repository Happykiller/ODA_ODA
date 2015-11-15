<?php
/**
 * Created by PhpStorm.
 * User: Happykiller
 * Date: 15/11/2015
 * Time: 19:10
 */

namespace App;

use VKBansal\FrontMatter\Parser;
use VKBansal\FrontMatter\Document;
use \cebe\markdown\GithubMarkdown;


class Page
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getUrl(){
        $path = str_replace(content_path, '', $this->path);
        $path = str_replace('.yaml', '', $path);
        $path = str_replace('index', '', $path);
        $path = str_replace('\\', '/', $path);
        return $path;
    }

    public function render(){
        $page = $this;
        ob_start();
        require layout_path . DIRECTORY_SEPARATOR . 'default.php';
        return ob_get_clean();
    }

    public function getContent(){
        $doc = Parser::parse(file_get_contents($this->path));
        $parser = new GithubMarkdown();
        $parser->enableNewLines = true;
        //https://help.github.com/articles/markdown-basics/
        //https://help.github.com/articles/github-flavored-markdown/
        return $parser->parse($doc->getContent());
    }

    public function getKey($key){
        $doc = Parser::parse(file_get_contents($this->path));
        return $doc->getConfig()[$key];
    }
}