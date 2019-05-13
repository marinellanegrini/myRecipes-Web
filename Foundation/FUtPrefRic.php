<?php
require_once 'Classes.php';

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
	* Recupera tutti gli id delle ricette di tuple con un certo id utente
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
}


?>