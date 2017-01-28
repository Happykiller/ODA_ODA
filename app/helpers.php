<?php
//for provide function in page

function url($path){
    global $app;
    return $app->request->getRootUri() . '/' . trim($path,'/');
}