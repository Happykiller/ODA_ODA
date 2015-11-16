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
    public $url;
    public $path;
    public $content;
    public $keys;
    public $type = 'html';

    public function __construct($url)
    {
        $this->url = $url;
        $pos = strpos($url, 'markdown');
        if($pos){
            $this->type = 'markdown';
        }
        $this->path = $this->getUrl($url);
        $this->keys = $this->getKeys();
        $this->content = $this->getContent();
    }

    public function getUrl($url){
        $path = str_replace(content_path, '', $url);
        $path = str_replace('.yaml', '', $path);
        $path = str_replace('.html', '', $path);
        $path = str_replace('.markdown', '', $path);
        $path = str_replace('index', '', $path);
        $path = str_replace('\\', '/', $path);
        return $path;
    }

    public function render(){
        $page = $this;
        $template = layout_path . DIRECTORY_SEPARATOR . $this->keys['template'] .'.php';
        ob_start();
        require $template;
        return ob_get_clean();
    }

    public function getContent(){
        $doc = Parser::parse(file_get_contents($this->url));
        $parser = new GithubMarkdown();
        $parser->enableNewLines = true;
        //https://help.github.com/articles/markdown-basics/
        //https://help.github.com/articles/github-flavored-markdown/
        return $parser->parse($doc->getContent());
    }

    public function getKeys(){
        $doc = Parser::parse(file_get_contents($this->url));
        return $doc->getConfig();
    }

    public function getKey($key){
        return $this->keys[$key];
    }
}