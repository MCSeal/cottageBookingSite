
<?php 
    $title='Edit Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'backend/connection.php';
    require_once 'Utility/calendar.php';
    require_once 'Utility/bookableCell.php';
    require_once 'Utility/booking.php';


    $booking = new Booking(
        'bookings',
        '127.0.0.1',
        'root',
        ''
    );
    
    $id = $_GET['id'];

    if(!$id){
        echo "<h1>Please check details and try again</h1>";
        header("Location: index.php");

    } else {
        
        $result = $booking->delete($id);
    }
        if($result){
            header("Location: reviewBookings.php");
        }
        else {
            include 'includes/error.php';
        }
        
?>

    



    <br>
<?php
    require_once 'includes/footer.php';
?>