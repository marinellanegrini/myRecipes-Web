<?php

/** Class CHomepage gestisce le operazioni per impostare l'Homepage, sia per l'utente, sia per l'amministratore */
class CHomepage
{

    /**
     * Metodo per impostare la homepage
     * - Se è l'admin, recupero gli ultimi 5 commenti da mostrare nella homepage admin
     * - Altrimenti recupero le 9 ricette da mostrare nella homepage utente
     */
    public function impostaPagina(){
        $sessione = Sessione::getInstance();
        $pm = FPersistentManager::getInstance();
        $view = new VHomepage();
        if($sessione->isLoggedAdmin()){ //loggato come admin
            $commenti = $pm->recuperaUltimi5Commenti();
            $arrcommenti = array();
            //costruisco un array in cui ogni elemento è un array associativo con chiavi 'utente', 'commento' e 'ricetta'
            foreach ($commenti as $commento){

                $id = $commento->getIdUtente();
                $idric = $commento->getIdRicetta();

                $utente = $pm->loadById("utente",$id);
                $ricetta = $pm->loadById("ricetta",$idric);
                $tmp = array(
                    'utente'=>$utente->getUsername(),
                    'commento'=>$commento,
                    'ricetta'=>$ricetta->getNome()
                );
                $arrcommenti[]=$tmp;
            }

            $a= $pm->contaricetteSalvate();
            $b= $pm->contautentiRegistrati();
            $c= $pm->contacommenti();
            $d= $pm->contaricetta();

            $view->mostraHomepageAdmin($commenti, $arrcommenti, $a, $b,$c,$d);

        } else { //homepage per l'utente
            //ritorna il numero di ricette contenute nel db
            $max= $pm->contaricetta();
            $a=array();
            for ($i=2; $i<=$max; $i++){
                    array_push($a,$i);
            }
            $b= array_combine(array_values($a),array_values($a));

            //estrapolo ids casuali
            $id= array_rand($b,9);

            $ids= array_rand($b,2);
            //carico delle ricette casuali da mostrare nella homepage
            $ricettePrinc = $pm->loadAllByIds("ricetta",$ids);
            $ricette = $pm->loadAllByIds("ricetta",$id);
            $view->mostraHomepageUtente($ricette, $ricettePrinc);
        }
    }


}