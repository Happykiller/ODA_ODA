<?php

require 'vendor/autoload.php';

define('content_path', getcwd() . DIRECTORY_SEPARATOR . 'content');
define('layout_path', getcwd() . DIRECTORY_SEPARATOR . 'layout');

$app = new \Slim\Slim(['debug' => true]);

$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(content_path));

$files = new RegexIterator($files, '/^.+\.yaml/i', RecursiveRegexIterator::GET_MATCH);

foreach($files as $file){
    $file = $file[0];
    $page = new \App\Page($file);
    $app->any($page->path, function() use ($page, $app){
        $pathHelper = getcwd() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'helpers.php';
        require $pathHelper;
        echo $page->render();
    });
}

$app->run();