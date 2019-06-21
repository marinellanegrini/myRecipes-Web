<?php


/**
 * La classe EUtente contiene tutti gli attributi e metodi base riguardanti gli utenti. 
 * Contiene i seguenti attributi (e i relativi metodi):
 * -username: username account utente;
 * -password: password account;
 * -nome: nome dell'utente;
 * -cognome: cognome dell'utente;
 * -email: email utente;
 * -activate: account attivo o no;
 * -commento: contiene tutti i commenti che l'utente ha fatto
 * -preferiti: contiente tutte le ricette preferite dall'utente
 * -immagine: foto profilo dell'utente
 *  @author Gruppo 7
 *  @package Entity
 */ 

class EUtente implements JsonSerializable
{
    /**id utente */
    private $id;
	/** username account */
	private $username;
	/** password account */
	private $password;
	/** email utente */
	private $email;
	/** */
	private $stato;
	/** commenti */
	private $_commento;
	/** preferiti */
	private $_preferito;
	/** nome utente */
	private $nome;
	/** cognome utente */
	private $cognome;
	/** immagine del profilo */
	private $immagine;



	/** costruttore */
	public function __construct($usern,$pass,$emai,$nom,$cogno){
		$this->username = $usern;
		$this->password = $pass;
		$this->email = $emai;
		$this->stato = true;
		$this->_commento = array();
		$this->_preferito = array();
		$this->nome = $nom;
		$this->cognome= $cogno;
	}

    /**
     * @param int $id dell'utente
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return int id utente
     */
    public function getId(): int{
        return $this->id;
    }

	/**
     * @return string username utente
     */
	public function getUsername(){
		return $this->username;
	}

	/**
     * @return string password utente
     */
	public function getPassword(){
		return $this->password;
	}

	/**
     * @return string email utente
     */
	public function getEmail(){
		return $this->email;
	}

	/**
     * @return string nome utente
     */
	public function getNome(){
		return $this->nome;
	}

	/**
     * @return string cognome utente
     */
	public function getCognome(){
		return $this->cognome;
	}

    /**
     * @return bool stato utente
     */
    public function getStato(){
        return $this->stato;
    }

	/**
     * @return array con TUTTI i commenti dell'utente
     */
	public function getCommenti(){
		$c=$this->_commento;
		return $c;
	}

	/**
     * @return array con TUTTI i preferiti dell'utente
     */
	public function getPreferiti(){
		$p = $this->_preferito;
		return $p;
	}

	/**
     * @param $array
     */
	public function setCommenti($array){
	 	$this->_commento = $array;
	}

	/**
     * @param string $usern username
     */
	public function setUsername($usern){
	 	$this->username = $usern;
	}

	/**
     * @param string $pass password
     */
	public function setPassword($pass){
		$this->password = $pass;
	}

	/**
     * @param string $emai email
     */
	public function setEmail($emai){
		$this->email = $emai;
	}

	/**
     * @param string $nom nome utente
     */
	public function setNome($nom){
		$this->nome = $nom;
	}

	/**
     * @param $cogno cognome utente
     */
	public function setCognome($cogno){
		$this->cognome = $cogno ;
	}

    /**
     * @param bool $s true o false
     */
    public function setStato($s){
        $this->stato = $s;
    }

	/**
     * Imposta lo stato dell'utente ad attivo
     */
	public function setStatoAttivo(){
		$this->stato = true;
	}

	/**
     * Imposta lo stato dell'utente ad attivo
     */
	public function setStatoNonAttivo(){
		$this->stato = false;
	}



    /**
     * @param array di preferiti
     */
    public function setPreferiti($p){
        $this->_preferito=$p;
    }

	/**
	 * @return EImmagine dell'utente
	 */
	public function getImmagine(): EImmagine
	{
		return clone $this->immagine;
	}

	/**
	 * @param EImmagine $immagine
	 */
	public function setImmagine($immagine): void
	{
		$this->immagine = $immagine;
	}


	/**
     * Aggiunge un nuovo commento all'array contenente tutti i commenti
     * @param $c nuovo commento da aggiungere
     */
	public function addCommento($c){
		array_push($this->_commento,$c);
	}

	/**
     * Aggiunge un nuovo preferito all'array contenente tutti i preferiti
     * @param $p nuovo preferito da aggiungere
     */
	public function addPreferito($p){
		array_push($this->_preferito,$p);
	}

	/** 
	* Cerca un commento
	* @param $id è l'id del commento
	* @return $r corrisponde al commento cercato
	*/
	private function cercaCommento($id): ECommento{
 		foreach ($this->_commento as $commento){
  		if ($commento->getId()==$id){
   			$r = $commento;}
 		}
 		return $r;
	}

	/** 
	* Banna un commento
	* @param $id è l'id del commento
	*/
	public function bannaCommento($id){
 		$commento = $this->cercaCommento($id);
 		$commento->banna();
	}

	/** 
	* Elimino un commento
	* @param $id è l'id del commento
	*/
	public function eliminaCommento($id){
 		foreach ($this->_commento as $k => $commento){
  		if ($commento->getId()==$id){
   			unset($this->_commento[$k]);
   		}
        $this->_commento = array_values($this->_commento);
 	}}

	/**
	 * Metodo che codifica in base64 l'immagine del profilo dell'utente e le foto delle sue ricette preferite
	 */
 	public function codifica64() {
		//foto profilo
		$img=$this->getImmagine();
		$img->setData(base64_encode($img->getData()));
		$this->setImmagine($img);
		//foto ricetta preferite
		if($this->_preferito != null){
			foreach ($this->_preferito as $ricetta) {
				$ricetta->codifica64();
			}
		}

	}
 	public function __toString(){
        $st="Id: ".$this->id." Nome: ".$this->nome." Cognome: ".$this->cognome." Username: ".$this->username." Email: ".$this->email." Stato: ".$this->stato."\nCommenti: \n";
        foreach($this->_commento as $comm){
            $st=$st.$comm."\n";
        }
        $st = $st." Preferiti: \n";
        foreach($this->_preferito as $pref){
            $st=$st.$pref."\n";
        }
        return $st;
    }

	public function jsonSerialize()
	{
		return
			[
				'id' => $this->getId(),
				'username' => $this->getUsername(),
				'password' => $this->getPassword(),
				'email' => $this->getEmail(),
				'stato' => $this->getStato(),
				'commento' => $this->getCommenti(),
				'preferito' => $this->getPreferiti(),
				'nome' => $this->getNome(),
				'cognome' => $this->getCognome(),
				'immagine' => $this->getImmagine()


			];
	}
 }

?>






