<?php
/** La classe ECibo contiene tutti gli attributi e metodi riguardanti i cibi. 
 * Contiene i seguenti attributi (e i relativi get e set):
 * -id: è un identificativo autoincrement, relativo al commento;
 * -nome: nome del cibo
 * @author Gruppo 7
 * @package Entity
 */

class ECibo implements JsonSerializable
{
	/**id relativo al cibo */
	private $id;
	/**nome del cibo*/
	private $nome;
	/**unita di misura del cibo */
	private $um;
	/**immagine del cibo*/
	private $immagine;

	public function __construct(string $nome, string $um){
		$this->nome = $nome;
		$this->um = $um;
	}

	/**
	*
	* @return int id relativo al cibo
	*/

	public function getId():int{
		return $this->id;
	}

	/**
	*
	* @return string nome cibo
	*/

	public function getNome():string{
		return $this->nome;
	}

	/**
	*
	* @param int $id relativo al cibo
	*/
	
	public function setId(int $id){
        $this->id=$id;
    }

    /**
	*
	* @param string $nome cibo
	*/
	
	public function setNome(string $nome){
        $this->nome=$nome;
    }

	/**
	 * @return EImmagine del cibo
	 */
	public function getImmagine()
	{
		$ret = $this->immagine;
		return $ret;
	}

	/**
	 * @param EImmagine $immagine del cibo
	 */
	public function setImmagine($immagine): void
	{
		$this->immagine = $immagine;
	}

	/**
	 * @return mixed
	 */
	public function getUm()
	{
		return $this->um;
	}

	/**
	 * @param mixed $um
	 */
	public function setUm($um): void
	{
		$this->um = $um;
	}


	public function codifica64() {

		$img=$this->getImmagine();
		$img->setData(base64_encode($img->getData()));
		$this->setImmagine($img);
	}

    /**
     * Stampa le informazioni del cibo
     */
    public function __toString(){
        $st="ID: ".$this->id." Nome: ".$this->nome." Unità di misura: ".$this->um;
        return $st;
    }

	public function jsonSerialize()
	{
		return
			[
				'id'   => $this->getId(),
				'nome' => $this->getNome(),
				'um' => $this->getUm(),
				'immagine' => $this->getImmagine()
			];
	}
	
}

?>

