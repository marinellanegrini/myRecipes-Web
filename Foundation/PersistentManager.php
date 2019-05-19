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
     * Metodo che effettua una load dato l'id e il nome dell'oggetto da recuperare
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
     * Metodo che effettua una load dato un gruppo di ids e il nome degli oggetti da recuperare
     * @param $nameobj nome dell'oggetto
     * @param $id array degli oggetti da recuperare
     * @return Array di oggetti recuperati
     *
     */
    public function loadAllByIds ($nameobj, $id){
        switch ($nameobj){
            case "commento":
                $fcom = new FCommento();
                $ret = $fcom->loadAllByIds($id);
                break;
            case "ingrediente":
                $fi = new FIngrediente();
                $ret = $fi->loadAllByIds($id);
                break;
            case "ricetta":
                $fr = new FRicetta();
                $ret = $fr->loadAllByIds($id);
                break;
            case "utente":
                $fu = new FUtente();
                $ret = $fu->loadAllByIds($id);
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

     /**
     * Metodo che effettua delete di un oggetto
     * @param $id dell'oggetto
     * @param $nameobj nome dell'oggetto
     * @return bool esito
     */
    public function delete($nameobj,$id){
    	switch ($nameobj){
    		case "categoria":
    			$del= new FCategoria();
    			$ret= $del->delete($id);
    			break;
    		case "cibo":
    			$del= new FCibo();
    			$ret= $del->delete($id);
    			break;
    		case "commento":
    			$del= new FCommento();
    			$ret= $del->delete($id);
    			break;
    		case "ingrediente":
    			$del= new FIngrediente();
    			$ret= $del->delete($id);
    			break;
    		case "ricetta":
    			$del= new FRicetta();
    			$ret= $del->delete($id);
    			break;
    		case "rictoingr":
    			$del= new FRictoIngr();
    			$ret= $del->delete($id);
    			break;
    		case "utente":
    			$del= new FUtente();
    			$ret= $del->delete($id);
    			break;
    		default:
    			$ret = null;
    	}
    	return $ret;
    }

    /**
     * @param $idric id della ricetta
     * @param $idut id dell'utente
     * @return bool esito
     */
    public function deleteUtPrefRic($idric, $idut)
    {
    	$del= new FUtPrefRic();
    	$ret= $del->delete($idric,$idut);
    	return $ret;
    }

    /**
     * @param $id dell'oggetto
     * @param $nameobj nome dell'oggetto
     * @return bool esito
     */
    public function exist($nameobj,$id)
    {
    	switch ($nameobj){
    		case "categoria":
    			$del= new FCategoria();
    			$ret= $del->exist($id);
    			break;
    		case "cibo":
    			$del= new FCibo();
    			$ret= $del->exist($id);
    			break;
    		case "commento":
    			$del= new FCommento();
    			$ret= $del->exist($id);
    			break;
    		case "ingrediente":
    			$del= new FIngrediente();
    			$ret= $del->exist($id);
    			break;
    		case "ricetta":
    			$del= new FRicetta();
    			$ret= $del->exist($id);
    			break;
    		case "rictoingr":
    			$del= new FRictoIngr();
    			$ret= $del->exist($id);
    			break;
    		case "utente":
    			$del= new FUtente();
    			$ret= $del->exist($id);
    			break;
    		default:
    			$ret = null;
    	}
    	return $ret;
    }

    /**
     * Metodo che effettua la load degli id di una categoria in base al nome
     * @param $nomi array di nomi di categorie
     * @return bool esito
     */
    public function loadIdCatNam($nomi){
    	$del= new FCategoria();
    	$ret= $del->loadIdCatbyName($nomi);
    	return $ret;
    }


    /**
     * Metodo che effettua la load di un commento dato l'id della ricetta
     * @param $id id di ricette
     * @return bool esito
     */
    public function loadCommByRic($id){
    	$del= new FCommento();
    	$ret= $del->loadByIdRicetta($id);
    	return $ret;
    }

    /**
     * Metodo che effettua la load di un commento dato l'id dell'utente
     * @param $id id di ricette
     * @return bool esito
     */
    public function loadCommByIdUt($id){
    	$del= new FCommento();
    	$ret= $del->loadByIdUtente($id);
    	return $ret;
    }

    /**
     * Metodo che effettua la ricerca di oggetti
     * @param $nameobj nome dell'oggetto
     * @param string $val da ricercare
     * @param $attr attributo su cui ricercare $val
     * @return oggetti recuperati
     */
    public function search($nameobj,$val, $attr){
        switch ($nameobj){
            case "cibo":
                $fcib = new FCibo();
                $ret = $fcib->search($val,$attr);
                break;
            case "commento":
                $fcom = new FCommento();
                $ret = $fcom->search($val,$attr);
                break;
            case "ricetta":
                $fr = new FRicetta();
                $ret = $fr->search($val,$attr);
                break;
            case "utente":
                $fu = new FUtente();
                $ret = $fu->search($val,$attr);
                break;
            default:
                $ret = null;
        }
        return $ret;
    }


    /** Metodo che restituisce gli IDs ingrediente noti gli ID dei cibi
     * @param $ids array di ids cibo
     * @return array di id ingrediente
     */
    public function loadIdIngrByIdCibo($ids){
        $fingr = new FIngrediente();
        $ris = $fingr->loadIdIngrbyIdCibo($ids);
        return $ris;
    }

    /**
     * Metodo che permette di effettuare la ricerca per ingrediente
     * @param $idscibo id dei cibi selezionati dall'utente
     * @return array di ERicetta recuperate con la ricerca
     *
     */
    public function ricercaTramiteIngrediente($idscibo){
        $fr = new FRicetta();
        $ret = $fr->ricercaPerIngrediente($idscibo);
        return $ret;
    }

    /**
     * Metodo che permette di effettuare la ricerca tramite filtri
     * @param $idcat id della categoria della ricetta da cercare
     * @param $tprep tempo di preparazione (fino a 60 min l'intero rappresenta il numero di minuti, per tempi maggiori di un'ora il numero è >=61)
     * @param $diff intero che rappresenta la difficoltà
     * @return array di ERicetta recuperate con la ricerca
     *
     */
    public function ricercaTramiteFiltri($idcat, $tprep, $diff){
        $filtri['cat'] = $idcat;
        $filtri['diff'] = $diff;
        $filtri['tprep'] = $tprep;
        $fr = new FRicetta();
        $ret = $fr->ricercaPerFiltri($filtri);
        return $ret;

    }


    /**
     *
     * Metodo che, dato un id ricetta, recupera gli ids di tutti gli ingredienti che hanno quell'id ricetta
     * @param $idr idricetta
     * @return array di id igrediente
     *
     */
    public function loadIdIngrByIdRicetta($idr){
        $frti = new FRictoIngr();
        $ret = $frti->loadIdIngrbyIdRic($idr);
        return $ret;
    }

    

    /**
     * Metodo che esegue la load di un utente in base all'username
     * @param $username dell'utente
     * @return EUtente recuperato
     */
    public function loadUtByUsername($username){
        $ut = new FUtente();
        $ret = $ut->loadByUsername($username);
        return $ret;
    }


    /**
     * Recupera tutti gli id delle ricette con un certo id utente
     * @param $id, id dell'utente
     * @return array di id di ricetta
     */
    public function loadIdRicettabyIdUtente($id){
       $upr = new FUtPrefRic();
       $ret = $upr->loadIdRicbyIdUt($id);
       return $ret;
    }


}
