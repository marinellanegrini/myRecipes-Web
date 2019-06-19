<?php
require_once('Smarty/smarty-libs/libs/Smarty.class.php');
/** class VProfilo gestisce l'input/output che permette all'utente di visualizzare il proprio profilo
 */
class VProfilo
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
     * Funzione che mostra il profilo dell'utente
     * @param $utente da mostrare
     */
    public function mostraProfilo($utente){
        if($utente!=null){
            $img=$utente->getImmagine();
            $img->setData(base64_encode($img->getData()));
            $utente->setImmagine($img);
        }

        $this->smarty->assign('utente', $utente);
        $this->smarty->display('Profilo.tpl');

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


