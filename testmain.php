
<?php
require_once 'Classes.php';

function connect() {

    $host = "localhost";
    $username = "root";
    $password = "pippo";
    $db = "myRecipes";
    $dblink = new mysqli($host,$username,$password,$db);
    if ($dblink->connect_error)
    {
        die($dblink->connect_error);
    }
    return $dblink; //restituisco l'oggetto che rappresenta la connessione
}

/**
 * Funzione che data un'immagine e una percentuale (valore decimale) restituisce l'immagine ridimensionata secondo la percentuale specificata
 * @param $w, $h ampiezza e altezza dell'immagine di partenza; $p valore decimale che rappresenta la percentuale di ridimensionamento rispetto alle dimensioni di partenza; $src risorsa immagine di partenza; $type MIME-type dell'immagine
 * @return $resized rappresentazione binaria dell'immagine ridimensionata, pronta per l'inserimento nel db
 **/
function getResize($w, $h, $p, $src, $type){
    $imgdst = imagecreatetruecolor($w*$p, $h*$p); //creazione di un'immagine delle dimensioni desiderate per il ridimensionamento
    imagecopyresized($imgdst, $src, 0, 0, 0, 0, $w*$p, $h*$p, $w, $h); //ridimensionamento

    //stringa binaria che rappresenta la risorsa immagine ridimensionata
    if($type == 'image/png'){
        ob_start(); //attivo l'output buffering
        imagepng($imgdst); //image data from PNG
        $resized =  ob_get_contents(); //stringa binaria presa come contenuto dell'output buffering
        ob_end_clean(); //pulisco l'output buffer e lo disattivo
    }
    if($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/pjpeg'){
        ob_start();
        imagejpeg($imgdst);
        $resized =  ob_get_contents();
        ob_end_clean();
    }
    imagedestroy($imgdst); //dealloco la memoria della risorsa immagine ridimensionata
    $resized = addslashes($resized);
    return $resized; //immagine ridimensionata in formato binario
}

function upload()
{
    $result = false;
    $immagine = '';
    $size = 0;
    $type = '';
    $nome = '';
    $max_size = 300000;
    $result = is_uploaded_file($_FILES['file']['tmp_name']); //is_uploaded_file torna TRUE se il file specificato è stato inviato al server con il metodo POST (si trova nella posizione specificata in 'tmp_name'), altrimenti FALSE
    if (!$result)
    {
        echo "Impossibile eseguire l'upload.";
        return false;
    } else {
        $size = $_FILES['file']['size'];
        if ($size > $max_size)
        {
            echo "Il file è troppo grande.";
            return false;
        }
        $type = $_FILES['file']['type']; //MIME-type del file
        $nome = $_FILES['file']['name']; //nome originario del file sulla macchina client
        $tempname = $_FILES['file']['tmp_name']; //path temporaneo del file sul server
        $immagine = file_get_contents($tempname); //file_get_contents torna un file specificato come stringa
        $immagine = addslashes ($immagine);
        $i = new EImmagine($immagine, $type);

        $i->setIdesterno(1);
        $fi = new FImgRicetta();

        $fi->store($i);



        // grazie alla variabile $type è possibile filtrare rispetto al tipo di
        // file caricato (es. ammesse solo immagini di tipo .gif)

        //inserimento dell'immagine inviata tramite la form e delle altre due versioni nel db


    }
}

if (isset($_FILES['file'])) {
    upload();

}
?>

<h3>Upload</h3>
<form enctype="multipart/form-data"
      action="testmain.php"
      method="post">

    <input name="file" type="file" size="40" />

    <input type="submit" value="Invia" />
</form>
<br />
<a href="link.php?id=1">Elenco</a>