<?php
require('Smarty/smarty-libs/libs/Smarty.class.php');
/** class VProfilo gestisce l'input/output che permette all'utente di visualizzare il proprio profilo
 */
class VProfilo
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
     * Funzione che mostra il profilo dell'utente
     * @param $utente da mostrare
     */
    public function mostraProfilo($utente){
        //Assegnare a Smarty per mostrare il profilo
    }

}


