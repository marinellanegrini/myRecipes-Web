<?php
require('Smarty/smarty-libs/libs/Smarty.class.php');

/** class VRicerca che gestisce l'input/output per l'inizializzazione della ricerca (mostra filtri/lista di ingredienti a seconda della modalità scelta)*/
class VRicerca
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('Smarty/smarty-dir/templates');
        $this->smarty->setCompileDir('Smarty/smarty-dir/templates_c');
        $this->smarty->setCacheDir('Smarty/smarty-dir/cache');
        $this->smarty->setConfigDir('Smarty/smarty-dir/configs');
    }

    /**
     * Metodo per impostare la ricerca per ingredienti (mostrare l'elenco di ingredienti selezionabili)
     * @param $cibi array di ECibo da mostrare
     */
    public function mostraIngredienti($cibi){

        //assegnazione a smarty per mostrare i cibi selezionabili (if per utenti loggati e non)

        $session = Sessione::getInstance();
        if($session->isLoggedUtente()){
            print("utente loggato ");
            print_r($cibi);

        } else {
            print("utente non loggato ");
            print_r($cibi);

        }
    }

    /**
     * Metodo per impostare la ricerca avanzata (mostrare i filtri selezionabili)
     */
    public function mostraFiltri(){
        //assegnazione a smarty per mostrare i filtri della ricerca avanzata (if per utenti loggati e non)
        $session = Sessione::getInstance();

        if($session->isLoggedUtente()){
            print("utente loggato ");
            print_r("filtri");

        } else {
            print("utente non loggato ");
            print_r("filtri");

        }
    }


}