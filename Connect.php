<?php

class Connect {

    private $conn;
    private $server;
    private $database;
    private $user;
    private $pass;

    function __construct(string $server = "", 
                            string $dataBase = "", 
                                string $user = "", 
                                    string $pass = ""){

        $this->server   = $server;
        $this->dataBase = $dataBase;
        $this->user     = $user;
        $this->pass     = $pass;
        
    }

    function start(){
        //Tenta Conectar
        try {
            //Inicia Conexao
            $this->conn = new PDO('mysql:host='.$this->server.';dbname='.$this->database,$this->user,$this->pass);
            //Seta as informações do ERRO
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } 
        //Caso a conexão tenha falhado
        catch(PDOException $e) {
            //Apresenta o Erro de Conexão
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}