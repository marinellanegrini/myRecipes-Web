<?php


class VMobile
{

    public function mandaDati($dati){
        $a = $this->utf8ize($dati);
        header("Content-Type: application/json");
        echo (json_encode($a));

    }

    public function recuperaDati(){
        // recupero dati dal pacchetto HTTP in entrata (es filtri, commento ecc)
    }

    function utf8ize($d)
    {
        if (is_array($d)) {
            foreach ($d as $k => $v) {
                $d[$k] = utf8ize($v);
            }
        } else {
            if (is_string($d)) {
                return utf8_encode($d);
            }
        }
        return $d;
    }
}

?>