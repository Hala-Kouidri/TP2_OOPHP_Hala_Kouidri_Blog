<?php

class RequirePage{
    static function requireModel($page){
        return require_once 'model/Model'.$page.'.php';
    }

    static function redirect($url){
        header("location: http://localhost/1_PROG_PHP_WEB_AVANCEE/1-3_TP/TP2/TP2_Hala_Kouidri_1353390/$url");
    }

    static function requireLibrary($page){
        return require_once 'library/'.$page.'.php';
    }
}