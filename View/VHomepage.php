<?php
require_once('Smarty/smarty-libs/libs/Smarty.class.php');
/** class VHomepage gestisce la prima pagina
 */
class VHomepage
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

    public function mostraHomepage(){
        $sessione = Sessione::getInstance();
        if($sessione->isLoggedUtente()){
            $this->smarty->display('ListaRicetteUtReg.tpl');
        } elseif($sessione->isLoggedAdmin()){
            $this->smarty->display('HomepageAmministratore.tpl');
        } else {
            $this->smarty->display('ListaRicetteUtNonReg.tpl');
        }
    }

}
