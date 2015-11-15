<?php

require '../vendor/autoload.php';

define('content_path', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'doc' . DIRECTORY_SEPARATOR . 'content');
define('layout_path', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'doc' . DIRECTORY_SEPARATOR . 'layout');

$app = new \Slim\Slim(['debug' => true]);

$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(content_path));
$files = new RegexIterator($files, '/^.+\.yaml/i', RecursiveRegexIterator::GET_MATCH);

foreach($files as $file){
    $file = $file[0];
    $page = new \App\Page($file);
    $page->rootUrl = "../";
    $app->any($page->getUrl(), function() use ($page, $app){
        echo $page->render();
    });
}

$app->run();