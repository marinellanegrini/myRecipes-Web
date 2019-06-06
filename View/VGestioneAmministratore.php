<?php
require('Smarty/smarty-libs/libs/Smarty.class.php');
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
     * Metodo per recuperare il numero di ingredienti inserito dall'amministratore (numero di ingredienti che la ricetta ha)
     */
    public function recuperaNIngredienti(){
        $n = $_POST['ningredienti'];
        return $n;
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
        if(isset($_FILES['imgcibo'])){
            $fotocibo = $_FILES['imgcibo']['tmp_name'];
            $typefotoc = $_FILES['imgcibo']['type'];
            $fotoobj = new EImmagine($fotocibo, $typefotoc);
            $cibo['img'] = $fotoobj;
        }
        return $cibo;


    }

    /**
     * Funzione per mostrare la form di inserimento di una ricetta
     */
    public function mostraFormInserimento($ningredienti){
        //assegnazione a smarty per mostrare i filtri dell'inserimento ricetta
        //comunico a smarty quanti ingredienti vuole inserire l'admin, in modo da poter costruire la form

    }

    /**
     * Funzione per mostrare la form di inserimento di filtri per la ricerca di commenti
     */
    public function mostraFormCommenti(){
        //assegnazione a smarty per mostrare i filtri per la ricerca commenti

    }

    /**
     * Funzione per mostrare la form di inserimento di un nuovo cibo
     */
    public function mostraFormCibo(){
        //assegnazione a smarty per mostrare la form di inserimento di un nuovo cibo
    }
}