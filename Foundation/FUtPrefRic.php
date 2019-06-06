<?php

/**
* La classe FUtPrefRic gestisce la persistenza dell'associazione tra EUtente ed ERicetta
* @author Gruppo 7
* @package Foundation
*/

class FUtPrefRic
{
	/** oggetto PDO per la connessione al DBMS */
	private $db;

	/** costruttore */
	public function __construct() {
	try {
   
    	$this->db = new PDO ("mysql:dbname=myRecipes;host=127.0.0.1", "root", "pippo");

	} 
	catch (PDOException $e) {
    	echo "Errore: " . $e->getMessage();
    	die();
		}
	}

	/** 
	* Store di una tupla nella tabella utprefric
	* @param $idr, $idi ids della ricetta e dell'ingrediente
	* @return boolean
	*/
	public function store($idric,$idut){
		$query = "INSERT INTO utprefric(id_ricetta,id_utente) VALUES (".$idric.", ".$idut.");";
		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$this->db->commit();
			return true;
		}
		catch (PDOException $e)
		{
			$this->db->rollBack();
			echo "Attenzione, errore: " . $e->getMessage();
			return false;
		}
	}

	/** 
	* Delete di una ricetta preferita dalla tabella FUtPrefRic
	* @param $idr, $idi ids della ricetta e dell'ingrediente
	* @return boolean
	*/
	public function delete($idric,$idut){
		$query = "DELETE FROM utprefric WHERE id_ricetta=".$idric." AND id_utente=".$idut.";";
		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$this->db->commit();
			return true;
		}
		catch (PDOException $e)
		{
			$this->db->rollBack();
			echo "Attenzione, errore: " . $e->getMessage();
			return false;
		}
	}

	/** 
	* Recupera tutti gli id delle ricette di tuple con un certo id utente (ricette preferite dall'utente)
	* @param $idr, id dell'utente
	* @return array di id di ricetta
	*/
	public function loadIdRicbyIdUt($idut){
		$query = "SELECT id_ricetta FROM utprefric WHERE id_utente=".$idut.";";
		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->db->commit();
			$arrId = array();
			foreach ($rows as  $row) {
				array_push($arrId, $row['id_ricetta']);
			}
			return $arrId; //array con chiavi numeriche e valori di id ingredienti
			
		}
		catch (PDOException $e)
		{
			$this->db->rollBack();
			echo "Attenzione, errore: " . $e->getMessage();
			return null;
		}

	}

    /**
     * Metodo che verifica se la coppia id ricetta- id utente è presente nel db (cioè se l'utente preferrisce la ricetta)
     * @param $idr idricetta
     * @param $idu idutente
     * @return bool|null esito
     */
	public function UtPrefRic($idr, $idu){
        $query = "SELECT * FROM utprefric(id_ricetta,id_utente) WHERE id_ricetta= '".$idr."' AND id_utente='".$idu."';";
        try{
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
            if(($row != null) && (count($row)>0)){
                return true;
            }
            else return false;

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