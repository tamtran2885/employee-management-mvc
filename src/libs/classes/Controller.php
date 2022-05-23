<?php

class Controller
{
    protected $model;
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    function loadModel($name)
    {
        require_once MODELS . "/{$name}Model.php";
        $name = ucfirst(strtolower($name));
        $model = "{$name}Model";
        $this->model = new $model;
    }
}