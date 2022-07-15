<?php

class View{
    private $data = array();
    private $render = FALSE;

    public function __construct($template)
    {
        try{
            $file = 'view/'.$template.'.php';
            if(file_exists($file)){
                $this->render = $file;
            }else{
                throw new Exception($file.' introuvable ...');
            }
        }
        catch (Exception $e){
            echo $e->getMessage();
            exit();
        }
    }

    public function output($variable, $value)
    {
        $this->data[$variable] = $value;
    }

    public function __destruct(){
        extract($this->data);
        include($this->render);
    }
}