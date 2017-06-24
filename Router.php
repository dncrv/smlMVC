<?php


class Router{

    private $URI;
    private $controller;
    private $function;
    private $data = [];
    private $numberPartsUri;

    function __construct(){
        $this->URI = $_SERVER['REQUEST_URI'];
        $url = explode('/', $this->URI);
        //Ajusta dados URI
        $this->routeMount($url);
        $this->numberPartsUri($url);
    }





    private function routeMount($uriData){
        $this->numberPartsUri = sizeOf($uriData);

        if(isset($uriData[1]))
            $this->controller = $uriData[1];
        if(isset($uriData[2]))
            $this->function = $uriData[2];
        if(isset($uriData[3])){
            $cont2 = 0;
            for($cont = 3; $cont < sizeof($uriData); $cont++){
                $this->data[$cont2] = $uriData[$cont];
                $cont2++;
            }
        }
    }

    private function numberPartsUri($uriData){
        $this->numberPartsUri = sizeOf($uriData);
    }

    private function convertDataToString(Array $data){
        $dataAux = "[";
                if(sizeOf($data) != 0){
                    for($x = 0; $x < sizeOf($data); $x++){
                        $dataAux .= $data[$x];
                        if((sizeOf($data) - 1) == $x){
                            $dataAux .= "]";
                        } else{
                            $dataAux .= ",  ";
                        }
                    }
                } else{
                    $dataAux = "";
                }
        return $dataAux;
    }
    


    public function getURI(){
        return $this->URI;
    }

    public function getController(){
        return $this->controller;
    }

    public function getFunction(){
        return $this->function;
    }


    public function redirect(string $controller = "", string $function = "", Array $data = []){

        try {
            //Testa se Existe o controller
            if (! @include_once(__DIR__."/controllers/C-".$controller.".php"))
                throw new Exception ($controller." Não Existe...");

            if (!file_exists(__DIR__."/controllers/C-".$controller.".php" ))
                throw new Exception ($controller." Não Existe...");

            // Se existe o Controller    
            else{
                
                //Cria Importa o Controller
                include_once(__DIR__."/controllers/C-".$controller.".php"); 
                //Organiza os dados e transforma em uma STRING
                $dataAux = $this->convertDataToString($data);
                //Cria a nova Pagina
                $classe = ucfirst($controller);
                eval("$"."novaPagina = new ".$classe."();");
                //Faz a validação e Virificação do metodo
                if($function != "")
                    if(method_exists($novaPagina, $function))
                        eval("$"."novaPagina"."->".$function."(".$dataAux.");");
                    else
                        include_once(__DIR__."/404.php");   
                else
                    eval("$"."novaPagina"."->"."index(".$dataAux.");");
            }
        //Caso nao exista o controller, retorna os erros
        }
        catch(Exception $e) {    
            include_once(__DIR__."/404.php"); 
        }
    }

    public function createRoute(){
        try {
            if($this->controller == ""){
                $this->redirect('Index');
            }else{
                if($this->numberPartsUri > 3){
                    $this->redirect($this->controller, $this->function, $this->data);
                } else{
                    if($this->numberPartsUri == 3){
                        $this->redirect($this->controller, $this->function);
                    } else {
                        $this->redirect($this->controller);
                    }
                }
            }
        }
        catch(Exception $e){
            echo 'Diretorio Inesistente!';
            echo $e->getMessage();
        }
    }

}