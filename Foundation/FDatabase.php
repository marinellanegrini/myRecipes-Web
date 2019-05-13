<?php
require_once 'Classes.php';

/** Lo scopo di questa classe è gestire la connessione con il DBMS e contiene i metodi utili 
* per effettuare le query al Database
* @author gruppo 7
* @package Foundation
*/

class FDatabase
{

	/** oggetto PDO per la connessione al DBMS */
	protected $db;

	/** nome della tabella */
	protected $table;

	/** nome della classe */
	protected $class;

	/** attributi della tabella */
	protected $values;

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
	* Store di un oggetto sul database
	* @param $obj oggetto da salvare
	* @return id dell'oggetto inserito
	*/ 

	public function store($obj) {
		$query = "INSERT INTO ".$this->table." VALUES ".$this->values.";";
		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$this->class::bind($stmt, $obj);
			$stmt->execute();
			$id = $this->db->lastInsertId();
			$this->db->commit();
			return $id;
		}
		catch (PDOException $e)
		{
			$this->db->rollBack();
			echo "Attenzione, errore: " . $e->getMessage();
			return false;
		}
	}

	/**
	* Verifica esistenza di una tupla nel database 
	* @param $id id della tupla
	* @return boolean
	*/
	public function exist($id) {
		$query = "SELECT * FROM ".$this->table." WHERE id=".$id.";";
		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if (count($rows)>0) return true;
			else return false;
			$this->db->commit();
		}
		catch (PDOException $e)
		{
			$this->db->rollBack();
			echo "Attenzione, errore: " . $e->getMessage();
			return null;
		}
	}

	/** 
	* Cancella una npla dal database
	* @param $id id della tupla
	* @return boolean
	*/

	public function delete($id) {
		$query = "DELETE FROM ".$this->table . " WHERE id=".$id.";";
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
	* Update di una npla del database
	* @param $id dell' oggetto da aggiornare, $attr della tabella, $val nuovo valore
	* @return boolean
	*/

	public function update($id, $attr, $val) {
		$query = "UPDATE ".$this->table. " SET ".$attr." = '".$val."' WHERE id=".$id.";";
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
	* Load di un oggetto dal database noto il suo id
	* @param $id dell' oggetto da recuperare
	* @return tupla recuperata
	*/

	public function loadById($id){
		$query = "SELECT * FROM ".$this->table." WHERE id=".$id.";";
		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->db->commit();
			return $row;
		}
		catch (PDOException $e)
		{
			$this->db->rollBack();
			echo "Attenzione, errore: " . $e->getMessage();
			return null;
		}
	}

	/**
	* Load di oggetti dal database dato un gruppo di id
	* @param $ids array di ids degli oggetti da recuperare
	* @return tuple recuperate
	*/

	public function loadAllByIds($ids){
		
		$s = implode(", ", $ids);
		$s = "(".$s.")";
		$query = "SELECT * FROM ".$this->table." WHERE id IN ".$s.";";
		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->db->commit();
			return $rows;
		}
		catch (PDOException $e)
		{
			$this->db->rollBack();
			echo "Attenzione, errore: " . $e->getMessage();
			return null;
		}

	}

	/**
	* Ricerca generica di oggetti dal database
	* @param string $val da ricercare
	* @param $attr attributo su cui ricercare $val
	* @return tuple recuperate
	*/
	public function search($val, $attr){
		$query = "SELECT * FROM ".$this->table." WHERE ".$attr." LIKE '%".$val."%';";
		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->db->commit();
			return $rows;
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