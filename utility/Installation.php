<?php
require_once('Smarty/smarty-libs/libs/Smarty.class.php');

class Installation
{

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
        } else{ //Metodo POST dopo la compilazione della form
            $php = true;
            $cookie=true;
            if(version_compare(PHP_VERSION, '7.0.0', '<')){
                $errore = $errore." Versione di PHP inferiore a 7.0.0"; //versione minore di 7.0.0
                $php = false;
            }
            if(!isset($_COOKIE['verificacookie'])){
                $errore = $errore." Cookie non abilitati";
                $cookie = false;} //cookie non abilitati
            if(!$php || !$cookie){ // se uno dei requisiti non è verificato

                $smarty->assign('errore', $errore);
                $smarty->display('Installation.tpl'); // si mostra nuovamente il form di installazione con gli errori
            } else{ // ... ovvero requisti verificati
                ////si eliminano i cookie
                setcookie('verificacookie','',time()-3600);
                static::install();

                header('Location: /myRecipes/web');
            }
        }
    }

    /**
     * Funzione che provvede alla creazione del file config.inc.php per l'accesso al database e della creazione del database.
     */
    static function install(){
        try
        {
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nomeutente'], $_POST['password']);
            $db->beginTransaction();
            $query = 'DROP DATABASE IF EXISTS ' .$_POST['nomedb']. '; CREATE DATABASE ' . $_POST['nomedb'] . " CHARACTER SET ='utf8' COLLATE = 'utf8_general_ci'" .' ; USE ' . $_POST['nomedb'] . ';';
            $query = $query . file_get_contents('tables.sql');
            $db->exec($query);
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

    static function VerifyInstallation(): bool{
        if(file_exists('config.inc.php')) return true;
        else return false;
    }
}
