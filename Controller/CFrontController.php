<?php
/**
 * Class CFrontController si occupa di istanziare il giusto controllore e il relativo metodo basandosi sull'URL ricevuta
 * /MyRecipes-Web/controller/metodo/parametro
 */

class CFrontController
{
    /**
     * Metodo che dalla URL recupera il controllore da istanziare e il relativo metodo con parametro
     * /myRecipes-Web/controller/metodo/param
     */
    public function run(){

        $path = $_SERVER['REQUEST_URI'];
        $array = explode('/', $path);
        array_shift($array);
        $count = count($array);
        if($array[$count-1]==null){
            unset($array[$count-1]);
        }
        if(count($array)!=1){
            $controller = $array[1];
            $controller = "CGestione".$controller;
            if(class_exists($controller)){
                $metodo = $array[2];
                if(method_exists($controller,$metodo)){
                    $c = new $controller();
                    if(isset($array[3])){
                        $parametro = $array[3];
                        $c->$metodo($parametro);
                    } else {
                        $c->$metodo();
                    }
                } else {
                    header('HTTP/1.1 405 Method Not Allowed');
                    exit;
                }
            }

        } else {
            $controller = new CHomepage();
            $controller->impostaPagina();

        }

        }

}