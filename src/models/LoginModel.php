<?php

class LoginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function checkLogin($name, $password) {
        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE name = :name');

        $query->bindParam(":name", $name);

        try {
            $query->execute();
            $user = $query->fetch();
            if (password_verify($password, $user["password"])) {
                return [true];
            }
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    public function checkUserRole($name, $password) {
        $query = $this->db->connect()->prepare('SELECT * FROM users WHERE name = :name');
        $query->bindParam(":name", $name);

        try {
            $query->execute();
            $user = $query->fetch();
            if (password_verify($password, $user["password"])) {
                $role = $user["role"];
                return $role;
            }
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    public function checkLogout() {
        unset($_SESSION['name']);
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                "",
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httpOnly"],
            );
        }
        session_destroy();
    }
}