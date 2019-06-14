<?php


class VMobile
{

    public function mandaDati($dati){
        header("Content-Type: application/json");
        echo (json_encode($dati));

    }

    public function recuperaDati(){
        $dati = json_decode( trim(file_get_contents('php://input'),true),true);
        return $dati;
    }

}

?>