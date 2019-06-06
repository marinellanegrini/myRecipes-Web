<?php

/** Class CGestioneUtente gestisce le operazioni che può effettuare l'utente */
class CGestioneUtente
{

    /**
     * Metodo per gestire il login utente
     * 1) Se la richiesta è GET, mostriamo la form di Login (se l'utente è loggato redirect alla home page)
     * 2) Se la richiesta è POST richiamiamo il metodo Entra()
     */
    public function Login(){
        $sessione = Sessione::getInstance();
        if($_SERVER['REQUEST_METHOD']=="GET"){

            if($sessione->isLoggedUtente()){
                //redirect alla home page
            } else {
                $view = new VLogin();
                $view->mostraFormLogin("utente");
            }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            if($sessione->isLoggedUtente()){
                //redirect alla home page
            } else {
                $this->Entra();
            }

        }
        else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }

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
            //login avvenuto con successo, mostrare l'homepage
            $viewhome = new VHomepage();
            $viewhome->mostraHomepage();

        }
        else {
            $viewerr = new VErrore();
            $viewerr->mostraErrore("Username e/o password errate");
        }
    }

    /**
     * Metodo per avviare la registrazione dell' utente
     * 1) Se la richiesta è GET, mostriamo la form di registrazione (se l'utente è loggato redirect alla home page)
     * 2) Se la richiesta è POST richiamiamo il metodo Registrati()
     *
     */
    public function Registrazione(){
        $sessione = Sessione::getInstance();
        if($_SERVER['REQUEST_METHOD']=="GET"){

            if($sessione->isLoggedUtente()){
                //redirect alla home page
            } else {
                $view = new VRegistrazione();
                $errore = "";
                $view->mostraFormRegistrazione($errore);
            }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            if($sessione->isLoggedUtente()){
                //redirect alla home page
            } else {
                $this->Registrati();
            }

        }
        else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }


    }

    /**
     * Metodo che gestisce la registrazione dell'utente
     *
     */
    public function Registrati(){
        $view = new VRegistrazione();
        $valpas = $view->validaPassword();
        if(!$valpas){
            $errore = "Le password non coincidono";
            $view->mostraFormRegistrazione($errore);
            //redirect alla form di registrazione (password non uguali)
        }
        $valus = $view->validaUsername();
        if(!$valus){
            $errore = "Esiste già un utente con questa username";
            $view->mostraFormRegistrazione($errore);
            //redirect alla form di registrazione (è gia presente un utente con quell'username)
        }
        $dati = $view->recuperaDati();
        $u = new EUtente($dati['username'],$dati['password'],$dati['email'], $dati['nome'],$dati['cognome']);
        $pm = FPersistentManager::getInstance();
        $id = $pm->store($u);
        if($id){
            //redirect alla form di login
        }
        else {
            //errore nella registrazione
        }
    }

    /**
     * Metodo per mostrare il profilo dell'utente
     */
    public function Profilo(){
        $sessione = Sessione::getInstance();
        if($sessione->isLoggedUtente()){
            $view = new VProfilo();
            $view->mostraProfilo($sessione->getUtente());
        } else {
            //redirect alla form di login
        }
    }

    /**
     * Metodo per gestire l'eliminazione di un commento dell'utente (l'eliminazione è possbile solo dal profilo e l'aggiunta solo dal dettaglio ricetta)
     * (solo utente loggato)
     * @param $idcommento da eliminare
     */
    public function Commento($idcommento){
        $sessione = Sessione::getInstance();
        if($sessione->isLoggedUtente()){
            $pm = FPersistentManager::getInstance();
            $esito = $pm->delete("commento", $idcommento);
            //devo aggiornare l'oggetto utente nei dati di sessione
            $utente = $pm->loadById("utente", $sessione->getUtente()->getId());
            $sessione->setUtenteLoggato($utente);
            if($esito){
                //redirect a profilo utente aggiornato
            }
        } else {
            //redirect alla form di login
        }
    }



}