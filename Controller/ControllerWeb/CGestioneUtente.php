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
                $header = getallheaders();
                $referer = $header['Referer']; //infirizzo che stavo visitando
                $loc = substr($referer, strpos($referer, "/myRecipes")); //estrapolo la parte path della pagina che stavo visitando
                $sessione->setPath($loc); //salvo nei dati di sessione il path
                $view = new VLogin();
                $view->mostraFormLogin("utente","");
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
        $sessione = Sessione::getInstance();
        $id = $pm->esisteUtente($credenziali['username'],$credenziali['password']);
        if($id){
            //login avvenuto con successo, mostrare la pagina che stava vedendo l'utente o la homepage se non stava vedendo pagine particolari

            //login utente avvenuto con successo, salvataggio nei dati di sessione
            $utente = $pm->loadById("utente", $id);
            $sessione->setUtenteLoggato($utente);

            $location = $sessione->getPath();
            $sessione->removePath(); //cancello il path dai dati di sessione
            header('Location: '.$location); //redirect
        }
        else {
            $viewerr = new VLogin();
            $viewerr->mostraFormLogin("utente","Username e/o password errati");
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
                header('Location: /myRecipes/web');
            } else {
                $view = new VRegistrazione();
                $errore = "";
                $view->mostraFormRegistrazione($errore);
            }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            if($sessione->isLoggedUtente()){
                //redirect alla home page
                header('Location: /myRecipes/web');
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
        $errore = $view->validaInput();
        if($errore){
            $view->mostraFormRegistrazione($errore);
        } else {
            $dati = $view->recuperaDati();
            $u = new EUtente($dati['username'],$dati['password'],$dati['email'], $dati['nome'],$dati['cognome']);
            $pm = FPersistentManager::getInstance();
            $id = $pm->store($u);
            if($id){
                //redirect alla form di login
                header('Location: /myRecipes/web/Utente/Login');
            }
            else {
                $viewerr = new VErrore();
                $viewerr->mostraErrore("Errore in fase di registrazione");
            }
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
            header('Location: /myRecipes/web/Utente/Login');
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

    /**
     * Metodo per effettuare il logout
     * Se l'utente è loggato redirect alla homepage
     * Se l'utente non è loggato redirect alla homepage
     */
    public function Logout(){
        $sessione = Sessione::getInstance();
        if($sessione->isLoggedUtente()){
            $sessione->logout(); //cancello i dati di sessione
        }
        //redirect a login in entrambi i casi
        header('Location: /myRecipes/web');

    }


    /**
     * Metodo per gestire la modifica profilo dell'utente
     * 1) Se la richiesta è GET, mostriamo la form di ModificaProfilo (se l'utente non è loggato redirect alla form di login)
     * 2) Se la richiesta è POST richiamiamo il metodo ModificaProfiloUtente
     */
    public function ModificaProfilo(){
        $sessione = Sessione::getInstance();
        if($_SERVER['REQUEST_METHOD']=="GET"){

            if($sessione->isLoggedUtente()){
                $view = new VModificaProfilo();
                $view->mostraModificaProfilo($sessione->getUtente(),"");
            } else {
                //redirect alla form di login
                header('Location: /myRecipes/web/Utente/Login');
            }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            if($sessione->isLoggedUtente()){

                $this->ModificaProfiloUtente();

            } else {

                //redirect alla form di login
                header('Location: /myRecipes/web/Utente/Login');

            }

        }
        else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: GET, POST');
        }

    }


    /**
     * Metodo che gestisce la modifica profilo dell'utente
     */
    public function ModificaProfiloUtente()
    {
        $sessione = Sessione::getInstance();
        $utente=$sessione->getUtente();

        $view = new VModificaProfilo();
        $errore = $view->validaInputModifica();
        if($errore){

            $view->mostraModificaProfilo($utente,$errore);

        } else {

            $dati = $view->recuperaDati();
            $pm = FPersistentManager::getInstance();
            $utente->setNome($dati['nome']);
            $utente->setCognome($dati['cognome']);
            $utente->setUsername($dati['username']);
            $utente->setEmail($dati['email']);
            $utente->setPassword($dati['password']);
            $fotoobj = $dati['immagine'];
            $fotoobj->setIdesterno($utente->getId());
            $utente->setImmagine($fotoobj);

            $esito = $pm->updateDiUtente($utente);

            if($esito){
                $ut = $pm->loadById("utente", $utente->getId());
                $sessione->setUtenteLoggato($ut); //aggiorno l'oggetto utente
                header('Location: /myRecipes/web/Utente/Profilo');
            } else {
                $viewerr = new VErrore();
                $viewerr->mostraErrore("Errore in fase di modifica");
            }
        }
    }


    /**
     * Metodo per gestire l'eliminazione di un commento dell'utente (l'eliminazione è possbile solo dal profilo e l'aggiunta solo dal dettaglio ricetta)
     * (solo utente loggato)
     * @param $idcommento da eliminare
     */

    public function cancellaCommento($idcommento){
        $session = Sessione::getInstance();

        if($session->isLoggedUtente()){

            $utente = $session->getUtente();
            $idutente = $utente->getId();
            $pm = FPersistentManager::getInstance();
            $ret1 = $pm->loadById("commento",$idcommento);
            $final = $pm->delete("commento", $idcommento);

            //devo aggiornare l'oggetto utente nei dati di sessione
            $utente = $pm->loadById("utente", $idutente);
            $session->setUtenteLoggato($utente);

            if($final){
                //rimozione corretta, redirect alla pagina profilo
                header('Location: /myRecipes/web/Utente/Profilo');

            }
            else {
                //messaggio errore rimozione dai preferiti non corretta
                $viewerr = new VErrore();
                $viewerr->mostraErrore("Rimozione commento non riuscita");
            }
        } else { //utente non loggato redirect a login
            header('Location: /myRecipes/web/Utente/Login');

        }

    }


    /**
     * Metodo per gestire l'eliminazione dell'utente
     * (solo utente loggato)
     * @param $idutente da eliminare
     */

    public function CancellaUtente(){
        $session = Sessione::getInstance();

        if($session->isLoggedUtente()){

            $utente = $session->getUtente();
            $idutente = $utente->getId();
            $pm = FPersistentManager::getInstance();

            $final = $pm->delete("utente",$idutente);


            if($final){
                //rimozione corretta, redirect alla pagina home
                $this->Logout();

            }
            else {
                //messaggio errore rimozione dai preferiti non corretta
                $viewerr = new VErrore();
                $viewerr->mostraErrore("Rimozione utente non riuscita");
            }
        } else { //utente non loggato redirect a login
            header('Location: /myRecipes/web/Utente/Login');

        }

    }




}