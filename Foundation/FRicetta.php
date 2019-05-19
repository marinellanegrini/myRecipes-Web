<?php
require_once 'Classes.php';

/** 
* La classe FRicetta gestisce la persistenza di oggetti ERicetta
* @author Gruppo 7
* @package Foundation
*/

class FRicetta extends FDatabase
{
	/** costruttore */
	public function __construct() {
		parent::__construct(); //richiamo del costruttore di FDatabase
		$this->table = "ricetta";

		$this->class = "FRicetta";

		$this->values = "(:id, :nome, :difficolta, :procedimento, :tprep, :ndosi, :id_categoria, :nsalvataggi)";
	}

	/**
	* Metodo che fa il bind di tutti gli attributi di ERicetta con i valori delle colonne della 
	s* tabella ricetta per poter fare le INSERT
	* @param PDOStatement $stmt
	* @param ERictetta ricetta da salvare su DB
	*/
	public static function bind($stmt, ERicetta $ricetta){
		$stmt->bindValue(':id', NULL, PDO::PARAM_INT); // id è NULL perchè AUTOINCREMENT
		$stmt->bindValue(':nome', $ricetta->getNome(), PDO::PARAM_STR);
		$stmt->bindValue(':difficolta', $ricetta->getDifficolta(), PDO::PARAM_INT);
		$stmt->bindValue(':procedimento', $ricetta->getProcedimento(), PDO::PARAM_STR);
		$stmt->bindValue(':tprep', $ricetta->getTprep());
		$stmt->bindValue(':ndosi', $ricetta->getNdosi(), PDO::PARAM_INT);
		$stmt->bindValue(':id_categoria', $ricetta->getCategoria()->getId(), PDO::PARAM_INT);
		$stmt->bindValue(':ndosi', $ricetta->getNdosi(), PDO::PARAM_INT);
		$stmt->bindValue(':nsalvataggi', $ricetta->getNsalvataggi(), PDO::PARAM_INT);

	}

	/** Metodo che crea un oggetto ERicetta a partire dalla tupla della tabella ricetta
	* @param $row array che rappresenta la tupla
	* @return ERicetta
	*/
	public function getObjectFromRow($row){
		$fc = new FCategoria();
		$cat = $fc->loadById($row['id_categoria']);
		$ricettaObj = new ERicetta($row['nome'], $row['difficolta'], $row['procedimento'], $row['tprep'], $row['ndosi'], $cat, $row['nsalvataggi']);
		$ricettaObj->setId($row['id']);
		$ricettaObj->setIngredienti($row['ingredienti']);
		$ricettaObj->setCommenti($row['commenti']);
		return $ricettaObj;
	}

	/** Metodo che costruisce una row completa per la ricetta, pronta per essere passata al metodo getObjectFromRow
	* @param $row presa dal database
	* @return $row con commenti e ingredienti
	*/
	private function buildRow($row){
		
		//caricamento ingredienti della ricetta
		$fricingr = new FRictoIngr();
		$fingr = new FIngrediente();
		$idingr = $fricingr->loadIdIngrbyIdRic($row['id']); //$idingr è un array di id ingrediente
		$arrayingr = $fingr->loadAllByIds($idingr);
		$row['ingredienti'] = $arrayingr;
		//caricamento commenti della ricetta
		$fcomm = new FCommento();
		$arraycomm = $fcomm->loadByIdRicetta($row['id']); 
		$row['commenti'] = $arraycomm;
		return $row;
	}

	/** Store di un oggetto ERicetta sul DB. Specializza il metodo store di FDatabase
	* @param ERicetta $ricetta da salvare
	* @return boolean
	*/
	public function store($ricetta){
		$id = parent::store($ricetta);

		if($id){

			//salvataggio ingredienti della ricetta
			$ingredienti = $ricetta->getIngredienti();
			
			$fricingr = new FRictoIngr();

			foreach($ingredienti as $i){ //NB: assumiamo che è stato gestito il salvataggio nella tabella ingrediente
				
				$fricingr->store($id,$i->getId());
			}

			return $id;

		}
		else return false;
	}


	 /** Load di una ricetta sul DB. Specializza il metodo load di FDatabase
	* @param $id della ricetta da caricare
	* @return ERicetta recuperata
	*/
	public function loadById($idricetta){
		$row = parent::loadById($idricetta);
		if(($row!=null) && (count($row)>0)){
			$rowass = $row[0];
			$rowcompleta = $this->buildRow($rowass);
			$ricetta = $this->getObjectFromRow($rowcompleta);
			return $ricetta;
		}
		else return null;

	}

	/**
	* Load di oggetti ERicetta dal database dato un gruppo di id
	* @param $ids array di ids degli oggetti da recuperare
	* @return array di ERicetta
	*/
	public function loadAllByIds($ids){
		$rows = parent::loadAllByIds($ids);
		
		if(($rows!=null) && (count($rows)>0)){
			$arrayRic = array();
			foreach ($rows as $rowass) {
				$rowcompleta = $this->buildRow($rowass);

				$ricetta = $this->getObjectFromRow($rowcompleta);
				array_push($arrayRic, $ricetta);
			}
			return $arrayRic;
		}
		else return null;

	}

	/**
	* Metodo che permette di effettuare una ricerca di ricette per ingredienti
	* @param $ids array di ids cibo
	* @return array di ERicetta 
	*/
	public function ricercaPerIngrediente($ids){
		$query = "SELECT id_ricetta FROM rictoingr JOIN (ingrediente, cibo) ON (rictoingr.id_ingrediente=ingrediente.id AND ingrediente.id_cibo=cibo.id) WHERE cibo.id=".$ids[0];

		for ($i=1; $i<count($ids); $i++){
			$query = "SELECT id_ricetta FROM rictoingr JOIN (ingrediente, cibo) ON (rictoingr.id_ingrediente=ingrediente.id AND ingrediente.id_cibo=cibo.id) WHERE cibo.id=".$ids[$i]." AND id_ricetta IN (".$query.")";
		}

		$query = $query.";";
		
		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->db->commit();
		}
		catch (PDOException $e)
		{
			$this->db->rollBack();
			echo "Attenzione, errore: " . $e->getMessage();
		}
		$arrid = array();
		foreach ($rows as  $value) {
			array_push($arrid, $value['id_ricetta']);
		}

		$arrric = $this->loadAllByIds($arrid);

		return $arrric;

		
	}

	/**
	* Metodo che permette di effettuare una ricerca avanzata di ricette per categoria, difficoltà e tempo di preparazione
	* @param $filtri array associativo che contiene i filtri inseriti (NULL se nessun filtro è stato inserito). La componente 'cat' contiene l'id della categoria, la componente 'diff' un numero da 1 a 5 e la componente 'tprep' un numero intero che rappresenta i minuti del tempo di preparazione (61 se il tempo inserito è "maggiore di un'ora")
	* @return array di ERicetta che soddisfano i filtri inseriti
	*/
	public function ricercaPerFiltri($filtri){
		$idcat = $filtri['cat'];
		$diff = $filtri['diff'];
		$tprep = $filtri['tprep'];

		if($idcat!=null){
			$querycat = "SELECT * FROM ricetta WHERE id_categoria=".$idcat." AND id IN (";
		}
		else {
			$querycat = "SELECT * FROM ricetta WHERE id IN (";
		}

		if($diff!=null){
			$querydiff = "SELECT id FROM ricetta WHERE difficolta=".$diff." AND id IN (";
		}
		else {
			$querydiff = "SELECT id FROM ricetta WHERE id IN (";
		}

		if($tprep!=null){

			if($tprep<61){
			$querytprep = "SELECT id FROM ricetta WHERE tprep<'00:".$tprep.":00'";
			}
			else {
				$querytprep = "SELECT id FROM ricetta WHERE tprep>='01:00:00'";
			} 
		}
		else {
			$querytprep = "SELECT id FROM ricetta";
		}

		$query = $querycat.$querydiff.$querytprep."));";


		try {
			$this->db->beginTransaction();
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->db->commit();
		}
		catch (PDOException $e)
		{
			$this->db->rollBack();
			echo "Attenzione, errore: " . $e->getMessage();
		}

		
		
		if(($rows!=null) && (count($rows)>0)){
			$arrayRic = array();
			foreach ($rows as $rowass) {
				$rowcompleta = $this->buildRow($rowass);

				$ricetta = $this->getObjectFromRow($rowcompleta);
				array_push($arrayRic, $ricetta);
			}
			return $arrayRic;
		}
		else return null;
		
	}

	/**Metodo che restituisce le ricette che contengono una determinata stringa nel nome
    * @param string $val da ricercare
    * @param $attr attributo su cui ricercare $val
    * @return array di ERicetta
    */
    public function search($val, $attr){
        $rows = parent::search($val, $attr);
        if(($rows!=null) && (count($rows)>0)){
			$arrayRic = array();
			foreach ($rows as $rowass) {
				$rowcompleta = $this->buildRow($rowass);

				$ricetta = $this->getObjectFromRow($rowcompleta);
				array_push($arrayRic, $ricetta);
			}
			return $arrayRic;
		}
		else return null;


    }

	

}

?>