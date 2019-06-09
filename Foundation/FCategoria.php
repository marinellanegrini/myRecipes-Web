<?php



/**
 * La classe FCategoria fornisce query per gli oggetti ECategoria
 * @author Gruppo 7
 * @package Foundation
 */

class FCategoria extends FDatabase
{

    /** costruttore */
    public function __construct(){
        parent::__construct();
    	$this->table= 'categoria';
    	$this->values='(:id,:nome)';
    	$this->class='FCategoria';
    }


    /**
     * Questo metodo lega gli attributi della categoria che si vogliono inserire con i parametri della INSERT
     * @param $stmt 
     * @param $user utente i cui dati devono essere inseriti nel DB
     */
    public static function bind($stmt,ECategoria $cate){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); 
        $stmt->bindValue(':nome', $cate->getNome(), PDO::PARAM_STR);
    }

    /** Metodo che crea un oggetto ECategoria partire dalla tupla della tabella categoria
    * @param $row array che rappresenta la tupla
    * @return ECategoria
    */
    public function getObjectFromRow($row){
        $catObj = new ECategoria($row['nome']);
        $catObj->setId($row['id']);
        return $catObj;
    }

    /** Load di una categoria sul DB in base al suo id.
    * @param $id della categoria da caricare
    * @return ECategoria recuperata
    */
    public function loadById($idcate){
        $row = parent::loadById($idcate);

        if(($row!=null) && (count($row)>0)){
            $arrcategoria = $row[0];
            $categoria = $this->getObjectFromRow($arrcategoria);
            return $categoria;
        }
        else return null;
    }

    /** Metodo che restituisce gli IDs categoria noti i nomi delle categorie
    * @param $ids array di nome categoria
    * @return array di id categoria
    */
    public function loadIdCatbyName($nomi){
        for ($i=0; $i<count($nomi); $i++)
        {
            $nomi[$i]="'".$nomi[$i]."'";           
        }
        $s = implode(", ", $nomi);
        $s = "(".$s.")";
        $query = "SELECT id FROM ".$this->table." WHERE nome IN ".$s.";";
        try {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
            $ris = array();
            foreach ($rows as $value) {
                array_push($ris, $value['id']);
            }
            return $ris;
        }
        catch (PDOException $e)
        {
            $this->db->rollBack();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }

    }

    
}
?>
