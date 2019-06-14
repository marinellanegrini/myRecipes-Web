<?php


class MCGestioneUtenteMobile
{
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
            $view->mandaDati($utente);
        } else {
            header("HTTP/1.1 401 Unauthorized");
        }

    }

}