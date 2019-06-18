<?php
require_once('Smarty/smarty-libs/libs/Smarty.class.php');
/** class VGestioneAmministratore che gestisce l'input/output per mostrare le funzionalità dell'amministratore
 * implementate: banna commenti e inserimento ricetta
 */

class VGestioneAmministratore
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
     * Metodo per recuperare il cibo inserito dall'amministratore
     * @return $cibo array associtivo
     */
    public function recuperaCibo(){
        $cibo = array();
        if(isset($_POST['nome'])){
            $cibo['nome'] = $_POST['nome'];
        }
        if(isset($_POST['um'])){
            $cibo['um'] = $_POST['um'];
        }
        if(isset($_FILES['imgcibo'])){

            $tempname = $_FILES['imgcibo']['tmp_name'];

            $immagine = file_get_contents($tempname); //file_get_contents torna un file specificato come stringa

            $typefotoc = $_FILES['imgcibo']['type'];
            $fotoobj = new EImmagine($immagine, $typefotoc);
            $cibo['img'] = $fotoobj;

        }

        return $cibo;
    }



    /**
     * Funzione per mostrare la form di inserimento di una ricetta
     */
    public function mostraFormInserimento($cibi){
        $this->smarty->assign('cibi',$cibi);
        $this->smarty->display("NuovaRicetta.tpl");
        //assegnazione a smarty per mostrare i filtri dell'inserimento ricetta
    }

    /**
     * Funzione per mostrare la form di inserimento di filtri per la ricerca di commenti
     */
    public function mostraFormCommenti(){
        //assegnazione a smarty per mostrare i filtri per la ricerca commenti
        $this->smarty->display("Monitoraggio.tpl");

    }

    /**
     * Funzione per mostrare la form di inserimento di un nuovo cibo
     */
    public function mostraFormCibo(){
        //assegnazione a smarty per mostrare la form di inserimento di un nuovo cibo
        $this->smarty->display("NuovoIngrediente.tpl");
    }
}