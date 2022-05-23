<?php

class UserController extends Controller
{
    public $id;
    private $session;
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('user');
        // $this->view->render('user/index');
        $this->session = new Session();
        $this->session->init();
        if ($this->session->getStatus() === 1 || empty($this->session->get('name')))
            exit('No permission');
    }

    public function admin()
    {
        $this->view->render('user/admin');
    }

    public function user()
    {
        $this->view->render('user/user');
    }

    public function getUsers()
    {
        $users = $this->model->get();
        echo json_encode($users);
    }

    public function createUser()
    {
        $user = json_decode(file_get_contents("php://input"), true);
        $newUser = $this->model->create($user);
        echo json_encode($newUser);
    }

    public function updateUser()
    {
        $user = json_decode(file_get_contents("php://input"), true);
        $newUser = $this->model->update($user);
        echo json_encode($newUser);
    }

    public function deleteUser()
    {
        $user = json_decode(file_get_contents("php://input"), true);
        $this->model->delete($user['userId']);
    }

    public function getUserByName()
    {
        $user = $this->model->getByName($_SESSION['name']);
        echo json_encode($user);
    }
}
