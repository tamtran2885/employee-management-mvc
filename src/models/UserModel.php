<?php
require_once 'entities/User.php';

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM users;");
            while ($row = $query->fetch()) {
                $item = new User();

                $item->userId = $row['userId'];
                $item->name = $row['name'];
                $item->email = $row['email'];
                $item->password = $row['password'];

                $item->role = $row['role'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function create($user)
    {
        $query = $this->db->connect()->prepare("INSERT INTO users (name, email, role, password) VALUES (:name, :email, :role, :password);");

        $password = password_hash($user["password"], PASSWORD_DEFAULT);

        $query->bindParam(":name", $user["name"]);
        $query->bindParam(":email", $user["email"]);
        $query->bindParam(":role", $user["role"]);
        $query->bindParam(":password", $password);



        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    public function update($user)
    {
        $query = $this->db->connect()->prepare("UPDATE users
        SET name=:name, email=:email, role=:role, password=:password WHERE userId =  :userId;");

        $query->bindParam(":name", $user["name"]);
        $query->bindParam(":email", $user["email"]);
        $query->bindParam(":role", $user["role"]);

        $password = password_hash($user["password"], PASSWORD_DEFAULT);
        $query->bindParam(":password", $password);

        $query->bindParam(":userId", $user["userId"]);


        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    public function delete($userId)
    {
        $query = $this->db->connect()->prepare("DELETE FROM users WHERE userId = $userId;");

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    public function getByName($name)
    {
        $query = $this->db->connect()->prepare("SELECT * FROM users where name=:name;");

        $query->bindParam(":name", $name);

        $items = [];

        try {
            $query->execute();
            $result = $query->fetch();

            $item = new User();

            $item->userId = $result['userId'];
            $item->name = $result['name'];
            $item->email = $result['email'];
            $item->password = $result['password'];
            $item->role = $result['role'];

            array_push($items, $item);

            return $items;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
