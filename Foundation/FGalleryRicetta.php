<?php


/**
 * La classe FGalleryRicetta fornisce le query per gli oggetti EImmagine della gallery della ricetta
 * @author Gruppo 7
 * @package Foundation
 */
class FGalleryRicetta extends FDatabase
{
    /**costruttore */
    public function __construct(){
        parent::__construct(); //estende la superclasse FDatabase
        $this->table = "galleryricetta";
        $this->class = "FGalleryRicetta";
        $this->values = "(:id, :data, :type, :id_ricetta)";
    }

    /**
     * Metodo che effettua il bind degli attributi di
     * EImmagine, con i valori contenuti nella tabella galleryricetta
     * @param $stmt
     * @param $immagine della gallety da salvare
     */
    public static function bind( $stmt, EImmagine $immagine){
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':data', $immagine->getData(), PDO::PARAM_LOB);
        $stmt->bindValue(':type', $immagine->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':id_ricetta', $immagine->getIdesterno(), PDO::PARAM_INT);

    }

    /**
     * Questo metodo crea un oggetto da una riga della tabella galleryricetta
     * @param $row array che rappresenta una riga della tabella galleryricetta
     * @return un oggetto di tipo EImmagine
     */
    public function getObjectFromRow($row){

        $img = new EImmagine(base64_encode($row['data']), $row['type']);
        $img->setIdesterno($row['id_ricetta']);
        $img->setId($row['id']);
        return $img;
    }

    /**
     * Permette di caricare un'immagine della gallery ricetta dal db
     * @param $id dell'immagine da recuperare
     * @return oggetto di tipo EImmagine
     */
    public function loadById ($id){
        $row = parent::loadbyId($id); //attraverso il metodo della classe padre restituisco la riga
        $arrimg = $row[0];
        if(($row!=null) && (count($row)>0)){
            $img = $this->getObjectFromRow($arrimg);
            return $img; // oggetto di tipo EImmagine
        }
        else return null;
    }

    /**
     * Load di immagini dal database dato un gruppo di id
     * @param $ids array di ids degli oggetti da recuperare
     * @return array di EImmagine
     */
    public function loadAllByIds($ids){
        $array = parent::loadAllByIds($ids);
        $arrayobj=array();
        if(($array!=null) && (count($array)>0)){
            foreach($array as $i){
                $img=$this->getObjectFromRow($i);
                array_push($arrayobj, $img);
            }
            return $arrayobj;
        }
        else return null;
    }

    /**Metodo che ricostruisce la gallery relativa a una ricetta
     * @param id della ricetta
     * @return arrayimg array di EImmagine (gallery)
     **/
    public function loadByIdRicetta($idricetta){
        $query="SELECT * FROM ".$this->table." WHERE id_ricetta=".$idricetta.";";
        try {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
            $arrayimg = array();
            foreach ($rows as $row){
                $img = $this->getObjectFromRow($row);
                array_push($arrayimg, $img);
            }
            return $arrayimg;
        }

        catch (PDOException $e)
        {
            $this->db->rollBack();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }
    }

}