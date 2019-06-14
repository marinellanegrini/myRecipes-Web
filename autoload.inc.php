<?php


function my_autoloader($class_name) {
    if($class_name == "CFrontController") {
        include_once ('Controller/'.$class_name.'.php');
    } else {
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
                include_once ('Controller/ControllerWeb/'.$class_name.'.php');
                break;
            case 'M':
                include_once ('Controller/ControllerMobile/'.$class_name.'.php');
                break;
        }
    }

}



function autoloader_session($class_name){
    if($class_name=="Sessione"){
        include_once ($class_name.'.php');
    }
}
function autoloader_token($class_name){
    if($class_name=="Token"){
        include_once ($class_name.'.php');
    }
}
spl_autoload_register('autoloader_session');
spl_autoload_register('autoloader_token');
spl_autoload_register('my_autoloader');


?>