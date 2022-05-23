<?php

class SignupController extends Controller
{
    public function __construct() {
        parent::__construct();
        $this->view->render('signup/index');
        $this->loadModel('signup');
    }

    public function createUser() {
        if($_POST['password'] === $_POST['confirmedPassword']) {
            $user = $this->model->create($_POST);
            header("Location: " . URL . "");
            exit;
        } else {
            exit('Password not matched');
        }
    }
}