<?php
require('connect.php');
if (isset($_POST["register"])) {
    $Fname = $_POST["Fname"];
    $Mname = $_POST["Mname"];
    $Lname = $_POST["Lname"];
    $City = $_POST["City"];
    $Address1 = $_POST["Address1"];
    $Address2 = $_POST["Address2"];
    $phoneNumber = $_POST["phoneNumber"];
    $drivingID = $_POST["drivingID"];
    $aadharID= $_POST["aadharID"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM dm_details WHERE Email='$email'";
    $duplicate = mysqli_query($conn, $sql);
    if (mysqli_num_rows($duplicate) > 0) {
        echo
            "<script> alert('Account already exists with same email');</script>";
    } else {
        $query = "INSERT INTO dm_details VALUES('','$Fname','$Mname','$Lname','$City','$Address1','$Address2','$phoneNumber','$drivingID','$aadharID','$email','$password')";
        mysqli_query($conn, $query);
        echo "<script> alert('Registration Successsful, Goto Login Page');</script>";
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM dm_details WHERE Email='$email'";
    $sql_query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($sql_query);
    if (mysqli_num_rows($sql_query)>0) {
            if ($password == $row["Password"]) {
                $_SESSION["DLogin"] = true;
                $_SESSION["Email"] = $row["Email"];
                header('Location: Dashboard1.php');
            } else {
                echo
                    "<script> alert('Wrong Password');</script>";
            }
        }else{
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
    <link rel="stylesheet" href="/DBMSProject/src/css/bac1.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- For svg icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="register" id="register-form1">
        <nav>
            <div class="logo"><span id="brand">GDS</span><span id="logo-span"></span></div>
            <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="Signup-in.php">Login/Sign up</a></li>
                <li><a class="active" href="bac1.php">Become a Provider</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
        <div class="form-box" id="form-box1">
            <div class="button-box">
                <div id="btn1"></div>
                <button type="button" class="toggle-btn" onclick="login1()"><b>Sign in</b></button>
                <button type="button" class="toggle-btn" onclick="register1()"><b>Sign up</b></button>
            </div>
            <!-- <div class="social-icon"></div> -->
            <form id="Sign-in1" class="input-group" action="" method="post">
                <input type="email" class="input-field" placeholder="Email" required id="email" name="email">
                <input type="password" class="input-field" placeholder="Password" id="password" minlength="8"
                    maxlength="30" required name="password">
                <div class="showPassword">
                    <input type="checkbox" onclick="showPassword()"><span> Show Password</span>
                </div>
                <a href="#" target="_self"><span id="f-pass"> Forgot Password?</span></a>
                <button type="submit" name="login" class="submit-btn">Sign in</button>
            </form>
            <form id="Sign-up1" class="input-group" action="" method="post" onsubmit="return check()">
                <input type="text" class="input-field" placeholder="First Name" required maxlength="30" name="Fname">
                <input type="text" class="input-field" placeholder="Middle Name (optional)" maxlength="30" name="Mname">
                <input type="text" class="input-field" placeholder="Last Name" required maxlength="30" name="Lname">
                <input type="text" name="City" class="input-field" placeholder="City" required maxlength="30">
                <input type="text" name="Address1" class="input-field" placeholder="1st Address Line" required
                    maxlength="50">
                <input type="text" name="Address2" class="input-field" placeholder="2nd Address Line (optional)"
                    maxlength="50">
                <input type="tel" name="phoneNumber" class="input-field" placeholder="Phone number" maxlength="10"
                    minlength="10" pattern="[0-9]{10}">
                <input type="text" name="drivingID" class="input-field" placeholder="Driving-License-ID-Number"
                    maxlength="16" minlength="16" required>
                <input type="text" name="aadharID" class="input-field" placeholder="Aadhar-ID-Number" required
                    maxlength="12" minlength="12">
                <input type="email" name="email" class="input-field" id="email-register" placeholder="Email-id" required
                    maxlength="50">
                <input type="email" class="input-field" id="confirmEmail" placeholder="Confirm Email-id" required
                    maxlength="50">
                <input type="password" name="password" class="input-field" id="password1" placeholder="Enter a Password"
                    minlength="8" maxlength="32" required>
                <div class="showPassword">
                    <input type="checkbox" onclick="showPassword1()"><span> Show Password</span>
                </div>
                <input type="password" class="input-field" minlength="8" maxlength="32" id="confirmPassword"
                    placeholder="Confirm Password" required>
                <input type="checkbox" class="check-box" required><span> I agree to <a
                        href="https://www.termsandconditionsgenerator.com/live.php?token=NdlD2p8fYAMa6OlTiGU8PoXwmj1wOMPX"
                        target="_blank">Terms and conditions</a></span>
                <button type="submit" name="register" class="submit-btn-2">Sign up</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="/DBMSProject/src/javascript/js.js"></script>
</body>

</html>