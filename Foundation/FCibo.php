<?php
require_once 'Classes.php';

/** 
* La classe FCibo gestisce la persistenza di oggetti ECibo
* @author Gruppo 7
* @package Foundation
*/

class FCibo extends FDatabase{
	/** costruttore */
	public function __construct() {
		parent::__construct(); //richiamo del costruttore di FDatabase
		$this->table = "cibo";

		$this->class = "FCibo";

		$this->values = "(:id, :nome)";
	}

	/**
	* Metodo che fa il bind di tutti gli attributi di ECibo con i valori delle colonne *della tabella cibo per poter fare le INSERT
	* @param PDOStatement $stmt
	* @param ECibo cibo da salvare su DB
	*/
	public static function bind($stmt, ECibo $cibo){
		$stmt->bindValue(':id', NULL, PDO::PARAM_INT); // id è NULL perchè AUTOINCREMENT
		$stmt->bindValue(':nome', $cibo->getNome(), PDO::PARAM_STR);
	}

	/** Metodo che crea un oggetto ECibo a partire dalla tupla della tabella cibo
	* @param $row array che rappresenta la tupla
	* @return ECibo
	*/
	public function getObjectFromRow($row){
		$ciboObj = new ECibo($row['nome']);
		$ciboObj->setId($row['id']);
		return $ciboObj;
	}

	/** Load di un cibo sul DB. Specializza il metodo load di FDatabase
	* @param $id del cibo da caricare
	* @return ECibo recuperato
	*/
	public function loadById($idcibo){
		$row = parent::loadById($idcibo);

		if(($row!=null) && (count($row)>0)){
			$arrcibo = $row[0];
			$cibo = $this->getObjectFromRow($arrcibo);
			return $cibo;
		}
		else return null;
	}

	/**Metodo che restituisce i cibi che contengono una determinata stringa nel nome
    * @param string $val da ricercare
    * @param $attr attributo su cui ricercare $val
    * @return array di ECibo
    */
    public function search($val, $attr){
        $array = parent::search($val, $attr);
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

    public function loadAll()
    {
        $array = parent::loadAll();
        $a=array();
        if(($array!=null) && (count($array)>0)){
            foreach($array as $i){
                $comm=$this->getObjectFromRow($i);
                array_push($a, $comm);
            }
            return $a;
        }
        else return null;
    }
}


?>