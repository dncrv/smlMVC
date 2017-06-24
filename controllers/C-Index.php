<?php 

class Index extends Controller{
    function __construct(){
    }

    public function index(Array $dados = []){
        $this->render('Index', ['title' => 'teste']);
    }


}