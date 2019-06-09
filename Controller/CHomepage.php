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
            $view->mostraHomepageAdmin($commenti);
        } else {
            $ids = [1,2,3,1,2,3,1,2,3];
            $ricette = $pm->loadAllByIds("ricetta",$ids);
            $view->mostraHomepageUtente($ricette);
        }
    }
}