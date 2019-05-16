<?php
require_once 'Classes.php';

class PersistentManager {

    /** l'unica istanza della classe */
    private static $instance = null;

    /**
     * Metodo che restituisce l'unica istanza dell'oggetto.
     * @return PersistantManager l'istanza dell'oggetto.
     */
    public static function getInstance(){ //restituisce l'unica istanza (creandola se non esiste gia)
        if(static::$instance==null){
            static::$instance=new PersistentManager();
        }
        return static::$instance;
    }

    public function loadById ($obj, $id){
        switch ($obj){
            case "categoria":
                $fcat = new FCategoria();
                $ret = $fcat->loadById($id);
                break;
            case "cibo":
                $fcib = new FCibo();
                $ret = $fcib->loadById($id);
                break;
            case "commento":
                $fcom = new FCommento();
                $ret = $fcom->loadById($id);
                break;
            case "ingrediente":
                $fi = new FIngrediente();
                $ret = $fi->loadById($id);
                break;
            case "ricetta":
                $fr = new FRicetta();
                $ret = $fr->loadById($id);
                break;
            case "rictoingr":
                $frti = new FRictoIngr();
                $ret = $frti->loadById($id);
                break;
            case "utente":
                $fu = new FUtente();
                $ret = $fu->loadById($id);
                break;
            case "utprefric":
                $fupr = new FUtPrefRic();
                $ret = $fupr->loadById($id);
                break;
            default:
                $ret = null;
        }
        return $ret;

}






}
