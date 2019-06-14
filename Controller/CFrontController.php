<?php
/**
 * Class CFrontController si occupa di istanziare il giusto controllore e il relativo metodo basandosi sull'URL ricevuta
 * /myRecipes/web/controller/metodo/parametro
 */

class CFrontController
{
    /**
     * Metodo che dalla URL recupera il controllore da istanziare e il relativo metodo con parametro
     * /myRecipes/web/controller/metodo/param
     */
    public function run()
    {

        $path = $_SERVER['REQUEST_URI'];
        $array = explode('/', $path);
        array_shift($array);
        $client = $array[1];

        if ($client == 'web') {
            $count = count($array);
            if ($array[$count - 1] == null) {
                unset($array[$count - 1]);
            }
            if (count($array) != 2) {
                $controller = $array[2];
                $controller = "CGestione" . $controller;
                if (class_exists($controller)) {
                    $metodo = $array[3];
                    if (method_exists($controller, $metodo)) {
                        $c = new $controller();
                        if (isset($array[4])) {
                            $parametro = $array[4];
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

        } else {
            $count = count($array);
            if ($array[$count - 1] == null) {
                unset($array[$count - 1]);
            }
            if (count($array) != 2) {
                $controller = $array[2];
                $controller = "MCGestione" . $controller . "Mobile";
                if (class_exists($controller)) {
                    $metodo = $array[3];
                    if (method_exists($controller, $metodo)) {
                        $c = new $controller();
                        if (isset($array[4])) {
                            $parametro = $array[4];
                            $c->$metodo($parametro);
                        } else {
                            $c->$metodo();
                        }
                    }

                }


            }
        }
    }

}
?>