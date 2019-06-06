<?php
require('Smarty/smarty-libs/libs/Smarty.class.php');
/** class VPreferiti che gestisce l'input/output per mostrare le ricette preferite, aggiungere e rimuovere dai preferiti*/
class VPreferiti
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
     * Funzione per mostrare i Preferiti dell'utente
     * @param array di ERicetta preferite
     */
    public function mostraPreferiti($ricette){
        //comunica a smarty di mostrare i preferiti
    }

}