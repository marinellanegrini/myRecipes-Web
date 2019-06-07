<?php
require_once('Smarty/smarty-libs/libs/Smarty.class.php');

/** class VErrore gestisce l'input/output per gli errori
 */
class VErrore
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

    public function mostraErrore($messaggio){
        $this->smarty->assign('messaggio',$messaggio);
        $this->smarty->display('Error.tpl');
    }

}
