<?php
require('Smarty/smarty-libs/libs/Smarty.class.php');
/** class VLogin gestisce l'input/output che permette all'utente di registrarsi
 */
class VRegistrazione
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
     * Funzione che comunica a smarty di mostrare la form di registrazione
     */
    public function mostraFormRegistrazione(){
        //comunica a smarty di mostrare la form di registrazione
    }


}