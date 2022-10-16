<?php
    $title='Review Bookings';
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

$results = $booking->getAllBookings();
?>



    <table class="table">
        <tr>
            <th>Booking Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Number</th>

    
        </tr>
        
        <?php
        while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        
            
            <tr>
            <td><?php echo $r['booking_date'] ?></td>


            <!-- <td><?php echo $r['firstname'] ?></td>
            <td value=""><?php echo $r['lastname'] ?></td>
            <td><?php echo $r['specialty'] ?></td>
            <td><a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['attendee_id']?>" class="btn btn-warning">Edit</a>

                <a onclick="return confirm('are you sure you want to delete this entry?');" 
                href="delete.php?id=<?php echo $r['attendee_id']?>" class="btn btn-danger">Delete</a>
            </td> -->
            </tr>
        
        

        <?php } ?>

    </table>




<br>
<br>
<br>
<br>
<?php
    require_once 'includes/footer.php';
?>