<?php
include("Controllers/BaseController.php");
include("Controllers/AdminController.php");
include("Models/BaseModel.php");

if(isset($_GET['controller']) && isset($_GET['action']))
{
    $controller = $_GET['controller'];
    $action = $_GET['action'];
    $controllerFileName = $controller.'Controller.php';
    $controllerFileName = 'Controllers/'. $controllerFileName;
    if(file_exists($controllerFileName))
    {
        include($controllerFileName);
        $controllerClass = $controller.'Controller';
        $controllerObj = new $controllerClass();
        $controllerObj->$action();
    }
    else
    {
        include("Views/not_found_404.html");
    }
}
else
{
    include("Views/not_found_404.html");
}

