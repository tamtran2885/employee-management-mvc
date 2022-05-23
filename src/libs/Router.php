<?php

class Router
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/'); // strip whitespace (or other characters) from the end of a string
        $url = explode('/', $url);

        if (empty($url[0])) {
            $fileController = CONTROLLERS . "LoginController.php";
            require_once $fileController;
            $controller = new LoginController();
            return false;
        }

        $fileController = CONTROLLERS . $url[0] . "Controller.php";
        $controller = ucfirst($url[0]) . "Controller";

        if (file_exists($fileController)) {
            require_once $fileController;

            $controller = new $controller;

            if (isset($url[1])) {

                if (method_exists($controller, $url[1])) {
                    if (isset($url[2])) {
                        $controller->{$url[1]}($url[2]);
                    } else {
                        $controller->{$url[1]}();
                    }
                }
            }
        } else {
            require_once "src/controllers/ErrorController.php";
            $controller = new ErrorController();
        }
    }
}
