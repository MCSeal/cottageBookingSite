<?php
 
class Booking
{
 
    private $dbh;
 
    private $bookingsTableName = 'bookings';
 
    /**
     *  Booking constructor.
     * @param string $database
     * @param string $host
     * @param string $databaseUsername
     * @param string $databaseUserPassword
     */
    public function __construct($database, $host, $databaseUsername, $databaseUserPassword)
    {
        try {
 
            $this->dbh =
                new PDO(sprintf('mysql:host=%s;dbname=%s', $host, $database),
                    $databaseUsername,
                    $databaseUserPassword
                );
 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function index()
    {
        $statement = $this->dbh->query('SELECT * FROM ' . $this->bookingsTableName);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add(DateTimeImmutable $bookingDate, $userId)
    {
        $statement = $this->dbh->prepare(
            'INSERT INTO ' . $this->bookingsTableName . ' (booking_date, user_id) VALUES (:bookingDate, :userId)'
        );
    
        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }
    
        if (false === $statement->execute([
                ':bookingDate' => $bookingDate->format('Y-m-d'),
                'userId' => $userId
            ])) {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }
    }

    public function delete($id)
    {
        $statement = $this->dbh->prepare(
            'DELETE from ' . $this->bookingsTableName . ' WHERE id = :id'
        );
        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }
        if (false === $statement->execute([':id' => $id])) {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }
        return true;
    }
    public function acceptBooking($id)
    {
        $statement = $this->dbh->prepare(
            "UPDATE `bookings` SET `accepted` = 1 WHERE  id = :id"
        );
        if (false === $statement) {
            throw new Exception('Invalid prepare statement');
        }
        if (false === $statement->execute([':id' => $id])) {
            throw new Exception(implode(' ', $statement->errorInfo()));
        }
        return true;
    }
    public function getAllBookings()
    {
        {
            $statement = $this->dbh->query('SELECT * FROM ' . $this->bookingsTableName);
            return $statement;
        }
    }
    public function getAllBookingsWithUser()
    {
        {
            $statement = $this->dbh->query("SELECT * FROM `bookings` a inner join users s on a.user_id = s.user_id where accepted IS NULL");
            return $statement;
        }
    }
    public function getAllAcceptedBookings()
    {
        {
            $statement = $this->dbh->query("SELECT * FROM `bookings` a inner join users s on a.user_id = s.user_id where accepted = 1");
            return $statement;
        }
    }

}

?>