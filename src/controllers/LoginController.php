<?php

class LoginController extends Controller
{
    private $session;
    public function __construct() {
        parent::__construct();
        $this->view->render('login/index');
        $this->loadModel('login');
        $this->session = new Session();
    }

    public function authUser() {

        $checkLogin = $this->model->checkLogin($_POST["name"], $_POST["password"]);
        $checkUserRole = $this->model->checkUserRole($_POST["name"], $_POST["password"]);

        if (isset($checkLogin)) {
            $this->session->init();
            $this->session->add('name', $_POST["name"]);
            $this->session->add('role', $checkUserRole);
            header("Location: " . URL . "employee/dashboard");
            exit;
        } else {
            header("Location: " . URL . "");
            exit;
        }
    }

    public function logout() {
        $this->model->checkLogout();
        header("Location: " . URL . "");
        exit;
    }

}