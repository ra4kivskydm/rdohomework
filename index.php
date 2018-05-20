<?php
define ('DS', DIRECTORY_SEPARATOR);
define ('ROOT', __DIR__ . DS);
define('VIEW_DIR', ROOT . 'View' . DS);
define('LIB_DIR', ROOT . 'lib' . DS);
define('CONTROLLER_DIR', ROOT . 'Controller' . DS);
define('MODEL_DIR', ROOT . 'Model' . DS);

function __autoload(string $className)
{
    $file = "{$className}.php";

    if (file_exists(LIB_DIR . $file))
    {
        require_once LIB_DIR . $file;
    }

    elseif (file_exists(CONTROLLER_DIR . $file))
    {
        require_once CONTROLLER_DIR . $file;

    }
    elseif (file_exists(MODEL_DIR . $file))
    {
        require_once MODEL_DIR . $file;
    }
    else
    {
        die("{$file} not found");
    }

}
session_start();
$request = new Request();
$route = $request->get('route');

if (is_null($route))
{
    $route = 'index/index';
}

$route = explode('/', $route);
$controller = ucfirst($route[0]).'Controller';
$action = $route[1] . 'Action';
$controller =  new $controller;
if (!method_exists($controller, $action))
{
    die("{$action} not found");
}

$content = $controller->$action($request);

require VIEW_DIR . 'default_layout.phtml';


?>