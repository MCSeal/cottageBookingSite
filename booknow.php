

<?php
$title = "Index";
require_once "includes/header.php";


include 'Calendar.php';
include 'Booking.php';
include 'BookableCell.php';

$booking = new Booking(
    'bookings',
    '127.0.0.1',
    'root',
    ''
);
?>
<h1 class="text-center">Book now!</h1>;
<?php
$bookableCell = new BookableCell($booking);
 
$calendar = new Calendar();
 
$calendar->attachObserver('showCell', $bookableCell);
 
$bookableCell->routeActions();
 
echo $calendar->show();

?>

    
   

    

<?php require_once "includes/footer.php";
?>
