<?php

use \Firebase\JWT\JWT;

class Token{

    private $key= "ciao";

    //metodo che codifica l'id e la chiave
    public function generaToken($id,$key){
        $jwt = JWT::encode($id, $key);
        return $jwt;
    }

    //metodo che ottenuto il token lo decodifica
    public function decoficicaToken($jwt, $key){
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        return $decoded;
    }

}

?>