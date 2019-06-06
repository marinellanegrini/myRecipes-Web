<?php


function my_autoloader($class_name) {
    switch ($class_name[0]) {
        case 'V':
            include_once ('View/'.$class_name.'.php');
            break;
        case 'F':
            include_once ('Foundation/'.$class_name.'.php');
            break;
        case 'E':
            include_once ('Entity/'.$class_name.'.php');
            break;
        case 'C':
            include_once ('Controller/'.$class_name.'.php');
            break;
    }
}

spl_autoload_register('my_autoloader');

?>