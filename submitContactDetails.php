<?php
$title = "Successfully entered Contact Details!";
require_once "includes/header.php";
require_once "backend/user.php";
require_once "backend/connection.php";

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];




    $isSuccess = $crud->insert($name, $email, $number);
    $result = $user->getBookingUser($name, $email, $number);

    if ($isSuccess) {
   
        include "includes/successmessage.php";
        $_SESSION['name'] = $name;
        $_SESSION['userid'] = $result['user_id'];
    } else {
        include "includes/error.php";
    }
}
?>



<div class="card" style="width: 18rem;">

    <div class="card-body">
        <h5 class="card-title"><?php echo $_POST["name"]; ?></h5>
        <p class="card-text">number: <?php echo $_POST["number"]; ?></p>
        <p class="card-text">Email: <?php echo $_POST["email"]; ?></p>
    </div>
</div>



<?php require_once "includes/footer.php";
?>