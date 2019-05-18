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


    /**
     * Metodo che effettua una load dato l'id e l'oggetto da recuperare
     * @param $nameobj nome dell'oggetto
     * @param $id dell'oggetto da recuperare
     * @return ECategoria|ECibo|EIngrediente|ERicetta|EUtente|oggetto*
     *
     */
    public function loadById ($nameobj, $id){
        switch ($nameobj){
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


    /**
     * Metodo che effettua una store di un oggetto
     * @param $obj oggetto da salvare
     * @return bool|id dell'oggetto recuperato
     */
    public function store($obj){
        $nameobj = get_class($obj);
        switch ($nameobj){
            case "ECategoria":
                $fcat = new FCategoria();
                $id = $fcat->store($obj);
                break;
            case "ECibo":
                $fcib = new FCibo();
                $id = $fcib->store($obj);
                break;
            case "ECommento":
                $fcom = new FCommento();
                $id = $fcom->store($obj);
                break;
            case "EIngrediente":
                $fi = new FIngrediente();
                $id = $fi->store($obj);
                break;
            case "ERicetta":
                $fr = new FRicetta();
                $id = $fr->store($obj);
                break;
            case "EUtente":
                $fu = new FUtente();
                $id = $fu->store($obj);
                break;
            default:
                $id = false;
        }
        return $id;

    }


    /**
     * @param $idric idricetta
     * @param $idingr iduingrediente
     * @return bool esito
     */
    public function storeIngrRicetta($idric, $idingr){
        $frti = new FRictoIngr();
        $ret = $frti->store($idric,$idingr);
        return $ret;
    }

    /**
     * @param $nameobj nome dell'oggetto
     * @param $id id dell'oggetto
     * @param $attr attributo da aggiornare
     * @param $val valore da impostare
     * @return bool esito aggiornamento
     */
    public function update($nameobj, $id, $attr, $val){
        switch ($nameobj){
            case "categoria":
                $fcat = new FCategoria();
                $ret = $fcat->update($id,$attr,$val);
                break;
            case "cibo":
                $fcib = new FCibo();
                $ret = $fcib->update($id,$attr,$val);
                break;
            case "commento":
                $fcom = new FCommento();
                $ret = $fcom->update($id,$attr,$val);
                break;
            case "ingrediente":
                $fi = new FIngrediente();
                $ret = $fi->update($id,$attr,$val);
                break;
            case "ricetta":
                $fr = new FRicetta();
                $ret = $fr->update($id,$attr,$val);
                break;
            case "rictoingr":
                $frti = new FRictoIngr();
                $ret = $frti->update($id,$attr,$val);
                break;
            case "utente":
                $fu = new FUtente();
                $ret = $fu->update($id,$attr,$val);
                break;
            case "utprefric":
                $fupr = new FUtPrefRic();
                $ret = $fupr->update($id,$attr,$val);
                break;
            default:
                $ret = null;
        }
        return $ret;
    }






}
