<?php
include("connect.php");
if (isset($_POST["register"])) {
    $Fname = $_POST["Fname"];
    $Mname = $_POST["Mname"];
    $Lname = $_POST["Lname"];
    $City = $_POST["City"];
    $Address = $_POST["Address"];
    $email = $_POST["email-register"];
    $password = $_POST["password1"];
    $sql = "SELECT * FROM c_details WHERE Email='$email'";
    $duplicate = mysqli_query($conn, $sql);
    if (mysqli_num_rows($duplicate) > 0) {
        echo
            "<script> alert('Account already exists with same email');</script>";
    } else {
        $query = "INSERT INTO c_details VALUES('','$Fname','$Mname','$Lname','$City','$Address','$email','$password')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script> alert('Registration Successsful');</script>";
        } else {
            echo "<script> alert('Registration failed!');</script>";
        }

    }
}
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $sql = "SELECT Email, Password FROM c_details WHERE Email='$email'";
    $sql_query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($sql_query);
    if (mysqli_num_rows($sql_query) == 1) {
        if ($password == $row["Password"]) {
            $_SESSION["login"] = true;
            $_SESSION["Email"] = $row["Email"];
            header('Location: Dashboard.php');
        } else {
            echo
                "<script> alert('Wrong Password');</script>";
        }
    } else {
        echo
            "<script> alert('User doesn't exist');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign in/Sign up</title>
    <link rel="stylesheet" href="/DBMSProject/src/css/Signup-in.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- For svg icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="register" id="register-form">
        <nav>
            <div class="logo"><span id="brand">GDS</span><span id="logo-span"></span></div>
            <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="#">Login/Sign up</a></li>
                <li><a href="bac1.php">Become a Provider</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
        <div class="form-box" id="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()"><b>Sign in</b></button>
                <button type="button" class="toggle-btn" onclick="register()"><b>Sign up</b></button>
            </div>
            <!-- <div class="social-icon"></div> -->
            <form id="Sign-in" class="input-group" action="" method="post">
                <input type="email" class="input-field" placeholder="Email" required id="email" name="email">
                <input type="password" class="input-field" placeholder="Password" id="password" minlength="8"
                    maxlength="30" required name="password">
                <div class="showPassword">
                    <input type="checkbox" onclick="showPassword()"><span> Show Password</span>
                </div>
                <a href="#" target="_self"><span id="f-pass"> Forgot Password?</span></a>
                <button type="submit" name="login" class="submit-btn">Sign in</button>
            </form>
            <form id="Sign-up" class="input-group" action="" method="post" onsubmit="return check()">
                <input type="text" class="input-field" placeholder="First Name" required id="Fname" name="Fname"
                    value="">
                <input type="text" class="input-field" placeholder="Middle Name (optional)" name="Mname" value="">
                <input type="text" class="input-field" placeholder="Last Name" required id="Lname" name="Lname"
                    value="">
                <input type="text" class="input-field" placeholder="City" required id="City" name="City" value="">
                <input type="text" class="input-field" placeholder="Address" required id="Address" name="Address"
                    value="">
                <input type="email" class="input-field" placeholder="Email (Example:xyz@mail.com)" required
                    id="email-register" name="email-register" value="">
                <input type="text" class="input-field" placeholder="Confirm Email-id" required name="confirmEmail"
                    id="confirmEmail">
                <input type="password" class="input-field" placeholder="Password" id="password1" required minlength="8"
                    maxlength="32" name="password1" value="">
                <div class="showPassword">
                    <input type="checkbox" onclick="showPassword1()"><span> Show Password</span>
                </div>
                <input type="password" class="input-field" id="confirmPassword" placeholder="Confirm Password"
                    minlength="8" maxlength="30" required name="confirmPassword" value="">
                <input type="checkbox" class="check-box" required><span> I agree to <a target="_blank"
                        href="https://www.termsandconditionsgenerator.com/live.php?token=NdlD2p8fYAMa6OlTiGU8PoXwmj1wOMPX">Terms
                        and conditions</a></span><br>
                <button type="submit" name="register" class="submit-btn">Sign up</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="/DBMSProject/src/javascript/js.js"></script>
</body>

</html>