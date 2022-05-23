<?php
require_once 'entities/User.php';

class SignupModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($user)
    {
        $query = $this->db->connect()->prepare("INSERT INTO users (name, password, email, role) VALUES (:name, :password, :email, 'user');");

        $encryptedPassword = password_hash($user["password"], PASSWORD_DEFAULT);

        $query->bindParam(":name", $user["name"]);
        $query->bindParam(":password", $encryptedPassword);
        $query->bindParam(":email", $user["email"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }
}
