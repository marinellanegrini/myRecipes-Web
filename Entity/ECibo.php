<?php
/** La classe ECibo contiene tutti gli attributi e metodi riguardanti i cibi. 
 * Contiene i seguenti attributi (e i relativi get e set):
 * -id: è un identificativo autoincrement, relativo al commento;
 * -nome: nome del cibo
 * @author Gruppo 7
 * @package Entity
 */

class ECibo
{
	/**id relativo al cibo */
	private $id;
	/**nome del cibo*/
	private $nome;
	/**immagine del cibo*/
	private $immagine;

	public function __construct(string $nome){
		$this->nome = $nome;
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
		return clone $this->immagine;
	}

	/**
	 * @param EImmagine $immagine del cibo
	 */
	public function setImmagine($immagine): void
	{
		$this->immagine = $immagine;
	}


    /**
     * Stampa le informazioni del cibo
     */
    public function __toString(){
        $st="ID: ".$this->id." Nome: ".$this->nome;
        return $st;
    }
	
}

?>

