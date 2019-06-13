<?php


class VMobile
{

    public function mandaDati($dati){
        header("Content-Type: application/json");
        echo (json_encode($dati));

    }

    public function recuperaDati(){
        // recupero dati dal pacchetto HTTP in entrata (es filtri, commento ecc)
    }

}

?>