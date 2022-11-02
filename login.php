<?php
$title = "User Login";
require_once "includes/header.php";
require_once "backend/connection.php";

//when submits, get the email/password/encryptpass
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower(trim($_POST["email"]));
    $password = $_POST["password"];
    $new_password = md5($password . $email);

    $result = $user->getUser($email, $new_password);

    if (!$result) {
        echo '<div class="alert alert-danger">email or Password is Incorrect, please try again.</div>';
    } else {
        // super variable, session
        $_SESSION['email'] = $email;
        $_SESSION['userid'] = $result['id'];
        header("Location: booknow.php");
    }
}
?>


<h1 class="text-center"><?php echo $title; ?></h1>
<br>
<!-- actions $server is for verification before seeing if it is accurate, htmlentities reduces exploitation-->
<form action="<?php echo htmlentities(
    $_SERVER["PHP_SELF"]
); ?>" method="post">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="text" name="email" id="email" class="form-control" value="<?php if (
        $_SERVER["REQUEST_METHOD"] == "POST"
    ) {
        echo $_POST["email"];
    } ?>" />
        <!-- if page is loaded after post action aka you submit, keep the same email aka it didnt login properly -->
        <label class="form-label" for="email">Email</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" name="password" id="password" class="form-control" />
        <label class="form-label" for="password">Password</label>
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4 ">
        <div class="col d-flex justify-content-center">

        </div>

        <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
        </div>
    </div>

    <!-- Submit button -->
    <input type="submit" class="btn btn-dark btn-block mb-4">Sign in</input>

</form>

<?php require_once "includes/footer.php";
?>