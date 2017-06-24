<?php 

class Teste extends Controller{
    function __construct(){
    }

    public function index(Array $dados = []){
        $this->render('Teste', [1,2,3,'daniel']);
    }

    public function teste2(Array $dados = []){
        $this->render('Teste2', [1,2,3,'daniel']);
    }

}