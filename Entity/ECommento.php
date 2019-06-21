<?php

/**
 * La classe ECommento contiene gli attributi e i metodi relativi ai commenti.
 * Sono presenti i seguenti attributi e i relativi metodi get e set:
 * - id: è l'identificativo univoco che rappresenta il commento
 * - testo: contenuto del commento
 * - data: data in cui è stato inserito il commento
 * - ora: ora in cui è stato inserito il commento
 * @author Gruppo 7
 * @package Entity
*/

class ECommento implements JsonSerializable
{
	/**id relativo al commento */
	private $id;
	/**testo contenuto all'interno del commento */
	private $testo;
	/**data in cui è stato inserito il commento */
	private $data;
	/**ora in cui è stato inserito il commento */
	private $ora;
	/**indica se il commento è stato bannato oppure no */
	private $bannato= false;
    /**id dell'utente che pubblica il commento */
    private $idutente;
    /**id della ricetta che contiene il commento */
    private $idricetta;
	
	/**costruttore*/
	public function __construct (string $testo, $data, $ora, $idu, $idr){
		$this->testo = $testo;
		$this->data = $data;
		$this->ora = $ora;
        $this->idutente = $idu;
        $this->idricetta = $idr;
	}

	/**
     * @return int id commento
     */
    public function getId() : int {
        return $this->id;
    }
    /**
     * @param int $id commento
     */
    public function setId(int $id){
        $this->id = $id;
    }

    /**
     * @return string testo commento
     */
    public function getTesto() : string{
        return $this->testo;
    }
    /**
     * @param string $testo commento
     */
    public function setTesto(string $testo){
        $this->testo = $testo;
    }

    /**
     * @return date data commento
     */
    public function getData(){
        return $this->data;
    }
    /**
     * @param date $data commento
     */
    public function setData($data){
        $this->data = $data;
    }

    /**
     * @return time ora commento
     */
    public function getOra(){
        return $this->ora;
    }
    /**
     * @param time $ora commento
     */
    public function setOra($ora){
        $this->ora = $ora;
    }

    /**
     * @return id dell'utente
     */
    public function getIdUtente(): int{
        return $this->idutente;
    }
    /**
     * @param $idu id dell'utente
     */
    public function setIdUtente($idu){
        $this->idutente = $idu;
    }

    /**
     * @return id della ricetta
     */
    public function getIdRicetta(): int{
        return $this->idricetta;
    }
    /**
     * @param $idr id della ricetta
     */
    public function setIdRicetta($idr){
        $this->idricetta = $idr;
    }

    /**
     * @return boolean bannato commento
     */
    public function isBannato():bool{
        return $this->bannato;
    }

    /**
    * @param bool true o false 
    */
    public function setStato(bool $b){
        $this->bannato = $b;
    }

    /**
     * Metodo per bannare un commento
     */
    public function banna(){
        $this->bannato = true;
    }

    /**
     * Stampa le informazioni relative ai commento
     */
    public function __toString (){
    	$stringa="id: ".$this->id." testo: ".$this->testo." data: ".$this->data." ora: ".$this->ora."bannato: ".$this->bannato." id utente: ".$this->idutente." id ricetta: ".$this->idricetta;
    	return $stringa;
    }


    public function jsonSerialize()
    {
        return
            [
                'id' => $this->getId(),
                'testo' => $this->getTesto(),
                'data' => $this->getData(),
                'ora' => $this->getOra(),
                'bannato' => $this->isBannato(),
                'idutente' => $this->getIdUtente(),
                'idricetta' => $this->getIdRicetta()

        ];
    }

}
?>