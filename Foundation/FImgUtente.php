<?php

/**
 * La classe FImgUtente fornisce le query per gli oggetti EImmagine degli utenti
 * @author Gruppo 7
 * @package Foundation
 */
class FImgUtente extends FDatabase
{
    /**costruttore */
    public function __construct(){
        parent::__construct(); //estende la superclasse FDatabase
        $this->table = "imgutente";
        $this->class = "FImgUtente";
        $this->values = "(:id, :data, :type, :id_utente)";
    }

    /**
     * Metodo che effettua il bind degli attributi di
     * EImmagine, con i valori contenuti nella tabella imgutente
     * @param $stmt
     * @param $immagine da salvare
     */
    public static function bind( $stmt, EImmagine $immagine){
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':data', $immagine->getData(), PDO::PARAM_LOB);
        $stmt->bindValue(':type', $immagine->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':id_utente', $immagine->getIdesterno(), PDO::PARAM_INT);

    }

    /**
     * Questo metodo crea un oggetto da una riga della tabella imgutente
     * @param $row array che rappresenta una riga della tabella ingutente
     * @return un oggetto di tipo EImmagine
     */
    public function getObjectFromRow($row){
        $img = new EImmagine($row['data'], $row['type']);
        $img->setIdesterno($row['id_utente']);
        $img->setId($row['id']);
        return $img;
    }

    /**
     * Permette di caricare un'immagine utente dal db
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

    /**Metodo che trova l'immagine relativa a un utente
     * @param id dell'utente
     * @return EImmagine
     **/
    public function loadByIdUtente($idutente){
        $query="SELECT * FROM ".$this->table." WHERE id_utente=".$idutente.";";
        try {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();

            if(($row!=null) && (count($row)>0)){
                $arrimg = $row[0];
                $img = $this->getObjectFromRow($arrimg);
                return $img; // oggetto di tipo EImmagine
            }
            else {
                return null;
            }

        }

        catch (PDOException $e)
        {
            $this->db->rollBack();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }
    }

}