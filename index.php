<?php
// Global setting
require_once 'config/global.php';

// Load the controller and execute the action
if(isset($_GET["controller"])) {
    $controllerObj = loadController($_GET["controller"]);
    throwAccion($controllerObj);
} else {
    $controllerObj = loadController(CONTROLLER_DEFAULT);
    throwAccion($controllerObj);
}

/**
 * Load controller
 * @param $controller
 * @return mixed
 */
function loadController($controller) {

    $controlador = ucwords($controller) . 'Controller';
    $strFileController = 'controller/' . $controlador . '.php';

    if(!is_file($strFileController)) {
        $strFileController = 'controller/'. ucwords(CONTROLLER_DEFAULT).'Controller.php';
    }
    require_once $strFileController;

    $controllerObj = new $controlador();
    return $controllerObj;
}

/**
 * Thrown action
 * @param $controllerObj
 */
function throwAccion($controllerObj) {
    if (isset($_GET["action"])) {
        $controllerObj->run($_GET["action"]);
    } else {
        $controllerObj->run(ACCION_DEFAULT);
    }
}
?>