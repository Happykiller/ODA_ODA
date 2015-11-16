<?php

function url($path){
    global $app;
    return $app->request->getRootUri() . '/' . trim($path,'/');
}