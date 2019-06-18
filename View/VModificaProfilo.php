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
    public function mostraModificaProfilo($utente,$errore){

        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('errore',$errore);
        $this->smarty->display('ModificaProfilo.tpl');

    }

    /**
     * Funzione che verifica che la password e la conferma sono uguali
     * @return bool esito validazione
     */
    private function validaPassword(){
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
    private function validaUsername(){
        $pm = FPersistentManager::getInstance();
        $session = Sessione::getInstance();

        if($_POST['username']==$session->getUtente()->getUsername()){
            $valido = true;
        } else {
            $esito = $pm->esisteUsername($_POST['username']);
            if($esito){
                $valido = false;
            } else {
                $valido = true;
            }
        }
        if($valido){
            return true;
        } else { return false;}
    }

    /**
     * Funzione che verifica se la mail inserita è conforme
     * @return mixed esito
     */
    private function validaMail(){
        $mail = $_POST['mail'];
        $accettato = preg_match('/^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/', $mail);
        if($accettato){
            return true;
        } else { return false;}
    }

    /**
     * Funzione che verifica se il nome inserito è conforme
     * @return mixed esito
     */
    private function validaNome(){
        $nome = $_POST['nome'];
        $accettato = preg_match('/[A-Za-z]$/', $nome);
        if($accettato){
            return true;
        } else { return false;}
    }

    /**
     * Funzione che verifica se il cognome inserito è conforme
     * @return mixed esito
     */
    private function validaCognome(){
        $nome = $_POST['cognome'];
        $accettato = preg_match('/[A-Za-z]$/', $nome);
        if($accettato){
            return true;
        } else { return false;}
    }

    /**
     * Validazione input modifica profilo
     * @return string che mostra l'errore presentato, stringa vuota se non ci sono errori
     */
    public function validaInputModifica(){
        $errore="";
        if(! $this->validaUsername()){
            $errore = $errore."Username già presente.\n";
        }
        if(! $this->validaPassword()){
            $errore = $errore."Le password non coincidono.\n";
        }
        if(! $this->validaMail()){
            $errore = $errore."La mail non è conforme.\n";
        }
        if(! $this->validaNome()){
            $errore = $errore."Il nome non è valido.\n";
        }
        if(! $this->validaCognome()){
            $errore = $errore."Il cognome non è valido.\n";
        }
        return $errore;
    }

    /**
     * Funzione per recuperare i dati dalla form di modifica
     * @return $dati array associativo
     */
    public function recuperaDati(){
        $session = Sessione::getInstance();
        $ut=$session->getUtente();
        $dati= array();
        if(isset($_POST['username'])){
            $dati['username'] = $_POST['username'];
        }
        if(isset($_POST['password'])){
            $dati['password'] = $_POST['password'];
        }
        if(isset($_POST['mail'])){
            $dati['email'] = $_POST['mail'];
        }
        if(isset($_POST['nome'])){
            $dati['nome'] = $_POST['nome'];
        }
        if(isset($_POST['cognome'])){
            $dati['cognome'] = $_POST['cognome'];
        }

        return $dati;

    }

    public function recuperaFoto(){
           $tempname = $_FILES['immagine']['tmp_name'];
           $foto = file_get_contents($tempname);
           $foto = addslashes($foto);
           $typefotop = $_FILES['immagine']['type'];
           $fotoobj = new EImmagine($foto, $typefotop);
           return $fotoobj;
    }


}
