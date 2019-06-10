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

    /**
     * Comunica a smarty di mostrare il template di homepage utente passando 9 ricette da mostrare nella griglia
     * @param $ricette da mostrare
     *
     */
    public function mostraHomepageUtente($ricette){
        foreach ($ricette as $ricetta)
        {
            $img=$ricetta->getImmagine();
            $img->setData(base64_encode($img->getData()));
            $ricetta->setImmagine($img);
        }
        $sessione = Sessione::getInstance();
        if($sessione->isLoggedUtente()){
            $this->smarty->assign('ricette',$ricette);
            $this->smarty->display('ListaRicetteUtReg.tpl');
        } else {
            $this->smarty->assign('ricette',$ricette);
            $this->smarty->display('ListaRicetteUtNonReg.tpl');
        }
    }

    /**
     * Comunica a smarty di mostrare il template di homepage admin passando gli ultimi 5 commenti
     * @param $com da mostrare
     *
     */
    public function mostraHomepageAdmin($com){
        $this->smarty->assign('com',$com);
        $this->smarty->display('HomepageAmministratore.tpl');
    }



}
