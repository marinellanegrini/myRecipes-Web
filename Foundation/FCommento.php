<?php
require_once '/Users/marinellanegrini/Documents/Workspace/myRecipesWeb/Classes.php';

/**
 * La classe FCommento fornisce la persistenza
 * @author Gruppo 7
 * @package Foundation
 */

class FCommento extends FDatabase
{
	/**costruttore */
	public function __construct(){
		parent::__construct(); //estende la superclasse FDatabase
		$this->table = "commento";
		$this->class = "FCommento";
		$this->values = "(:id, :testo, :data, :ora, :bannato, :id_utente, :id_ricetta)";
	}

	/** 
	* Metodo che effettua il bind degli attributi della tabella
	* ECommento, con i valori contenuti nella tabella ECommento
	* @param $stmt
	* @param $commento da salvare
	*/
	public static function bind( $stmt, ECommento $commento){
		$stmt->bindValue(':id', NULL, PDO::PARAM_INT);
		$stmt->bindValue(':testo', $commento->getTesto(), PDO::PARAM_STR);
		$stmt->bindValue(':data', $commento->getData(), PDO::PARAM_STR);
		$stmt->bindValue(':ora', $commento->getOra(), PDO::PARAM_STR);
		$stmt->bindValue(':bannato', $commento->isBannato(), PDO::PARAM_BOOL);
        $stmt->bindValue(':id_utente', $commento->getIdUtente(), PDO::PARAM_INT);
        $stmt->bindValue(':id_ricetta', $commento->getIdRicetta(), PDO::PARAM_INT);
	}

    /**
    * Questo metodo crea un oggetto da una riga della tabella commento 
    * @param $row array che rappresenta una riga della tabella commento
    * @return un oggetto di tipo ECommento
    */
    public  function getObjectFromRow($row){
    	$comm = new ECommento ($row['testo'], $row['data'], $row['ora'], $row['id_utente'],$row['id_ricetta']);
    	$comm->setId($row['id']);
        $comm->setStato($row['bannato']);
    	return $comm;
    }

    /** 
    * Permette di caricare un commento sul db
    * @param $id del commento
    * @return oggetto di tipo ECommento
    */
    public function loadById ($id){
    	$row = parent::loadbyId($id); //attraverso il metodo della classe padre restituisco la riga
        $arrcomm = $row[0];
    	if(($row!=null) && (count($row)>0)){
    		$comm = $this->getObjectFromRow($arrcomm);
    		return $comm; // oggetto di tipo ECommento
    	}
    	else return null;
    }

    /**
    * Load di commenti dal database dato un gruppo di id
    * @param $ids array di ids degli oggetti da recuperare
    * @return array di ECommento
    */
    public function loadAllByIds($ids){
    	$array = parent::loadAllByIds($ids);
    	$arrayobj=array();
    	if(($array!=null) && (count($array)>0)){
    		foreach($array as $i){
    			$comm=$this->getObjectFromRow($i);
    			array_push($arrayobj, $comm);
    		}
    		return $arrayobj;
    	}
    	else return null;
    }


    /**Metodo che trova i commenti relativi a una ricetta
    * @param id della ricetta
    * @return array di ECommento
    **/
    public function loadByIdRicetta($idricetta){
    	$query = "SELECT * FROM ".$this->table." WHERE id_ricetta=".$idricetta.";";
    	try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->db->commit();
			$arraycomm=array();
			foreach ($rows as $row){
				$comm=$this->getObjectFromRow($row);
				array_push($arraycomm,$comm);
			}
			return $arraycomm;
		}

		catch (PDOException $e)
		{
			$this->db->rollBack();
			echo "Attenzione, errore: " . $e->getMessage();
			return null;
		}
    }


    /**Metodo che trova i commenti relativi a un utente
    * @param id dell'utente
    * @return array di ECommento
    **/
    public function loadByIdUtente($idutente){
        $query="SELECT * FROM ".$this->table." WHERE id_utente=".$idutente.";";
        try {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
            $arrayut=array();
            foreach ($rows as $row){
                $ut=$this->getObjectFromRow($row);
                array_push($arrayut,$ut);
            }
            return $arrayut;
        }

        catch (PDOException $e)
        {
            $this->db->rollBack();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }
    }

    /**Metodo che restituisce i commenti che contengono una determinata stringa
    * @param string $val da ricercare
    * @param $attr attributo su cui ricercare $val
    * @return array di ECommento
    */
    public function search($val, $attr){
        $array = parent::search($val, $attr);
        $arrayobj = array();
        if(($array!=null) && (count($array)>0)){
            foreach($array as $i){
                $comm = $this->getObjectFromRow($i);
                array_push($arrayobj, $comm);
            }
            return $arrayobj;
        }
        else return null;

    }
}

?>