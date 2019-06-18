<?php
include 'autoload.inc.php';


if(Installation::VerifyInstallation()){ //si verifica se l'installazione è stata già fatta
    $fc = new CFrontController();
    $fc->run(); //se è stata già fatta si invia al front controller la richiesta
}
// se l'installazione non è stata già fatta viene effettuata
else{
    Installation::begin();
}
