<?php

class View{

    public $vData = array();

    function __construct(Array $controllerData = []){
        $this->vData = $controllerData;
        include_once(__DIR__."/template/TP-Header.php");
    }

    protected function insertTemplate(string $template, $repeat = 1 , $t_data = ""){
        for($x = 0; $x < $repeat ; $x++){
            include(__DIR__."/template/TP-".$template.".php");
        }
    }

    protected function insertComponent(string $component, $repeat = 1 , $t_data = ""){
        for($x = 0; $x < $repeat ; $x++){
            include(__DIR__."/component/CP-".$component.".php");
        }
    }

}