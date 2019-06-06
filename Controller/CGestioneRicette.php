<?php

/**
 * Class CGestioneRicette gestisce tutto ciò che riguarda una ricetta (ricerca, aggiunta/rimozione da preferiti, aggiunta di un commento)
 */
class CGestioneRicette {
    /**
     * Metodo che avvia la ricerca per ingrediente (mostra ingredienti selezionabili)
     */
    public function RicercaPerIngredienti(){
        $pm = FPersistentManager::getInstance();
        $cibi = $pm->loadAllObjects();
        $view = new VRicerca();
        $view->mostraIngredienti($cibi);
    }

    /**
     * Metodo che avvia la ricerca avanzata (mostrare filtri)
     */
    public function RicercaAvanzata(){
        $view = new VRicerca();
        $view->mostraFiltri();
    }

    /**
     * Metodo che ricerca le ricette contenenti determinati cibi
     */
    public function cercaPerIngredienti(){
        if(($_SERVER['REQUEST_METHOD']=="POST")){
            $view = new VRisultati();
            $idCibi = $view->recuperaIngredienti();
            $pm = FPersistentManager::getInstance();
            $ricette = $pm->ricercaTramiteIngrediente($idCibi);
            $view->mostraRislutati($ricette);

        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }

    }


    /**
     * Metodo che ricerca le ricette secondo i filtri
     */
    public function cercaAvanzata(){
        if(($_SERVER['REQUEST_METHOD']=="POST")){
            $view = new VRisultati();
            $filtri = $view->recuperaFiltri();
            $pm = FPersistentManager::getInstance();
            $ricette = $pm->ricercaTramiteFiltri($filtri);
            $view->mostraRisultati($ricette);

        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }

    }

    /**
     * Metodo che ricerca le ricette dal nome inserito dall'utente nella barra di ricerca
     */
    public function cercaDaNome(){
        if(($_SERVER['REQUEST_METHOD']=="POST")){
            $view = new VRisultati();
            $nome = $view->recuperaNome();
            $pm = FPersistentManager::getInstance();
            $ricette = $pm->search("ricetta", $nome, "nome");
            $view->mostraRisultati($ricette);

        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }


    }

    /**
     * Metodo che dato l'id della ricetta selezionata restituisce una ricetta
     * @param $id identificativo ricetta selezionata dall'utente
     */
    public function Ricetta($id){
        $pm = FPersistentManager::getInstance();
        $ricetta = $pm->loadById("ricetta",$id);
        $session = Sessione::getInstance();
        if($session->isLoggedUtente()){
            $preferita = $pm->UtentePrefRic($id,$session->getUtente()->getId());
        } else {
            $preferita = false;
        }

        $view = new VDettaglio();
        $view->mostraRicetta($ricetta, $preferita);
    }

    /**
     * Metodo che gestisce le ricette preferite dall'utente (solo utenti loggati, altrimenti reindirizzamento al login)
     */
    public function Preferiti() {
        $session = Sessione::getInstance();
        if($session->isLoggedUtente()){
            $utente = $session->getUtente();
            $idutente = $utente->getId();
            $pm = FPersistentManager::getInstance();
            $ut = $pm->loadById("utente", $idutente);
            $ricette = $ut->getPreferiti();
            $view = new VPreferiti();
            $view->mostraPreferiti($ricette);

        } else {
            //redirect alla form di login
        }
    }

    /**
     * Metodo che dato gestisce l'inserimento nei preferiti (solo utenti loggati, altrimenti reindirizzamento al login)
     * @param $idricetta id della ricetta aggiunta
     */
    public function AggiungiaiPreferiti($idricetta){
        $session = Sessione::getInstance();
        if($session->isLoggedUtente()){
            $utente = $session->getUtente();
            $idutente = $utente->getId();
            $pm = FPersistentManager::getInstance();
            $ric = $pm->loadById("ricetta",$idricetta);
            $ric->incrementasalvataggi();
            $n = $ric->getNsalvataggi();
            $pm->update("ricetta",$idricetta,'nsalvataggi',$n); //aggiornamento ricetta db
            $esito =  $pm->storeUtPrefRic($idricetta, $idutente); //aggiunta di una entry
            //devo aggiornare l'oggetto utente nei dati di sessione
            $utente = $pm->loadById("utente", $idutente);
            $session->setUtenteLoggato($utente);
            if($esito){
                //inserimento corretto, redirect alla pagina dei preferiti dell'utente (o alla pagina corrente)
            }
            else {
                //messaggio errore inserimento nei preferiti non corretto
            }
        } else { //utente non loggato
            //redirect alla form di login
        }

    }

     /** Metodo che permettte di gestire l'inserimento di un commento dell'utente (solo utenti loggati)
     * @param $idricetta id ricetta commentata
     *
     */
    public function Commento($idricetta){
        if(($_SERVER['REQUEST_METHOD']=="POST")){
            $session = Sessione::getInstance();
            if($session->isLoggedUtente()){
                $view = new VDettaglio();
                $commento = $view->recuperaCommento();
                $utente = $session->getUtente();
                $idutente = $utente->getId();
                $com = new ECommento($commento['testo'], $commento['data'], $commento['ora'], $idutente, $idricetta);
                $pm = FPersistentManager::getInstance();
                $id = $pm->store($com);
                //devo aggiornare l'oggetto utente nei dati di sessione
                $utente = $pm->loadById("utente", $idutente);
                $session->setUtenteLoggato($utente);
                if($id){
                    //inserimento corretto, redirect a dettaglio ricetta attuale (usiamo il metodo Ricetta di questo controller)
                } else {
                    //messaggio errore inserimento non corretto
                }

            } else { //utente non loggato
                //redirect alla form di login
            }

        }
        else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
        }


    }
    

    /**
     * Metodo che permette di rimuovere una ricetta dai preferiti
     * Tale funzionalità è solo per utenti loggati, ma se l'utente ha la possibilità di rimuovere la ricetta
     * il controllo sul login è già avvenuto perchè
     * 1) L'utente rimuove una ricetta dai preferiti dal dettaglio ricetta, ma può farlo perchè il cuore è pieno, quindi sicuramente è gia loggato, oppure
     * 2) Rimuove una ricetta dai preferiti dall'elenco delle sue ricette preferite, ma se ha questa funzionalità disponibile sicuro è gia loggato
     * @param $idricetta identificativo ricetta da rimuovere
     */
    public function RimuoviDaPreferiti($idricetta){
        $session = Sessione::getInstance();
        $utente = $session->getUtente();
        $idutente = $utente->getId();
        $pm = FPersistentManager::getInstance();
        $ret1 = $pm->loadById("ricetta",$idricetta);
        $ret1->decrementaSalvataggi();
        $n = $ret1->getNsalvataggi();
        $pm->update("ricetta", $idricetta, "nsalvataggi", $n);
        $esito = $pm->deleteUtPrefRic($idricetta, $idutente);
        //devo aggiornare l'oggetto utente nei dati di sessione
        $utente = $pm->loadById("utente", $idutente);
        $session->setUtenteLoggato($utente);
        if($esito){
            //inserimento corretto, redirect alla pagina dei preferiti dell'utente (o alla pagina corrente)
        }
        else {
            //messaggio errore rimozione dai preferiti non corretta
        }
    }



}
?>