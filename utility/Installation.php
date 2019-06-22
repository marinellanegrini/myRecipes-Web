<?php
require_once('Smarty/smarty-libs/libs/Smarty.class.php');

class Installation
{

    /**
     * Se non è mai stata fatta l'installazione parte questo metodo
     *-GET (prima richiesta): si imposta un cookie temporaneo per verificare i cookie abilitati e si mostra il template di installazione
     *-POST (dopo aver compilato la form): si verifica la versione PHP, se il client ha restituito il cookie inviato prima e se
     *ha restituito il cookie inviato con JavaScript
     */
    static function Begin()
    {
        $smarty = new Smarty();
        $smarty->setTemplateDir('Smarty/smarty-dir/templates');
        $smarty->setCompileDir('Smarty/smarty-dir/templates_c');
        $smarty->setCacheDir('Smarty/smarty-dir/cache');
        $smarty->setConfigDir('Smarty/smarty-dir/configs');
        $errore = "";
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            setcookie('verificacookie', 'verifica', time() + 3600);
            $smarty->assign('errore', $errore);
            $smarty->display('Installation.tpl');


        } else { //Metodo POST dopo la compilazione della form
            $php = true;
            $cookie=true;
            $js = true;
            if(version_compare(PHP_VERSION, '7.0.0', '<')){
                $errore = $errore." Versione di PHP inferiore a 7.0.0"; //versione minore di 7.0.0
                $php = false;
            }
            if(!isset($_COOKIE['verificacookie'])){
                $errore = $errore." Cookie non abilitati";
                $cookie = false;
            } //cookie non abilitati

            if(!isset($_COOKIE['javascript'])){
                $errore = $errore." Javascript non abilitato";
                $js= false;
            }
            if(!$php || !$cookie || !$js){ // se uno dei requisiti non è verificato
                $smarty->assign('errore', $errore);

                $smarty->display('Installation.tpl'); // si mostra nuovamente il form di installazione con gli errori
            } else{ // ... ovvero requisti verificati
                //si eliminano i cookie
                setcookie('verificacookie','',time()-3600);
                setcookie('javascript','',time()-3600);
                //si fa partire l'installazione e dopo si indirizza alla homepage
                static::install();

                header('Location: /myRecipes/web/');
            }
        }
    }

    /**
     * Creazione del file config.inc.php che mantiene le credenziali del DB e esecuzione delle queries per la creazione del DB e il suo popolamento
     */
    static function install(){
        try
        {
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nomeutente'], $_POST['password']);
            $db->beginTransaction();
            $query = 'DROP DATABASE IF EXISTS ' .$_POST['nomedb']. '; CREATE DATABASE ' . $_POST['nomedb'] . '; USE ' . $_POST['nomedb'] . ';' . ' SET GLOBAL max_allowed_packet=13000000;';

            $query = $query . file_get_contents('tables/tablespt1.sql');
            $db->exec($query);
            $db->commit();
            $db->beginTransaction();
            $query2 = file_get_contents('tables/tablespt2.sql');
            $db->exec($query2);
            $db->commit();
            $db->beginTransaction();
            $query3 = file_get_contents('tables/tablespt3.sql');
            $db->exec($query3);
            $db->commit();
            $db->beginTransaction();
            $query4 = file_get_contents('tables/tablespt4.sql');
            $db->exec($query4);
            $db->commit();
            $file = fopen('config.inc.php', 'c+');
            $script = '<?php $GLOBALS[\'database\']= \'' . $_POST['nomedb'] . '\'; $GLOBALS[\'username\']=  \'' . $_POST['nomeutente'] . '\'; $GLOBALS[\'password\']= \'' . $_POST['password'] . '\';?>';
            fwrite($file, $script);
            fclose($file);
            $db=null;
            return true;
        }
        catch (PDOException $e)
        {
            echo "Errore : " . $e->getMessage();
            $db->rollBack();
            die;
            return false;
        }
    }

    /**
     * Metodo che verifica se è stata gia fatta l'installazione, verificando se è presente il file di configurazione
     * @return bool esito
     */
    static function VerifyInstallation(): bool{
        if(file_exists('config.inc.php')) return true;
        else return false;
    }
}
