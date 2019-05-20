<?php

class GestioneRicette {

    /**
     * Metodo che dato l'id restituisce una ricetta
     * @param $id identificativo ricetta
     * @return oggetto ERicetta
     */
    public function selezionaRicetta($id){
        $pm = PersistentManager::getInstance();
        $ret = $pm->loadById("ricetta",$id);
        return $ret;
    }
	
}


?>