<?php


class Sessione
{
    /** l'unica istanza della classe */
    private static $instance = null;

    /**
     * Metodo che restituisce l'unica istanza dell'oggetto.
     * @return Sessione l'istanza dell'oggetto.
     */
    public static function getInstance(){ //restituisce l'unica istanza (creandola se non esiste gia)
        if(static::$instance==null){
            static::$instance=new Sessione();
        }
        return static::$instance;
    }

    /**
     * Metodo che verifica se l'utente è loggato, ovvero se la componente 'utente' di $_SESSION, è settata
     * @return bool
     */
    public function isLoggedUtente(){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }

        if(isset($_SESSION['utente'])){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Metodo che verifica se l'amministratore è loggato, ovvero se la componente 'amministratore' di $_SESSION, è settata
     * @return bool
     */
    public function isLoggedAdmin(){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }

        if(isset($_SESSION['amministratore'])){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Metodo che recupera l'utente loggato dai dati di sessione
     * @return EUtente loggato
     */
    public function getUtente(){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        $u = $_SESSION['utente']; //stringa
        $utente = unserialize($u);
        return $utente;
    }

    /**
     * Metodo che salva nei dati di sessione l'utente (quando il login utente ha successo)
     * @param $utente da salvare in $_SESSION
     */
    public function setUtenteLoggato($utente){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        $u = serialize($utente);
        $_SESSION['utente'] = $u;
    }

    public function logout(){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        session_unset();
        session_destroy();
    }

    /**
     * Metodo che salva nei dati di sessione che l'amministratore è loggato (quando il login amministratore ha successo
     */
    public function setAdminLoggato(){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        $_SESSION['amministratore'] = true;
    }

    public function setPath($path){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        $_SESSION['path'] = $path;
    }

    public function getPath(){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        $path = $_SESSION['path']; //stringa
        return $path;
    }

    public function removePath() {
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        unset($_SESSION['path']);
    }


}