<?php


/**
 * La classe FUtente fornisce query per gli oggetti EUtente
 * @author Gruppo 7
 * @package Foundation
 */

class FUtente extends FDatabase
{
    /** costruttore */
    public function __construct(){
        parent::__construct();
    	$this->table= 'utente';
    	$this->values='(:id,:nome,:cognome,:username,:password,:email,:stato)';
    	$this->class='FUtente';
    }


    /**
     * Questo metodo lega gli attributi dell'utente che si vogliono inserire con i parametri della INSERT
     * @param $stmt 
     * @param $user utente i cui dati devono essere inseriti nel DB
     */
    public static function bind($stmt,EUtente $user){
        $stmt->bindValue(':id',NULL, PDO::PARAM_INT); 
        $stmt->bindValue(':nome', $user->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':cognome', $user->getCognome(), PDO::PARAM_STR);
        $stmt->bindValue(':username', $user->getUserName(), PDO::PARAM_STR); 
        $stmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR); 
        $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':stato', $user->getStato(), PDO::PARAM_STR);
    }

    /** Metodo che crea un oggetto EUtente a partire dalla tupla della tabella utente
    * @param $row array che rappresenta la tupla
    * @return EUtente
    */
    public function getObjectFromRow($row)
    {
        $utObj = new EUtente($row['username'], $row['password'], $row['email'], $row['nome'], $row['cognome']);
        $utObj->setId($row['id']);
        $utObj->setCommenti($row['commenti']);
        $utObj->setPreferiti($row['preferiti']);
        $utObj->setStato($row['stato']);
        $utObj->setImmagine($row['immagine']);
        return $utObj;

    }

    /** Metodo che costruisce una row completa per l'utente', pronta per essere passata al metodo getObjectFromRow
    * @param $row presa dal database
    * @return $row con commenti e ricetta
    */
    private function buildRow($row){
        
        //caricamento commenti dell'utente
        $fcomm = new FCommento();
        $arraycomm = $fcomm->loadByIdUtente($row['id']); 
        $row['commenti'] = $arraycomm;

        //caricamento ricette preferite dell'utente
        $futprefric = new FUtPrefRic();
        $fric = new FRicetta();
        $idric = $futprefric->loadIdRicbyIdUt($row['id']); //$idric è un array di id ricetta
        $arrayric = $fric->loadAllByIds($idric);
        $row['preferiti'] = $arrayric;

        //caricamento foto profilo utente
        $fimmu = new FImgUtente();
        $img = $fimmu->loadByIdUtente($row['id']);
        $row['immagine'] = $img;

        return $row;
    }

    public function store($utente){
       $id = parent::store($utente);
        if($id){

            //salvataggio immagine di default per l'utente
            $immagine = file_get_contents('./images/profile.png');
            $imgobj = new EImmagine($immagine,'image/png');
            $imgobj->setIdesterno($id);
            $fimut = new FImgUtente();
            $fimut->store($imgobj);
            return $id;

        }
        else return false;
    }

    /**
    * Metodo che esegue la load dell'utente in base all'id
    * @param int $id dell'user
    * @return EUtente recuperato 
    */
    public function loadById($idutente){
    
        $row = parent::loadById($idutente);
        if(($row != null) && (count($row)>0)){
            $rowass=$row[0];
            $rowcompleta = $this->buildRow($rowass);
            $ut = $this->getObjectFromRow($rowcompleta);
            return $ut;
        }
        else return null;
    }

    /**
    * Load di oggetti EUtente dal database dato un gruppo di id
    * @param $ids array di ids degli oggetti da recuperare
    * @return array di EUtente
    */
    public function loadAllByIds($idsutente){
        $utrows = parent::loadAllByIds($idsutente);

        if(($utrows != null) && (count($utrows)>0)){
            $arrayUt = array();
            foreach ($utrows as $rowass) {
                $rowcompleta = $this->buildRow($rowass);
                $utente = $this->getObjectFromRow($rowcompleta);
                array_push($arrayUt, $utente);
            }
            return $arrayUt;
        }
        else return null;
    }

    /**
    * Metodo che verifica se un utente è presente
    * @param $username dell'utente
     * @param $password dell'utente
    * @return $id dell'utente se presente, false altrimenti
    */
    public function esisteUtente($username,$password){
        $query = "SELECT * FROM ".$this->table." WHERE username= '".$username."' AND password='".$password."';";
        try{
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
            if(($row != null) && (count($row)>0)){
                $rowass=$row[0];
                $id = $rowass['id'];
                return $id;
            }
            else return false;
            
        }
        catch (PDOException $e)
        {
            $this->db->rollBack();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }
    }

    /**Metodo che restituisce gli utenti che contengono una determinata stringa in uno degli attributi
    * @param string $val da ricercare
    * @param $attr attributo su cui ricercare $val
    * @return array di EUtente
    */
    public function search($val, $attr){
        $utrows = parent::search($val, $attr);
        if(($utrows != null) && (count($utrows)>0)){
            $arrayUt = array();
            foreach ($utrows as $rowass) {
                $rowcompleta = $this->buildRow($rowass);
                $utente = $this->getObjectFromRow($rowcompleta);
                array_push($arrayUt, $utente);
            }
            return $arrayUt;
        }
        else return null;


    }

    /**
     * Funzione che verifica se è presente un utente con un certo username
     * @param $username
     * @return bool|null esito
     */
    public function esisteUsername($username){
        $query = "SELECT * FROM ".$this->table." WHERE username= '".$username."';";
        try{
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
            if(($row != null) && (count($row)>0)){
                return true;
            }
            else return false;

        }
        catch (PDOException $e)
        {
            $this->db->rollBack();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }
    }



    /**Metodo che trova l'immagine relativa a un utente
     * @param oggetto EUtente
     * @return bool|null esito
     **/
    public function updateUtente($utente){

            $e1=$this->update($utente->getId(),'nome',$utente->getNome());
            $e2=$this->update($utente->getId(),'cognome',$utente->getCognome());
            $e3=$this->update($utente->getId(),'username',$utente->getUsername());
            $e4=$this->update($utente->getId(),'password',$utente->getPassword());
            $e5=$this->update($utente->getId(),'email',$utente->getEmail());

            if($e1 && $e2 && $e3 && $e4 && $e5){
                return true;
            } else {
                return false;
            }
    }

    /**Metodo che conta gli utenti registrati
     * @return boolean
     **/
    public function contaUtentiRegistrati()
    {
        $query ="SELECT COUNT(id) AS n FROM ".$this->table.";";
        try{
            $this->db->beginTransaction();
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
            return $row[0]['n'];


        }
        catch (PDOException $e)
        {
            $this->db->rollBack();
            echo "Attenzione, errore: " . $e->getMessage();
            return null;
        }

    }




}
?>