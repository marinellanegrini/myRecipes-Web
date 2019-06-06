<?php

/**
 * Class CGestioneAmministratore gestisce le operazioni che può effettuare l'amministratore
 */
class CGestioneAmministratore
{
    /**
     * Metodo per avviare il login amministratore (mostrare la form di login)
     */
    public function Login(){
        $view = new VLogin();
        $view->mostraFormLogin("amministratore");
    }

    /**
     * Metodo che gestisce il login dell'amministratore
     * L'amministratore entra con username=admin e password=pippo
     */
    public function Entra(){
        $view = new VLogin();
        $credenziali = $view->recuperaCredenziali();
        if($credenziali['username'] == 'admin' && $credenziali['password'] == 'pippo'){
            //login admin avvenuto con successo, salvataggio nei dati di sessione
            $sessione = Sessione::getInstance();
            $sessione->setAdminLoggato();

            //login avvenuto con successo, mostrare la pagina principale dell'amministratore
        } else {
            //username e/o password errati, mostrare errore o nuovamente login
        }
    }

    /**
     * Funzione per avviare l'inserimento di una ricetta (mostrare form inserimento)
     * solo se l'admin è loggato, altrimenti redirect form di login amministratore
     */
    public function InserisciRicetta(){
        $session = Sessione::getInstance();
        if($session->isLoggedAdmin()){
            $view = new VGestioneAmministratore();
            $ningredienti = $view->recuperaNIngredienti(); //recupero il numero di ingredienti inserito dall'amministratore
            $view->mostraFormInserimento($ningredienti);
        } else {
            //errore admin non loggato redirect form di login amministratore
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
                    if($idingr = $pm->esisteIngrediente($i['qta'],$i['idcibo'])){
                        $ingrediente = $pm->loadById("ingrediente", $idingr);
                        array_push($arringr, $ingrediente);
                    } else {
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
                }
                else {
                    //messaggio di errore inserimento non corretto
                }


            } else {
                //errore admin non loggato redirect form di login amministratore
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
                $view->mostraCommenti($commenti);

            } else {
                //errore admin non loggato redirect form di login amministratore
            }

        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }

    }

    /**
     * Ban di un commento
     */
    public function Banna()
    {
        if (($_SERVER['REQUEST_METHOD'] == "POST")) {
            $session = Sessione::getInstance();
            if ($session->isLoggedAdmin()) {
                $view = new VCommenti();
                $idcomm = $view->recuperaCommenti();
                $pm = FPersistentManager::getInstance();
                foreach ($idcomm as $idcommento) {
                    $esito = $pm->update("commento", $idcommento, 'bannato', true);
                    if (!$esito) {
                        // messaggio errore se il ban va male
                    }
                }
                //redirect alla home page amministratore
            } else {
                //errore admin non loggato redirect form di login amministratore
            }
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }
    }


}