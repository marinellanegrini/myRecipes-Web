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
        if($sessione->isLoggedAdmin()){
            $commenti = $pm->recuperaUltimi5Commenti();

            $arrcommenti = array();
            //costruisco un array in cui ogni elemento è un array associativo con chiavi 'utente' e 'commento'
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

            $view->mostraHomepageAdmin($commenti, $arrcommenti);


        } else {
            $ids = [1,2,3,1,2,3,1,2,3];
            $ricette = $pm->loadAllByIds("ricetta",$ids);
            $view->mostraHomepageUtente($ricette);
        }
    }
}