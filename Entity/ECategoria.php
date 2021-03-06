<?php
/** 
* La classe ECategoria contiene tutti gli attributi e metodi base riguardanti le varie categorie delle ricette.
* Contiene:
* -id: è un identificativo autoincrementale relativo alle varie categorie
* -nome: è il nome della categoria 
* @author Gruppo 7
* @package Entity
*/

class ECategoria implements JsonSerializable
{
	/** id relativo alla categoria */
	private $id;
	/** nome relativo alla categoria */
	private $nome;

	/** costruttore */
	public function __construct(string $nome){
		$this->nome = $nome;
	}

	/**
	* @return int id categoria
	*/
	public function getId() : int{
		return $this->id;
	}

	/** 
	* @return string nome categoria
	*/
	public function getNome() : string{
		return $this->nome;
	}

	/** 
	* @return int $id categoria
	*/
	public function setId(int $id){
		$this->id = $id;
	}

	/** 
	* @return string $nome nome categoria
	*/
	public function setNome(stirng $nome){
		$this->nome = $nome;
	}

	/**
	* Stampa le informazioni della categoria
	*/
	public function __toString(){
		$st="ID: ".$this->id." Nome: ".$this->nome;
		return $st;
	}

    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->getId(),
                'nome' => $this->getNome()
            ];
    }


}
?>