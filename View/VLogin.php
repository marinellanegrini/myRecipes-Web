<?php
require_once('Smarty/smarty-libs/libs/Smarty.class.php');

/** class VLogin gestisce l'input/output che permette all'utente di effettuare il login
 */
class VLogin
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
     * Funzione per recuperare le credenziali dell'utente/admin
     * @return array con le credenziali
     */
    public function recuperaCredenziali(){
        $credenziali = array();
        if(isset($_POST['username']) && isset($_POST['password'])){
            $credenziali['username'] =  $_POST['username'];
            $credenziali['password'] =  $_POST['password'];
        }
        return $credenziali;
    }
    /**
     * Funzione che comunica a Smarty di mostrare lo form di login, comunicando se è Login utente o amministratore
     * (il template è lo stesso, ma i metodi associati al submit sono differenti)
     * @param $ruolo dell'utilizzatore dell'app
     */
    public function mostraFormLogin($ruolo,$errore){

        $this->smarty->assign('ruolo', $ruolo);
        $this->smarty->assign('errore', $errore);
        $this->smarty->display("Login.tpl");

    }



}