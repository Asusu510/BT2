<?php

include 'config/config.php';

foreach ($autoload as $file) {
    include 'libs/' . $file . '.php';
    // $$file = new $file();
}	

if (file_exists('controllers/' . $controllerName . '.php')) {
    include 'controllers/' . $controllerName . '.php';
} else {
    echo ('File Not Found !!');
}
 
$controller = new $controllerName();
 
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Method not Found";
}