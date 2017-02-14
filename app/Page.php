<?php
/**
 * User: fabrice.rosito
 * Date: 17-01-27
 */

namespace App;

use VKBansal\FrontMatter\Parser;
use VKBansal\FrontMatter\Document;
use \cebe\markdown\GithubMarkdown;


class Page{
    public $url;
    public $path;
    public $content;
    public $keys;
    public $type;
    public $lang;
    public $doc;

    public function __construct($url){
        $this->url = $url;
        $path = str_replace(content_path, '', $url);
        $tab_options = explode ('.',$path);
        $this->type = $tab_options[sizeof($tab_options)-1];
        $this->lang = $tab_options[sizeof($tab_options)-2];
        $path = str_replace('index', '', $tab_options[0]);
        $this->path = str_replace('\\', '/', $path);
    }

    public function render(){
        //get yaml
        $this->doc = Parser::parse(file_get_contents($this->url));
        $this->keys = $this->doc->getConfig();
        $this->content = $this->getContent();

        $pathHelper = getcwd() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'helpers.php';
        $template = layout_path . DIRECTORY_SEPARATOR . $this->keys['template'] .'.php';
        
        $page = $this;
        ob_start();
        require $pathHelper;

        //full the template with helpers function and info of the page
        require $template;

        //provide html
        return ob_get_clean();
    }

    public function getContent(){
        //get code for remplacement
        $pathTab = explode(DIRECTORY_SEPARATOR,$this->url);
        $pathSources = $pathTab[0];
        for ($i = 1; $i < count($pathTab)-1; $i++) {
            $pathSources .= DIRECTORY_SEPARATOR . $pathTab[$i];
        }
        $pathSources .= DIRECTORY_SEPARATOR . "code.source";

        if (file_exists($pathSources)) {
            $sources = file_get_contents($pathSources);
        }

        $pattern = '/\{\{code:(.*?)\}/';
        preg_match_all($pattern, $this->doc, $matches);

        //get the content of yaml
        $truc = $this->doc->getContent();

        //remplace tag by code
        if(isset($matches[1]) && count($matches[1]) != 0){
            foreach ($matches[1] as $value){
                $pattern = '/code:'.$value.':begin(.*?)code:'.$value.':end/ms';
                preg_match_all($pattern, $sources, $matches2);

                $truc = str_replace("{{code:".$value."}}",$matches2[1][0],$truc);
            }
        }

        //parse recult with markdown to html
        $parser = new GithubMarkdown();
        $parser->enableNewLines = true;
        return $parser->parse($truc);
    }

    //provide key from the list
    public function getKey($key){
        return $this->keys[$key];
    }
}