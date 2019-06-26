<?php

class MCGestioneRicetteMobile{

    public function Cibi(){
        $pm = FPersistentManager::getInstance();
        $cibi = $pm->loadAllObjects();
        foreach ($cibi as $cibo)
        {
            $cibo->codifica64();
        }
        $view = new VMobile();
        $view->mandaDati($cibi);

    }

    public function PerIngredienti(){
        $view = new VMobile();
        $ids = $view->recuperaDati();
        $pm = FPersistentManager::getInstance();
        $ricette = $pm->ricercaTramiteIngrediente($ids);
        if($ricette!=null){
            foreach ($ricette as $ricetta){
                $ricetta->codifica64();
            }
        }
        $view->mandaDati($ricette);
    }

    public function Avanzata(){
        $view = new VMobile();
        $filtri = $view->recuperaDati();

        $s = $filtri['tprep'];
        if ($s == "Qualsiasi") {
            $filtri['tprep'] = null;
        } elseif (strlen($s)>3) {
            $a = explode("-",$s);
            $filtri['tprep'] = (int)$a[1];
        } else {
            $a = substr($s, 0, 2);
            $filtri['tprep'] = (int)$a+1;
        }
        if ($filtri['diff'] == "Qualsiasi") {
            $filtri['diff'] = null;
        } else {
            $filtri['diff'] = (int) $filtri['diff'];
        }
        if ($filtri['cat'] == "Qualsiasi") {
            $filtri['cat'] = null;
        }
        $pm = FPersistentManager::getInstance();
        $ricette = $pm->ricercaTramiteFiltri($filtri);
        if($ricette!=null){
            foreach ($ricette as $ricetta){
                $ricetta->codifica64();
            }
        }
        $view->mandaDati($ricette);
    }


    public function Ricetta($id) {
        $view = new VMobile();
        $pm = FPersistentManager::getInstance();
        $ricetta = $pm->loadById("ricetta",$id);
        $ricetta->codifica64();
        $view->mandaDati($ricetta);
    }

    public function Nome($nome) {
        $view = new VMobile();
        $pm = FPersistentManager::getInstance();
        $ricette = $pm->search("ricetta", $nome, "nome");
        if($ricette!=null){
            foreach ($ricette as $ricetta){
                $ricetta->codifica64();
            }
        }
        $view->mandaDati($ricette);
    }


    public function Preferiti() {
        $t = Token::getInstance();
        $utente = $t->getAuthUtente();

        $ricette = $utente->getPreferiti();
        foreach ($ricette as $ricetta) {
            $ricetta->codifica64();
        }
        $view = new VMobile();
        $view->mandaDati($ricette);
    }

    public function AggiungiaiPreferiti($idricetta){
        //dal token recupero i dati dell'utente
        $t = Token::getInstance();
        $utente = $t->getAuthUtente();
        $pm = FPersistentManager::getInstance();
        $ric = $pm->loadById("ricetta",$idricetta);
        $ric->incrementasalvataggi();
        $n = $ric->getNsalvataggi();
        $pm->update("ricetta",$idricetta,'nsalvataggi',$n); //aggiornamento ricetta db
        $esito =  $pm->storeUtPrefRic($idricetta,  $utente->getId());
        $utente = $pm->loadById("utente",  $utente->getId());
        $utente->codifica64();
        $view = new VMobile();
        $view->mandaDati($utente);
    }

    public function RimuoviDaPreferiti($idricetta){
        //dal token recupero i dati dell'utente
        $t = Token::getInstance();
        $utente = $t->getAuthUtente();
        $pm = FPersistentManager::getInstance();
        $ret1 = $pm->loadById("ricetta",$idricetta);
        $ret1->decrementaSalvataggi();
        $n = $ret1->getNsalvataggi();
        $pm->update("ricetta", $idricetta, "nsalvataggi", $n);
        $esito = $pm->deleteUtPrefRic($idricetta, $utente->getId());
        $utente = $pm->loadById("utente", $utente->getId());
        $utente->codifica64();
        $view = new VMobile();
        $view->mandaDati($utente); // utente aggiornato
    }

    public function Commento() {
        //dal token recupero i dati dell'utente
        $t = Token::getInstance();
        $utente = $t->getAuthUtente();
        $view = new VMobile();
        $json = $view->recuperaDati();
        $com = new ECommento($json['testo'], $json['data'], $json['ora'],$utente->getId(), $json['idricetta']);
        $pm = FPersistentManager::getInstance();
        $id = $pm->store($com);
        if (!$id) {
            header("HTTP/1.1 500 Internal Server Error");
        }
        $utente = $pm->loadById("utente", $utente->getId());
        $utente->codifica64();
        $view->mandaDati($utente);

    }

    public function Categorie() {
        $pm = FPersistentManager::getInstance();
        $cat = $pm->loadAllCategory();
        $view = new VMobile();
        $view->mandaDati($cat);
    }

    public function Homepage($n){
        $view = new VMobile();

        $pm = FPersistentManager::getInstance();
        $max= $pm->contaricetta();
        $a=array();
        for ($i=1; $i<=$max; $i++){

            array_push($a,$i);
        }
        $b= array_combine(array_values($a),array_values($a));
        $id= array_rand($b,$n);
        $ricette = $pm->loadAllByIds("ricetta",$id);
        foreach ($ricette as $ricetta){
            $ricetta->codifica64();
        }
        $view->mandaDati($ricette);

    }





}

?>