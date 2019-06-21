<?php
include 'autoload.inc.php';
include_once 'utility/Installation.php';

//si verifica se l'installazione è stata già fatta
if(Installation::VerifyInstallation()){
    $fc = new CFrontController();
    $fc->run(); //se è stata già fatta si istanzia il front controller che gestisce la richiesta
}
// se l'installazione non è stata già fatta viene effettuata
else{
    Installation::begin();
}