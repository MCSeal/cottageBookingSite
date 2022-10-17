<?php
$title = "Index";
require_once "includes/header.php";
?>

<p class="text-center">Before you book, please provide us your contact details so we can message you about your upcoming booking:</p>

<form method="post" action="success.php" class="ml-auto" enctype= 'multipart/form-data'>
        <div class="form-group">
            <label for="Name">Name</label>
            <input required type="text" class="form-control" id="Name"  placeholder="Enter Full Name" name="fullname">
        </div>
        <div class="form-group">
            <label for="lastname">Email</label>
            <input required type="text" class="form-control" id="lastname"  placeholder="Enter Email" name="Email">
        </div>
        <div class="form-group">
            <label for="dob">Phone number</label>
            <input type="text" class="form-control" id="Phone number"  placeholder="Enter Phone number" name="Phone number">
        </div>


</form>


    

<?php require_once "includes/footer.php";
?>
