<?php




/**
 * La classe ERicetta contiene gli attributi e i metodi relativi alle ricette.
 * Sono presenti i seguenti attributi e i relativi metodi:
 * - nome: è il nome della ricetta
 * - difficoltà: indica la difficoltà della ricetta
 * - id: identificativo della ricetta
 * - procedimento: procedimento per realizzare la ricetta
 * - tprep: tempo necessario per realizzare la ricetta
 * - ndosi: indica il numero di persone per cui è la ricetta
 * - _categoria: a quale categoria di ricette appartine la ricetta
 * - _ingrediente: ingredienti necessari alla preparazione
 * - _commento: commenti relativi alla ricetta
 * - nsalvataggi: numero di volte che è stata salvata la ricetta
 * - immagine: immagine principale della ricetta
 * - imgpreparazione: array di immagini della preparazione (gallery)
 * @author Gruppo 7
 * @package Entity
*/

class ERicetta implements JsonSerializable
{
    /**identificativo ricetta */
    private $id;
	/**nome relativo alla ricetta */
	private $nome;
	/**difficoltà ricetta */
	private $difficolta;
	/**procedimento per realizzare la ricetta */
	private $procedimento;
	/**tempo di preparazione della ricetta */
	private $tprep;
	/**numero di dosi della ricetta */
	private $ndosi;
	/**categoria a cui appartiene la ricetta */
	private $_categoria;
	/**ingredienti per la preparazione della ricetta */
	private $_ingredienti = array();
	/**commenti relativi alla ricetta */
	private $_commenti = array();
	/**numero di volte che la ricetta è stata salvata */
	private $nsalvataggi;
	/**immagine principale dell'immagine */
	private $immagine;
	/**gallery della preparazione*/
	private $imgpreparazione;

	/** costruttore */
	public function  __construct($nom, $diff, $proc, $tpr, $ndos, $cat, $ns){
		$this->nome = $nom;
        $this->difficolta = $diff;
        $this->procedimento = $proc;
        $this->tprep = $tpr;
        $this->ndosi = $ndos;
        $this->_categoria = $cat;
        $this->nsalvataggi = $ns;
        $this->_commenti ;
        $this->_ingredienti ;
	}

	/**
     * @return string nome ricetta
     */
    public function getNome() : string{
        return $this->nome;
    }
    /**
     * @param string $nome ricetta
     */
    public function setNome(string $nome){
        $this->nome = $nome;
    }

    /**
     * @return string difficoltà ricetta
     */
    public function getDifficolta() : int {
        return $this->difficolta;
    }
    /**
     * @param string $difficoltà ricetta
     */
    public function setDifficolta( int $difficolta){
        $this->difficolta = $difficolta;
    }

	/**
     * @return int id ricetta
     */
    public function getId() : int{
        return $this->id;
    }
    /**
     * @param int $id ricetta
     */
    public function setId(int $id){
        $this->id = $id;
    }

    /**
     * @return string procedimento ricetta
     */
    public function getProcedimento() : string{
        return $this->procedimento;
    }
    /**
     * @param string $procedimento ricetta
     */
    public function setProcedimento(string $procedimento){
        $this->procedimento = $procedimento;
    }

    /**
     * @return time tprep ricetta
     */
    public function getTprep() {
        return $this->tprep;
    }
    /**
     * @param time $tprep ricetta
     */
    public function setTprep($tprep){
        $this->tprep = $tprep;
    }

    /**
     * @return int ndosi ricetta
     */
    public function getNdosi() : int{
        return $this->ndosi;
    }
    /**
     * @param int $ndosi ricetta
     */
    public function setNdosi(int $ndosi){
        $this->ndosi = $ndosi;
    }

    /**
     * @return ECategoria ricetta
     */
    public function getCategoria() : ECategoria{
        $cat = new ECategoria($this->_categoria->getNome());
        $cat->setId($this->_categoria->getId());
        return $cat;
    }
    /**
     * @param ECategoria $_categoria ricetta
     */
    public function setCategoria(ECategoria $categoria){
        $this->_categoria = $categoria;
    }

    /**
     * @param commento
     */
    public function addCommento(ECommento $c){
    	array_push($this->_commenti, $c);
    }

    /**
     * @param ingrediente
     */
    public function addIngrediente(EIngrediente $i){
        array_push($this->_ingredienti, $i);
    }

    /**
     * @return int numero commenti
     */
    public function countCommenti() : int{
        $i = 0;
    	foreach ($this->_commenti as $commento)
        {
            $i++;
        }
        return $i;
    }

    /**
     * incrementa il numero dei salvataggi
     */
    public function incrementaSalvataggi(){
    	$this->nsalvataggi++;
    }

    /**
     * decrementa il numero dei salvataggi
     */
    public function decrementaSalvataggi(){
    	$this->nsalvataggi--;
    }

    /**
     * @return array di commenti
     */
    public function getCommenti(){
    	$c=$this->_commenti;
    	return $c;
    }

    /**
     * @param array di commenti
     */
    public function setCommenti($c){
    	$this->_commenti=$c;
    }

    /**
     * @return array di ingredienti
     */
    public function getIngredienti(){
    	$i=$this->_ingredienti;
    	return $i;
    }

    /**
     * @param array di ingredienti
     */
    public function setIngredienti($i){
    	$this->_ingredienti=$i;
    }

    /**
     * @return longblob immagine
     */
    public function getImmagine(): EImmagine
    {
        return clone $this->immagine;
    }

    /**
     * @param longblob $immagine
     */
    public function setImmagine($immagine): void
    {
        $this->immagine = $immagine;
    }

    /**
     * @return array di Eimmagine (gallery)
     */
    public function getImgpreparazione()
    {
        $img = $this->imgpreparazione;
        return $img;
    }

    /**
     * @param array di EImmagine $imgpreparazione
     */
    public function setImgpreparazione($imgpreparazione): void
    {
        $this->imgpreparazione = $imgpreparazione;
    }



    /**
     * @param int identificativo
     * @return ECommento con id specificato
     */
    private function cercaCommento(int $id) : Ecommento{
    	foreach ($this->_commenti as $commento){
    		if ($commento->getId()==$id){
    			$r=$commento;
    		}
    	}
    	return $r;
    }

    /**
     * @param int identificativo commento
     */
    public function bannaCommento(int $id){
    	$commento=$this->cercaCommento($id);
    	$commento->banna();
    }

    /**
     * @param int identificativo commento
     */
    public function eliminaCommento(int $id){
    	foreach($this->_commenti as $k => $commento){
    		if($commento->getId()==$id){
    			unset($this->_commenti[$k]);
    		}
    	}
        $this->_commenti = array_values($this->_commenti);
    }

    /**
     * @return int numero salvataggi ricetta
     */
    public function getNsalvataggi() : int{
        return $this->nsalvataggi;
    }
    /**
     * @param int $nsalvataggi ricetta
     */
    public function setNsalvataggi(int $nsalvataggi){
        $this->nsalvataggi = $nsalvataggi;
    }

    public function __toString (){
        $ingr = "";
        foreach ($this->getIngredienti() as  $i) {
            $ingr = $ingr.$i->__toString()." ";
        }
        $comm=implode(",", $this->_commenti);
        $stringa="id: ".$this->id."\n"."nome: ".$this->nome."\n"."difficoltà: ".$this->difficolta."\n"."procedimento: ".$this->procedimento."\n"."tprep: ".$this->tprep."\n"."ndosi: ".$this->ndosi."\n"."categoria: ".$this->_categoria."\n"."ingredienti: ".$ingr."\n"."commenti: ".$comm."\n"."nsalvataggi: ".$this->nsalvataggi."\n";
        return $stringa;
    }

    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->getId(),
                'nome' => $this->getNome(),
                'difficolta'   => $this->getDifficolta(),
                'procedimento' => $this->getProcedimento(),
                'tprep'   => $this->getTprep(),
                'ndosi' => $this->getNdosi(),
                'categoria'   => $this->getCategoria(),
                'ingredienti' => $this->getIngredienti(),
                'commenti'   => $this->getCommenti(),
                'nsalvataggi' => $this->getNsalvataggi(),
                'immagine'   => $this->getImmagine(),
                'imgpreparazione' => $this->getImgpreparazione(),
            ];
    }

}

?>