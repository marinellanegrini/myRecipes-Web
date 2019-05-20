<?php

class GestioneRicette {
    /**
     * Metodo che avvia la ricerca per ingrediente
     * @return array di ECibo
     */
    public function avviaRicercaI(){
        $pm = PersistentManager::getInstance();
        $cibi = $pm->loadAllObjects();
        return $cibi;
    }

	
}


?>