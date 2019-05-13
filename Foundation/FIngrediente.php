<?php
require_once '/Users/marinellanegrini/Documents/Workspace/myRecipesWeb/Classes.php';

/**
* La classe FIngrediente gestisce la persistenza di oggetti EIngrediente
* @author Gruppo 7
* @package Foundation
*/

class FIngrediente extends FDatabase
{
	/** costruttore */
	public function __construct() {
		parent::__construct(); //richiamo del costruttore di FDatabase
		$this->table = "ingrediente";

		$this->class = "FIngrediente";

		$this->values = "(:id, :qta, :id_cibo)";
	}

	/**
	* Metodo che fa il bind di tutti gli attributi di EIngrediente con i valori delle colonne *della tabella ingrediente per poter fare le INSERT
	* @param PDOStatement $stmt
	* @param EIngrediente ingrediente da salvare su DB
	*/
	public static function bind($stmt, EIngrediente $ingrediente){
		$stmt->bindValue(':id', NULL, PDO::PARAM_INT); // id è NULL perchè AUTOINCREMENT
		$stmt->bindValue(':qta', $ingrediente->getQta(), PDO::PARAM_INT);
		$stmt->bindValue(':id_cibo', $ingrediente->getCibo()->getId(), PDO::PARAM_INT);
	}

	/** Metodo che crea un oggetto EIngrediente a partire dalla tupla della tabella ingrediente
	* @param $row array che rappresenta la tupla
	* @return EIngrediente
	*/
	public function getObjectFromRow($row){
		
		$fc = new FCibo();
		$cibo = $fc->loadById($row['id_cibo']); 
		$ingredienteObj = new EIngrediente($row['qta'],$cibo);
		$ingredienteObj->setId($row['id']);
		return $ingredienteObj;
	}

	/** Load di un ingrediente sul DB. Specializza il metodo load di FDatabase
	* @param $id dell'ingrediente da caricare
	* @return EIngrediente recuperato
	*/
	public function loadById($idingrediente){

		$row = parent::loadById($idingrediente);

		if(($row!=null) && (count($row)>0)){
			$arringr = $row[0];
			$ingrediente = $this->getObjectFromRow($arringr);
			return $ingrediente;
		}
		else return null;
	}
	
	/** Load di oggetti EIngrediente dal database dato un gruppo di id. Specializza il metodo loadAllById di FDatabase
	* @param $ids array di ids degli oggetti da recuperare
	* @return array di EIngrediente
	*/
	public function loadAllByIds($ids){
		$rows = parent::loadAllByIds($ids);
		
		if(($rows!=null) && (count($rows)>0)){
			$arrayingr = array();

			foreach ($rows as $i) {

				$ingrediente = $this->getObjectFromRow($i); 

				array_push($arrayingr, $ingrediente); //costruisco array di oggetti di tipo EIngrediente
			}
			return $arrayingr;
		}
		else return null;


	}

	/** Metodo che restituisce gli IDs ingrediente noti gli ID dei cibi
	* @param $ids array di ids cibo
	* @return array di id ingrediente
	*/
	public function loadIdIngrbyIdCibo($ids){
		$s = implode(", ", $ids);
		$s = "(".$s.")";
		$query = "SELECT id FROM ".$this->table." WHERE id_cibo IN ".$s.";";
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