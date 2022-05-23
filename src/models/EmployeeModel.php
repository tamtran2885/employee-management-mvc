<?php
require_once 'entities/Employee.php';

class EmployeeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM employee;");
            while ($row = $query->fetch()) {
                $item = new Employee();

                $item->id = $row['id'];
                $item->name = $row['name'];
                $item->lastName = $row['lastName'];
                $item->email = $row['email'];
                $item->gender = $row['gender'];
                $item->age = $row['age'];
                $item->phoneNumber = $row['phoneNumber'];
                $item->state = $row['state'];
                $item->postalCode = $row['postalCode'];
                $item->city = $row['city'];
                $item->streetAddress = $row['streetAddress'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function create($employee)
    {
        $query = $this->db->connect()->prepare("INSERT INTO employee (name, lastName, email, gender, age, phoneNumber, streetAddress, city, state, postalCode) VALUES (:name, :lastName, :email, :gender, :age, :phoneNumber, :streetAddress, :city, :state, :postalCode);");

        $query->bindParam(":name", $employee["name"]);
        $query->bindParam(":lastName", $employee["lastName"]);
        $query->bindParam(":email", $employee["email"]);
        $query->bindParam(":gender", $employee["gender"]);
        $query->bindParam(":age", $employee["age"]);
        $query->bindParam(":phoneNumber", $employee["phoneNumber"]);
        $query->bindParam(":streetAddress", $employee["streetAddress"]);
        $query->bindParam(":city", $employee["city"]);
        $query->bindParam(":state", $employee["state"]);
        $query->bindParam(":postalCode", $employee["postalCode"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    public function update($employee)
    {
        $query = $this->db->connect()->prepare("UPDATE employee
        SET name=:name, lastName=:lastName, email=:email, gender=:gender, age=:age, phoneNumber=:phoneNumber, streetAddress=:streetAddress, city=:city, state=:state, postalCode=:postalCode 
        WHERE id =  :id;");

        $query->bindParam(":name", $employee["name"]);
        $query->bindParam(":lastName", $employee["lastName"]);
        $query->bindParam(":email", $employee["email"]);
        $query->bindParam(":gender", $employee["gender"]);
        $query->bindParam(":age", $employee["age"]);
        $query->bindParam(":phoneNumber", $employee["phoneNumber"]);
        $query->bindParam(":streetAddress", $employee["streetAddress"]);
        $query->bindParam(":city", $employee["city"]);
        $query->bindParam(":state", $employee["state"]);
        $query->bindParam(":postalCode", $employee["postalCode"]);
        $query->bindParam(":id", $employee["id"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    public function getEmployee($id)
    {
        $query = $this->db->connect()->prepare("SELECT * FROM employee WHERE id = $id;");

        try {
            $query->execute();
            $employee = $query->fetch();
            return $employee;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function delete($employeeId)
    {
        $query = $this->db->connect()->prepare("DELETE FROM employee WHERE id = $employeeId;");

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }
}
