<?php


/** La classe Eingrediente contiene contiene un cibo e la relativa quantità usata in una *ricetta.
* Contiene i seguenti attributi:
* -qta: quantità dell'ingrediente
* - _cibo: oggetto della classe Ecibo
*  @author Gruppo 7
* @package Entity
*/

class EIngrediente
{
	/**id dell'ingrediente*/
	private $id;
	/**quantità dell'ingrediente*/
	private $qta;
	/**Cibo che riguarda l'ingrediente*/
	private $_cibo;

	public function __construct (int $q, ECibo $c)
	{
		$this->qta = $q;
		$this->_cibo = $c;
	}

	/**
     * @return int id ingrediente
     */
    public function getId() : int {
        return $this->id;
    }
    /**
     * @param int $id ingrediente
     */
    public function setId(int $id){
        $this->id = $id;
    }

	/**
	*
	* @return int qta relativa all'ingrediente
	*/

	public function getQta(): int{
		return $this->qta;
	}

	/**
	*
	* @return ECibo dell'ingrediente
	*/

	public function getCibo(): ECibo {
		$c = new ECibo($this->_cibo->getNome(),$this->_cibo->getUm());
		$c->setId($this->_cibo->getId());
		
		return $c;
		
	}

	/**
	*
	* @param int $qta dell'ingrediente 
	*/
	
	public function setQta(int $qta){
        $this->qta=$qta;
    }

    /**
	*
	* @param ECibo $cibo dell'ingrediente
	*/
	
	public function setCibo(ECibo $cibo){
        $this->_cibo=$cibo;
    }

    /**
     * Stampa le informazioni dell'ingrediente
     */
    public function __toString(){
        $st="Qta: ".$this->qta." Cibo: ".$this->_cibo;
        return $st;
    }
}

?>