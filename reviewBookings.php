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

$results = $booking->getAllBookingsWithUser();
?>

<p class="text-center">Of course this would only be viewable to the owner/admin.
    I have left this able to be accessed if you have submitted contact details,
    only for demonstration purposes.


</p>

<table class="table">
    <tr>
        <th>Booking Date</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Accept Booking?</th>


    </tr>

    <?php
        while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>


    <tr>
        <td><?php echo $r['booking_date'] ?></td>


        <td><?php echo $r['name'] ?></td>

        <td><?php echo $r['email'] ?></td>
        <td><?php echo $r['number'] ?></td>
        <td><a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-success">Accept</a>


            <a onclick="return confirm('are you sure you want to delete this entry?? <?php echo $r['id']?>  ');"
                href="delete.php?id=<?php echo $r['id']?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>



    <?php } ?>

</table>

<table class="table">
    <h2>Accepted Bookings</h2>
    <tr>
        <th>Booking Date</th>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>



    </tr>
</table>

<br>
<br>
<br>
<br>
<?php
    require_once 'includes/footer.php';
?>
<!-- 
<div class="card" style="width: 18rem;">

<div class="card-body">
      <h5 class="card-title"><?php echo $_POST["name"]; ?></h5>
      <p class="card-text">number: <?php echo $_POST["number"]; ?></p>
      <p class="card-text">Email: <?php echo $_POST["email"]; ?></p>
  </div>
</div>
 -->