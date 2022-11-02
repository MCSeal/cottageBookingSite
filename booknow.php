<?php
$title = "Index";
require_once "includes/header.php";
require_once 'includes/auth_check_bookings.php';

include './Utility/Calendar.php';
include './Utility/Booking.php';
include './Utility/BookableCell.php';



$booking = new Booking(
    'bookings',
    '127.0.0.1',
    'root',
    ''
);
?>



<div class="text-center">

    <h1>Book now</h1>
    <p>Please put your information before booking </p>
</div>

<?php

$userId = $_SESSION['userid'];
$bookableCell = new BookableCell($booking);
 
$calendar = new Calendar();
 
$calendar->attachObserver('showCell', $bookableCell);
 
$bookableCell->routeActions($userId);
 
echo $calendar->show();

?>






<?php require_once "includes/footer.php";
?>