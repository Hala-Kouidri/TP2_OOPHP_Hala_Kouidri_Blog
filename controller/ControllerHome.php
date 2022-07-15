<?php

class ControllerHome{

    public function index(){
       return Twig::render('home-index.php', ['nom' => 'Pan',
                                              'prenom' => 'peter'
                                            ]);
    }

    public function error(){
        return Twig::render('error.php');
    }
}