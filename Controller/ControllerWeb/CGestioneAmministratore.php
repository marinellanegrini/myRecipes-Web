<?php

/**
 * Class CGestioneAmministratore gestisce le operazioni che può effettuare l'amministratore
 */
class CGestioneAmministratore
{
    /**
     * Metodo per avviare il login amministratore
     * 1) Se la richiesta è GET, mostriamo la form di Login (se l'admin è loggato redirect alla home page)
     * 2) Se la richiesta è POST richiamiamo il metodo Entra()
     */
    public function Login(){
        $sessione = Sessione::getInstance();
        if($_SERVER['REQUEST_METHOD']=="GET"){

            if($sessione->isLoggedAdmin()){
                //redirect alla home page
                header('Location: /myRecipes/web');
            } else {
                $view = new VLogin();
                $view->mostraFormLogin("amministratore","");
            }
        }
        else if($_SERVER['REQUEST_METHOD']=="POST"){
            if($sessione->isLoggedAdmin()){
                //redirect alla home page
                header('Location: /myRecipes/web');
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
     * Metodo che gestisce il login dell'amministratore
     */
    public function Entra(){
        $view = new VLogin();
        $credenziali = $view->recuperaCredenziali();
        if($credenziali['username'] == 'admin' && $credenziali['password'] == 'pippo'){
            //login admin avvenuto con successo, salvataggio nei dati di sessione
            $sessione = Sessione::getInstance();
            $sessione->setAdminLoggato();

            //login avvenuto con successo, mostrare la pagina principale dell'amministratore
            header('Location: /myRecipes/web');
        } else {
            //username e/o password errati, mostrare login con errore
            $viewerr = new VLogin();
            $viewerr->mostraFormLogin("amministratore","Username e/o password errati");
        }
    }



    /**
     * Funzione per avviare l'inserimento di una ricetta (mostrare form inserimento)
     * solo se l'admin è loggato, altrimenti redirect form di login amministratore
     */
    public function InserisciRicetta() {
        $session = Sessione::getInstance();
        if($session->isLoggedAdmin()){
            $pm = FPersistentManager::getInstance();
            $cibi =$pm->loadAllObjects(); //i cibi sono necessari perchè devono essere selezionati come ingredienti
            $view = new VGestioneAmministratore();
            $view->mostraFormInserimento($cibi);
        } else {
            header('Location: /myRecipes/web/Amministratore/Login');

        }
    }

    /**
     * Funzione per avviare la gestione dei commenti (mostrare form per i filtri)
     * solo se l'admin è loggato, altrimenti redirect form di login amministratore
     */
    public function GestisciCommenti(){
        $session = Sessione::getInstance();
        if($session->isLoggedAdmin()){
            $view = new VGestioneAmministratore();
            $view->mostraFormCommenti();
        } else {

            //errore admin non loggato redirect form di login amministratore
            header('Location: /myRecipes/web/Amministratore/Login');

        }

    }

    /**
     * Funzione per avviare l'inserimento di un nuovo cibo (mostrare form per l'inserimento)
     * solo se l'admin è loggato, altrimenti redirect form di login amministratore
     */
    public function InserisciCibo(){
        $session = Sessione::getInstance();
        if($session->isLoggedAdmin()){
            $view = new VGestioneAmministratore();
            $view->mostraFormCibo();
        } else {
            //errore admin non loggato redirect form di login amministratore
            header('Location: /myRecipes/web/Amministratore/Login');
        }

    }



    /**
     * Metodo per inserire una ricetta (solo se l'admin è loggato)
     */
    public function Ricetta(){
        if(($_SERVER['REQUEST_METHOD']=="POST")){
            $session = Sessione::getInstance();
            if($session->isLoggedAdmin()){
                $pm = FPersistentManager::getInstance();
                $view = new VInserimentoRicetta();
                $dati = $view->recuperaDatiRicetta();
                $cat = $pm->loadById("categoria", $dati['idcategoria']);
                $ricetta = new ERicetta($dati['nome'], $dati['difficolta'], $dati['procedimento'], $dati['tprep'], $dati['ndosi'], $cat, 0);
                $ricetta->setImmagine($dati['imgprinc']); //manca ancora l'id esterno (assegnato nella store di ERicetta quando facciamo store dell'immagine)
                $ricetta->setImgpreparazione($dati['gallery']);

                $arringr = array();
                //costruzione array di ingredienti
                foreach ($dati['ingredienti'] as $i){
                    // se l'associazione cibo-quantita (cioè ingrediente) esiste gia recupero l'ingrediente dal db
                    if($idingr = $pm->esisteIngrediente($i['qta'],$i['idcibo'])){
                        $ingrediente = $pm->loadById("ingrediente", $idingr);
                        array_push($arringr, $ingrediente);
                    } else { //altrimenti recupero il cibo dal db e creo un nuovo ingrediente che salvo nel db
                        $cibo = $pm->loadById("cibo", $i['idcibo']);
                        $ingrediente = new EIngrediente($i['qta'], $cibo);
                        $lastinsert = $pm->store($ingrediente);
                        $ingrediente = $pm->loadById("ingrediente", $lastinsert);
                        array_push($arringr, $ingrediente);
                    }
                }
                $ricetta->setIngredienti($arringr);
                $id = $pm->store($ricetta);
                if($id){
                    // reindirizzamento alla home principale
                    header('Location: /myRecipes/web');
                }
                else {
                    //messaggio di errore inserimento non corretto
                    $viewerr = new VErrore();
                    $viewerr->mostraErrore("Inserimento nuova ricetta non riuscito");
                }


            } else {
                //errore admin non loggato redirect form di login amministratore
                header('Location: /myRecipes/web/Amministratore/Login');
            }
        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }
    }


    /**
     * Ricerca di commenti basandosi sui filtri (solo se l'admin è loggato)
     */
    public function Commenti(){
        if(($_SERVER['REQUEST_METHOD']=="POST")){
            $session = Sessione::getInstance();
            if($session->isLoggedAdmin()){
                $view = new VCommenti();
                $filtri = $view->recuperaFiltri();

                $pm = FPersistentManager::getInstance();
                $commenti = $pm->ricercaCommenti($filtri['last'], $filtri['parola']);

                $arrcommenti = array();
                //costruisco un array in cui ogni elemento è un array associativo con chiavi 'utente', 'commento' e 'ricetta'
                foreach ($commenti as $commento){

                    $id = $commento->getIdUtente();
                    $idric = $commento->getIdRicetta();

                    $utente = $pm->loadById("utente",$id);
                    $ricetta = $pm->loadById("ricetta",$idric);
                    $tmp = array(
                        'utente'=>$utente->getUsername(),
                        'commento'=>$commento,
                        'ricetta'=>$ricetta->getNome()
                    );
                    $arrcommenti[]=$tmp;
                }

                $view->mostraCommenti($commenti, $arrcommenti);

            } else {
                //errore admin non loggato redirect form di login amministratore
                header('Location: /myRecipes/web/Amministratore/Login');
            }

        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }

    }


    /**
     * Ban di commenti il cui ID è stato inserito dall'amministratore
     */
    public function Banna()
    {
        if (($_SERVER['REQUEST_METHOD'] == "POST")) {
            $session = Sessione::getInstance();
            if ($session->isLoggedAdmin()) {
                $view = new VCommenti();
                $idcomm = $view->recuperaCommenti();
                if(!$idcomm){
                    $viewerr = new VErrore();
                    $viewerr->mostraErrore("Non è stato selezionato nessun commento");

                }
                else{

                    $pm = FPersistentManager::getInstance();
                    foreach ($idcomm as $idcommento) {
                         $esito = $pm->update("commento", $idcommento, 'bannato', true);

                         if (!$esito) {
                            // messaggio errore se il ban va male
                            $viewerr = new VErrore();
                            $viewerr->mostraErrore("Il ban non è andato a buon fine");
                         }
                    }
                    //redirect alla home page amministratore
                    header('Location: /myRecipes/web');
                }

            } else {
                //errore admin non loggato redirect form di login amministratore
                header('Location: /myRecipes/web/Amministratore/Login');
            }
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }
    }

    /**
     * Inserimento di un nuovo cibo (solo se admin loggato)
     */
    public function Cibo(){
        if (($_SERVER['REQUEST_METHOD'] == "POST")) {
            $session = Sessione::getInstance();
            if ($session->isLoggedAdmin()) {
                $view = new VGestioneAmministratore();
                $cibo = $view->recuperaCibo();

                $ciboobj = new ECibo($cibo['nome'],$cibo['um']);
                $ciboobj->setImmagine($cibo['img']);
                //manca ancora l'id esterno (assegnato nella store di ECibo quando facciamo store dell'immagine)
                $pm = FPersistentManager::getInstance();
                $id = $pm->store($ciboobj);
                if($id){
                    //inserimento corretto redirect alla pagina di inserimento della ricetta
                    header('Location: /myRecipes/web');
                }
                else {
                    //errore inserimento cibo errata
                    $viewerr = new VErrore();
                    $viewerr->mostraErrore("Inserimento ingrediente sbagliato");
                }

            } else {
                //errore admin non loggato redirect form di login amministratore
                header('Location: /myRecipes/web/Amministratore/Login');
            }
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }

    }

    /**
     * Metodo per effettuare il logout dell'amministratore
     * Se l'admin è loggato redirect alla homepage dell'utente
     * Se l'admin non è loggato redirect alla homepage
     */
    public function Logout(){
        $sessione = Sessione::getInstance();
        if($sessione->isLoggedAdmin()){
            $sessione->logout(); //cancello i dati di sessione
        }
        //redirect a login in entrambi i casi
        header('Location: /myRecipes/web');

    }


}