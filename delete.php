
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
    
    $results = $booking->deleteByDate($booking_date);

    if(!$_GET[$booking_date]){
        echo "<h1>Please check details and try again</h1>";
        header("Location: reviewBookings.php");

    } else {
        $booking_date = $_GET['booking_date'];
        $result = $booking->deleteByDate($booking_date);
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