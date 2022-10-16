<?php

class user
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertUser($email, $password, $number)
    {
        try {
            $result = $this->getUserByEmail($email);
            //num refers to other function get email num
            if ($result["num"] > 0) {
                return false;
            } else {
                $new_password = md5($password.$email);
                // sql insert statement into db
                $sql =
                    "INSERT INTO users (email,password,number) VALUES (:email, :password, :number)";
                //pdo statement will be passed to this, and will be executed... stmt and this will reference this.db which is assigned from the pdo
                //prepare takes the sql and prepares it for execution

                $stmt = $this->db->prepare($sql);
                //this binds the prameters to the statement, a type of sql injection prevention
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $new_password);
                $stmt->bindParam(":number", $number);
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUser($email, $password)
    {
        try {
            $sql =
                "select * from users where email = :email AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            // fetch is needed for a single get request
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUserByEmail($email)
    {
        try {
            $sql =
                "select count(*) as num from users where email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            // fetch is needed for a single get request
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
