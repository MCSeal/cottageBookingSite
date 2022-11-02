<?php
$title = "Index";
require_once "includes/header.php";
?>

<p class="text-center">Before you book, please provide us your contact details so we can message you about your upcoming
    booking:</p>

<form method="post" action="submitContactDetails.php" class="ml-auto" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="Name">Name</label>
        <input required type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name">
    </div>
    <div class="form-group">
        <label for="lastname">Email</label>
        <input required type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
    <div class="form-group">
        <label for="dob">Phone number</label>
        <input required type="text" class="form-control" id="number" placeholder="Enter Phone number" name="number">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>




<?php require_once "includes/footer.php";
?>