<!doctype html>
<html lang="en">

<?php
$pageTitle = "IRL - Login";
include("inc/head.php");

$userClass = "student-element";
?>

<body>
    <?php include("inc/header.php") ?>

    <!--Login Form-->
    <?php
    //Error message
    $errorMsg = "";

    if (isset($_GET['login-btn'])) {

        $username = $_GET["username"];
        $password = $_GET["password"];

        $standardRegex = "/^[a-zA-Z0-9]+$/";

        //Student Login
        if ($_GET['username'] == 'studentUser' && $_GET['password'] == 'studentPass' && preg_match($standardRegex, $username) && preg_match($standardRegex, $password)) {
            header('Location: student.php');
        }

        //Lecturer Login
        else if ($_GET['username'] == 'lecturerUser' && $_GET['password'] == 'lecturerPass' && preg_match($standardRegex, $username) && preg_match($standardRegex, $password)) {
            header('Location: lecturer.php');
        }

        //Admin Login
        else if ($_GET['username'] == 'adminUser' && $_GET['password'] == 'adminPass' && preg_match($standardRegex, $username) && preg_match($standardRegex, $password)) {
            header('Location: admin.php');
        }

        //Empty fields
        else if ($username == ("" || null) || $password == ("" || null)) {
            $errorMsg = "Your Username and/or Password is/are not filled in. Please try again.";
        }

        //Invalid fields
        else if (!preg_match($standardRegex, $username) || !preg_match($standardRegex, $password)) {
            $errorMsg = "Your Username and/or Password contain(s) unsupported characters. Please try again.";
        }

        //Invalid login
        else {
            $errorMsg = "Your Username and/or Password is/are incorrect. Please try again.";
        }
    } 
    ?>

        <form name="login-form" id="login-form" class="flex" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <h2>Login</h2>

            <div>
                <label for="username">Username:</label>
                <input type="text" id="login-username" name="username">
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" id="login-password" name="password">
            </div>

            <input type="submit" id="login-btn" name="login-btn" value="Log In">
            <h3><?php echo $errorMsg?></h3>

        </form>

    <?php include("inc/footer.php") ?>

    <?php include("inc/scripts.php") ?>
</body>

</html>