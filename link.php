<?php
require_once 'Classes.php';
if (isset($_GET['id']))
{
    $id = intval($_GET['id']); //recupero l'id inviato nella URL (metodo GET)
    $fi = new FImgRicetta();
    $img = $fi->loadById($id);
    $data = $img->getData();
    $data = stripslashes($data);
    $type = $img->getType();
    //header ("Content-type: ".$type); //modifica il content-type della risposta in modo che il browser sappia che deve interpretare il file come immagine e non come un file HTML
    $s = "data:image/png;base64,".base64_encode($data);
    print('<img src="'.$s.'">');

} else {
    echo "Impossibile soddisfare la richiesta.";
}
?>