<?php
require_once('Smarty/smarty-libs/libs/Smarty.class.php');
/** class VModificaProfilo gestisce l'input/output che permette all'utente di modificare il proprio profilo
 */
class VModificaProfilo
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
     * Funzione che mostra la form di ModificaProfilo dell'utente
     */
    public function modificaProfilo(){

    }
}
