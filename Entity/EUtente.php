<?php
require_once '/Users/marinellanegrini/Documents/Workspace/myRecipesWeb/Classes.php';

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
 *  @author Gruppo 7
 *  @package Entity
 */ 

class EUtente
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

	/** costruttore */
	public function __construct($usern,$pass,$emai,$nom,$cogno){
		$this->username = $usern;
		$this->password = $pass;
		$this->email = $emai;
		$this->stato = false;
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
    public function getId(){
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
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     
    static function valNome($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }

     /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     
    static function valCognome($val):bool{
        $replace=array(" ","'");
        if(!preg_match("/^([a-zA-Z]{3,30})$/",str_replace($replace,'',$val))){
            return false;
        }
        else return true;
    }

    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     
    static function valUsername($val):bool{
        if(!preg_match("/^([a-zA-Z0-9_]{3,30})$/",$val)){
            return false;
           }
        return true;
    }

    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     
    static function valPassword($val):bool{
        if(!preg_match("/^([a-zA-Z0-9_]{8,30})$/",$val)){
            return false;
           }
        return true;
    }

     /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     
    static function valEmail($val):bool{
        if(filter_var($val, FILTER_VALIDATE_EMAIL)) return true;
        else return false;
    }

    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     
    static function UsernameExist($val):bool{
        $db=FDatabase::getInstance();
        if($db->exist('Utente','username',$val)) return true;
        else return false;
    }

    /**
     * Verificano la corrispondenza con il valore in input con i requisiti richiesti
     * @param $val valore inserito
     * @return bool
     
    static function MailExist($val):bool{
        $db=FDatabase::getInstance();
        if($db->exist('Utente','email',$val)) return true;
        else return false;
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
 }


?>






