<?php

class Twig {
  static public function render($template, $data = array()){
    $loader = new \Twig\Loader\FilesystemLoader('view');
    $twig = new \Twig\Environment($loader, array('auto_reload' => true,'cache' => false));
    $twig->addGlobal('path', 'http://localhost/1_PROG_PHP_WEB_AVANCEE/1-3_TP/TP2/TP2_Hala_Kouidri_1353390/');
    echo $twig->render($template, $data);
  }
}