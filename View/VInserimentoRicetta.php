<?php
require_once('Smarty/smarty-libs/libs/Smarty.class.php');
/** class VInserimentoRicetta che gestisce l'input/output per inserire una ricetta
 */

class VInserimentoRicetta
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
     * Metodo per recuperare i dati della ricetta da inserire
     * @return $dati della ricetta (array associativo)
     */
    public function recuperaDatiRicetta(){
        $dati = array();
        //costruzione dell'array con i dati della ricetta
        if(isset($_POST['nome'])){
            $dati['nome'] = $_POST['nome'];
        }
        if(isset($_POST['difficolta'])){
            $dati['difficolta'] = $_POST['difficolta'];
        }
        if(isset($_POST['procedimento'])){
            $dati['procedimento'] = $_POST['procedimento'];
        }
        if(isset($_POST['tprep'])){
            $dati['tprep'] = $_POST['tprep'];
        }
        if(isset($_POST['ndosi'])){
            $dati['ndosi'] = $_POST['ndosi'];
        }
        if(isset($_POST['idcategoria'])){
            $dati['idcategoria'] = $_POST['idcategoria'];
        }
        if(isset($_POST['idcibi']) && isset($_POST['qta'])){
            $arridcibi = $_POST['idcibi'];
            $arrqta = $_POST['qta'];
            $ingredienti = array_combine($arridcibi, $arrqta); //creazione di array con chiavi id cibo e valore rispettiva qta
            $dati['ingredienti'] = $ingredienti;
        }
        if(isset($_FILES['immprincipale'])){
            $tempname = $_FILES['immprincipale']['tmp_name'];
            $fotop = file_get_contents($tempname);

            $typefotop = $_FILES['immprincipale']['type'];
            $fotoobj = new EImmagine($fotop, $typefotop);
            $dati['imgprinc'] = $fotoobj;
        }
        if(isset($_FILES['gallery'])){
            $tempnames = $_FILES['gallery']['tmp_name']; //array di tempname img
            $types = $_FILES['gallery']['type']; //array di types
            $gallery = array();
            for ($i = 0; $i<count($tempnames); $i++){
                $fotog = file_get_contents($tempnames[$i]);
                $fotogalleryobj = new EImmagine($fotog, $types[$i]);
                array_push($gallery,$fotogalleryobj); //costruzione dell'array di EImmagine gallery
            }
            $dati['gallery'] = $gallery;
        }
        return $dati;
    }


}