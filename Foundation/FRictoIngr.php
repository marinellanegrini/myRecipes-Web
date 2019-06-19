<?php
if(file_exists('config.inc.php')) require_once 'config.inc.php';
/**
* La classe FRictoIngr gestisce la persistenza dell'associazione tra ERicetta ed EIngrediente
* @author Gruppo 7
* @package Foundation
*/

class FRictoIngr
{
	/** oggetto PDO per la connessione al DBMS */
	private $db;

	/** costruttore */
	public function __construct() {
        global $host,$database,$username,$password;
        try {

            $this->db = new PDO ("mysql:dbname=$database;host=127.0.0.1", $username, $password);

        }
        catch (PDOException $e) {
    	    echo "Errore: " . $e->getMessage();
    	    die();
		}
	}

	/** 
	* Store di una tupla nella tabella rictoingr
	* @param $idr, $idi ids della ricetta e dell'ingrediente
	* @return boolean
	*/
	public function store($idr, $idi){
		$query = "INSERT INTO rictoingr(id_ricetta,id_ingrediente) VALUES (".$idr.", ".$idi.");";
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
	* Recupera tutti gli id degli ingredienti di tuple con un certo id ricetta
	* @param $idr, id della ricetta 
	* @return array di id ingredienti
	*/
	public function loadIdIngrbyIdRic($idr){
		$query = "SELECT id_ingrediente FROM rictoingr WHERE id_ricetta=".$idr.";";
		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->db->commit();
			$arrId = array();
			foreach ($rows as  $row) {
				array_push($arrId, $row['id_ingrediente']);
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