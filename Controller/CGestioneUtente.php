<?php

/** Class CGestioneUtente gestisce le operazioni che può effettuare l'utente */
class CGestioneUtente
{

    /**
     * Metodo per avviare il login utente (mostrare la form di login)
     */
    public function Login(){
        $view = new VLogin();
        $view->mostraFormLogin("utente");
    }

    /**
     * Metodo che gestisce il login dell'utente
     */
    public function Entra(){
        $view = new VLogin();
        $credenziali = $view->recuperaCredenziali();
        $pm = FPersistentManager::getInstance();
        $utente = $pm->loadUtente($credenziali['username'],$credenziali['password']);
        if(! $utente){
            //login utente avvenuto con successo, salvataggio nei dati di sessione
            $sessione = Sessione::getInstance();
            $sessione->setUtenteLoggato($utente);
            //login avvenuto con successo, mostrare la pagina precedente
        }
        else {
            //username e/o password errati, mostrare errore o nuovamente login
        }
    }

    /**
     * Metodo per avviare la registrazione dell' utente (mostrare la form di registrazione)
     */
    public function Registrazione(){
        $view = new VRegistrazione();
        $view->mostraFormRegistrazione();

    }

    /**
     * Metodo che gestisce la registrazione dell'utente
     */
    public function Registrati($username, $password, $email, $nome, $cognome){
        $u = new EUtente($username,$password,$email, $nome,$cognome);
        $pm = FPersistentManager::getInstance();
        $id = $pm->store($u);
        if($id){
            return true;
        }
        else {
            return false;
        }
    }



}