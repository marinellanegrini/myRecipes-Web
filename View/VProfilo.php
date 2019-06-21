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
    public function mostraProfilo($utente, $msg){
        if($utente!=null){
            $img=$utente->getImmagine();
            $img->setData(base64_encode($img->getData()));
            $utente->setImmagine($img);
        }

        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('Profilo.tpl');

    }


    /**
     * Funzione che recupera la foto inserita dall'utente
     * @return array associativo
     */
    public function recuperaFoto(){
        $tmpname = $_FILES['immagine']['tmp_name'];
        $data = file_get_contents($tmpname);
        $foto['dati'] = addslashes($data);
        $foto['type'] = $_FILES['immagine']['type'];
        return $foto;
    }


}


