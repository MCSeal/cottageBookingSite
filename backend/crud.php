<?php

class crud
{
    //private database object
    private $db;
    //constructor to intialize private variable to DB connection
    function __construct($conn)
    {
        $this->db = $conn;
    }
    //function to create a new record
    //accesses data from success to
    public function insert($name,$email, $number)
    {
        try {
            // sql insert statement into db
            $sql =
                "INSERT INTO users (name,email,number) VALUES (:name, :email, :number)";
            //pdo statement will be passed to this, and will be executed... stmt and this will reference this.db which is assigned from the pdo
            //prepare takes the sql and prepares it for execution

            $stmt = $this->db->prepare($sql);
            //this binds the prameters to the statement, a type of sql injection prevention
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":number", $number);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function getAttendees()
    {
        try {
            $sql =
                "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getSpecialties()
    {
        try{
            $sql = "SELECT * FROM `specialties`;";
            $result = $this->db->query($sql);
            return $result;
        }

        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getSpecialtyById($id)
    {
        try{
            $sql = "SELECT * FROM `specialties` where specialty_id = :id;";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getAttendeeDetail($id)
    {
        try {
            $sql =
                "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            // fetch is needed for a single get request
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function deleteAttendee($id)
    {
        try {
            $sql = "DELETE from attendee where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>