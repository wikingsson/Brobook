<?php
    require_once "controllers/messagecontroller.php";
    require_once "controllers/usercontroller.php";
    require_once "controllers/friendcontroller.php";
    require_once "controllers/statuscontroller.php";


    //$requestURI = explode("/", $_SERVER["REQUEST_URI"]);

    $requestURI = explode("/", parse_url(rtrim(strtolower($_SERVER["REQUEST_URI"]), "/"), PHP_URL_PATH));



    $controller = "usercontroller";
    $action = "showForm";



    if(!empty($requestURI[2])) {
        $controller = $requestURI[2] . "controller";
    }

    if(!empty($requestURI[3])) {
        $action = $requestURI[3];
    }

    if(method_exists($controller, $action)){
        $obj = new $controller;
        $obj->$action();
    }
    else{
        //echo "404" . $controller ." " . $action;
        require_once "views/404.php";
    }


