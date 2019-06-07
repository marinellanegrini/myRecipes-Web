<?php
require_once('Smarty/smarty-libs/libs/Smarty.class.php');
/** class VCommenti gestisce l'input/output per permettere all'amministratore di bannare commenti
 * URL del tipo index.php?view=VCommenti&action=cerca oppure index.php?view=VCommenti&action=banna
 */
class VCommenti
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
     * Metodo per recuperare i filtri inseriti dall'amministratore
     * @return array con i filtri
     */
    public function recuperaFiltri(){
        $filtri = array();
        if(isset($_POST['last'])){
            $filtri['last'] = $_POST['last'];
        } else {
            $filtri['last'] = null;
        }
        if(isset($_POST['parola'])){
            $filtri['parola'] = $_POST['parola'];
        } else{
            $filtri['parola'] = null;
        }
        return $filtri;
    }

    /**
     * Metodo che recupera l'array di idcommento da bannare inviati con la form
     * @return array|mixed array di id inseriti
     */
    public function recuperaCommenti(){
        $arrayid=array();
        if(isset($_POST['commenti'])){
            $arrayid = $_POST['commenti']; //recupero array di id commenti inviati con la form
        }
        return $arrayid;
    }

    /**
     * Funzione per mostrare i commenti recuperati secondo i filtri
     * @param $commenti da mostrare
     */
    public function mostraCommenti($com){
        //comunico a smarty di mostrare i commenti
        $this->smarty->assign('$com',$com);
        $this->smarty->display('BannaCommento.tpl');

    }

}