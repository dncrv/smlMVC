<?php

class Controller{

    public $viewName;
    public $viewData;

    function __construct(){
        
    }

    public function render(string $viewTemplateName, Array $vData = []){
        $this->viewData = $vData;
        $this->viewName = $viewTemplateName;
        include_once(__DIR__."/views/V-".$this->viewName.".php") ;
    }

    public function model(){

    }

}