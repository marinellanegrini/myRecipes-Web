<?php
require('Smarty/smarty-libs/libs/Smarty.class.php');
/** class VRisultati gestisce l'input/output che permette di mostrare all'utente i risultati della ricerca secondo le
 *modalità disponibili
 *
 */
class VRisultati
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
     * Metodo che recupera l'array di idcibo inviati con la form
     * @return array|mixed array di id inseriti
     */
    public function recuperaIngredienti(){
        $arrayid=array();
        if(isset($_POST['cibi'])){
            $arrayid = $_POST['cibi']; //recupero array di id cibi inviati con la form
        }
        return $arrayid;
    }

    /**
     * Metodo che recupera i filtri inseriti nella form
     * @return array associativo con i filtri
     */
    public function recuperaFiltri(){
        $filtri = array();
        if(isset($_POST['tprep']) && isset($_POST['diff']) && isset($_POST['cat'])){
            $filtri['tprep'] = $_POST['tprep'];
            $filtri['diff'] = $_POST['diff'];
            $filtri['cat'] = $_POST['cat'];
        }
        return $filtri;
    }


    /**
     * Metodo per recuperare il nome inserito nella barra di ricerca
     */
    public function recuperaNome(){
        $nome = "";
        if(isset($_POST['nomericetta'])){
            $nome = $_POST['nomericetta'];
        }
        return $nome;
    }

    /**
     * Metodo per mostrare i risultati di una ricerca
     */
    public function mostraRisultati($risultati){
        //passaggio dei risultati a smarty per mostrare i risultati della ricerca (if utenti loggati e non)
        $session = Sessione::getInstance();
        if($session->isLoggedUtente()){

        } else {

        }
    }



}