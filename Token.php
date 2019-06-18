<?php
require '/Users/valeria/vendor/autoload.php';
use \Firebase\JWT\JWT;

class Token{

    private $key= "ciao";
    /** l'unica istanza della classe */
    private static $instance = null;

    /**
     * Metodo che restituisce l'unica istanza dell'oggetto.
     * @return Sessione l'istanza dell'oggetto.
     */
    public static function getInstance(){ //restituisce l'unica istanza (creandola se non esiste gia)
        if(static::$instance==null){
            static::$instance=new Token();
        }
        return static::$instance;
    }

    //metodo che codifica l'id e la chiave
    public function generaToken($id){
        $jwt = JWT::encode($id, $this->key);
        return $jwt;
    }

    //metodo che ottenuto il token lo decodifica
    public function decoficicaToken($jwt){
        $decoded = JWT::decode($jwt, $this->key, array('HS256'));
        return $decoded;
    }

    /**
     * Metodo che verifica se l'utente è autenticato vedendo se nell'header c'è il token
     * @return bool
     *
     */
    public function isAuth(){
        $header = getallheaders();
        if(isset($header['x-auth'])){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Metodo che ritorna l'utente autenticato decodificando il token ricevuto
     * @return mixed EUtente
     */
    public function getAuthUtente(){
        $header = getallheaders();
        $token = $header['x-auth'];
        $token = str_replace("Bearer ","",$token);
        $id = $this->decoficicaToken($token);
        $pm = FPersistentManager::getInstance();
        $utente = $pm->loadById("utente", $id);
        return $utente;
    }

}

?>