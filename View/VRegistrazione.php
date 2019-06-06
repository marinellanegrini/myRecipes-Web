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
     * @param $errore da mostrare nella form (quando i parametri non sono corretti)
     */
    public function mostraFormRegistrazione($errore){
        //comunica a smarty di mostrare la form di registrazione
    }

    /**
     * Funzione che verifica che la password e la conferma sono uguali
     * @return bool esito validazione
     */
    public function validaPassword(){
        $password = $_POST['password'];
        $confpass = $_POST['confpass'];
        if($password == $confpass){
            return true;
        } else { return false;}
    }

    /**
     * Funzione che verifica se l'username inserito è gia presente
     * @return mixed esito
     */
    public function validaUsername(){
        $pm = FPersistentManager::getInstance();
        $esito = $pm->esisteUsername($_POST['username']);
        if($esito){
            return false;
        } else { return true;}
    }

    /**
     * Funzione per recuperare i dati dalla form di registrazione
     * @return $dati array associativo
     */
    public function recuperaDati(){
        $dati= array();
        if(isset($_POST['username'])){
            $dati['username'] = $_POST['username'];
        }
        if(isset($_POST['password'])){
            $dati['password'] = $_POST['password'];
        }
        if(isset($_POST['email'])){
            $dati['email'] = $_POST['email'];
        }
        if(isset($_POST['nome'])){
            $dati['nome'] = $_POST['nome'];
        }
        if(isset($_POST['cognome'])){
            $dati['cognome'] = $_POST['cognome'];
        }
        return $dati;

    }


}