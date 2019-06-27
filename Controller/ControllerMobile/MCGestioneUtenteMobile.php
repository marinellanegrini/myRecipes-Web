<?php


class MCGestioneUtenteMobile
{
    /**
     * Gestione del login, se username e password sono verificati genera e restituisce un token
     */
    public function login(){
        $view = new VMobile();
        $credenziali = $view->recuperaDati();
        $pm = FPersistentManager::getInstance();
        $esito = $pm->esisteUtente($credenziali['username'],$credenziali['password']);
        if($esito){
            $utente = $pm->loadById("utente", $esito);

            $t = Token::getInstance();
            $token = $t->generaToken($esito);
            header('X-Auth: '.$token);
            $utente->codifica64();
            $view->mandaDati($utente);

        } else {
            header("HTTP/1.1 401 Unauthorized");
        }

    }

    /**
     * Verifica se un Username è gia presente
     * @param $username
     */
    public function username($username){
        $pm = FPersistentManager::getInstance();
        $esito = $pm->esisteUsername($username);
        $view = new VMobile();
        $view->mandaDati($esito);
    }

    /**
     * Metodo per laq registrazione dell'utente
     */
    public function registrazione(){
        $view = new VMobile();
        $u = $view->recuperaDati();
        $utente = new EUtente($u['username'],$u['password'],$u['email'],$u['nome'],$u['cognome']);
        $pm = FPersistentManager::getInstance();
        $id = $pm->store($utente);
        if(!$id) {
            header("HTTP/1.1 500 Internal Server Error");
        } else {
            $utente = $pm->loadById("utente", $id);
            $utente->codifica64();

            $view->mandaDati($utente);
        }
    }

    public function updateprofilo(){
        $pm = FPersistentManager::getInstance();
        $view = new VMobile();
        $t = Token::getInstance();
        $utente = $t->getAuthUtente();
        $json = $view->recuperaDati();
        $utente->setNome($json['nome']);
        $utente->setCognome($json['cognome']);
        $utente->setUsername($json['username']);
        $utente->setEmail($json['email']);
        $utente->setPassword($json['password']);
        $esito = $pm->updateDiUtente($utente);

        if($esito){
            $ut = $pm->loadById("utente", $utente->getId());
            $ut->codifica64();
            $view->mandaDati($ut);
        } else {
            header("HTTP/1.1 500 Internal Server Error");
        }

    }


    public function updateimmagine(){
        $pm = FPersistentManager::getInstance();
        $view = new VMobile();
        $t = Token::getInstance();
        $utente = $t->getAuthUtente();
        $json = $view->recuperaDati();
        $json['data'] = base64_decode($json['data']);
        $fotoobj = new EImmagine($json['data'],$json['type']);
        $fotoobj->setIdesterno($utente->getId());
        $esito = $pm->updateFoto($fotoobj);
        if($esito){
            $ut = $pm->loadById("utente", $utente->getId());
            $ut->codifica64();
            $view->mandaDati($ut);
        } else {
            header("HTTP/1.1 500 Internal Server Error");
        }
    }

    public function Utente($id) {
        $pm = FPersistentManager::getInstance();
        $utente = $pm->loadById("utente", $id);
        $view = new VMobile();
        $utente->codifica64();
        $view->mandaDati($utente);

    }

}