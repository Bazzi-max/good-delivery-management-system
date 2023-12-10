<?php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modify Order Details</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/DBMSProject/src/css/modifyDetails.css" rel="stylesheet">
    <!-- For svg icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <!-- for JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div class="nav">
        <nav>
            <div class="logo"><span id="brand">GDS</span><span id="logo-span"></span></div>
            <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a class="active" href="Dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="setting row">
            <div class="col-2 border ">
                <p class="active border-bottom text-center"><a href="Dashboard.php"> Order Details</a>
                </p>
                <p class="border-bottom text-center"><a href="#">Modify Order</a></p>
                <p class="border-bottom text-center"><a href="OD1.php" target="_blank">Order a Delivery</a></p>
                <p class="border-bottom text-center"><a href="logout.php" role="button">Log out</a></p>
            </div>
            <div class="col-10">
                <form action="" method="GET" class="orderID">
                    <input type="text" class="form-control" placeholder="Order ID" name="orderID" aria-label="orderID">
                    <input class="btn btn-primary m-2" type="submit" name="submit" value="Submit">
                </form>
                <?php
                if (isset($_GET["orderID"])) {
                    $orderID = $_GET["orderID"];
                    $email = $_SESSION["Email"];
                    $sql = "SELECT * FROM c_details WHERE Email='$email'";
                    $sql_query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($sql_query);
                    $id = $row["Cust_ID"];
                    $query = "SELECT * FROM o_details WHERE O_ID='$orderID' AND Cust_ID='$id' ";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    if (!empty($orderID)) {
                        if ( mysqli_num_rows($result)>0 && $row['status'] != "closed") {
                            echo "
                        <form method='post' action=''>                    
                        <p style='margin-top:5px;margin-bottom:0px;'>Pick Up Address</p>
                        <input type='text' class='form-control' name='pickAddress' value='" . $row["pAddress"] . "' contenteditable='true'>
                        <p style='margin-top:5px;margin-bottom:0px;'>Pick Phone Number</p>
                        <input type='text' class='form-control' name='p_phoneNumber' value='" . $row["p_phoneNumber"] . "' contenteditable='true' pattern='[0-9]{10}'>
                        <p style='margin-top:5px;margin-bottom:0px;'>Pick Up Date</p>
                        <input type='text' class='form-control' placeholder='YYYY-MM-DD' name='pdate' value='" . $row["pdate"] . "' contenteditable='true'>
                        <p style='margin-top:5px;margin-bottom:0px;'>Pick Up Time</p>
                        <input type='time' class='form-control' placeholder='HH:MM:SS' name='ptime' value='" . $row["ptime"] . "' contenteditable='true'>
                        <p style='margin-top:5px;margin-bottom:0px;'>Drop off Address</p>
                        <input type='text' class='form-control' name='dropAddress' value='" . $row["dAddress"] . "' contenteditable='true'>
                        <p style='margin-top:5px;margin-bottom:0px;'>Drop Phone Number</p>
                        <input type='text' class='form-control' name='d_phoneNumber' value='" . $row["d_phoneNumber"] . "' contenteditable='true'>
                        <p style='margin-top:5px;margin-bottom:0px;'>Drop off Date</p>
                        <input type='text' class='form-control' placeholder='YYYY-MM-DD' name='ddate' value='" . $row["ddate"] . "' contenteditable='true'><br>
                        <input class='btn bg-success text-white m-2' type='submit' name='updateall' value='Update all'>
                        <input class='btn btn-danger m-2' type='submit' name='delete' value='Delete Order'>
                        "; ?>
                            <?php
                            if (isset($_POST["updateall"])) {
                                $pAddress = $_POST['pickAddress'];
                                $p_phoneNumber = $_POST['p_phoneNumber'];
                                $pdate = $_POST['pdate'];
                                $dAddress = $_POST['dropAddress'];
                                $d_phoneNumber = $_POST['d_phoneNumber'];
                                $ddate = $_POST['ddate'];
                                $ptime = $_POST['ptime'];
                                $query = "UPDATE o_details SET pAddress='$pAddress',p_phoneNumber='$p_phoneNumber',pdate=' $pdate',ptime='$ptime',dAddress='$dAddress',d_phoneNumber='$d_phoneNumber',ddate='$ddate' WHERE O_ID='$orderID'";
                                $result = mysqli_query($conn, $query);
                                if ($result) {
                                    echo "<script>alert('Update Successful')</script>";
                                    echo "<script>window.location.replace('Dashboard.php');</script>";
                                } else {
                                    echo "<script>alert('Update failed')</script>";
                                }
                            }
                        } else {
                            echo "Order either is delivered or doesn't exist";
                        }
                        if (isset($_POST["delete"])) {
                            $query = "DELETE FROM o_details WHERE O_ID='$orderID' AND Cust_ID='$id' ";
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                echo "<script>alert('Deletion Successful')</script>";
                                echo "<script>window.location.replace('Dashboard.php');</script>";
                            } else {
                                echo "<script>alert('Deletion failed')</script>";
                            }
                        }
                    } else {
                        echo "Enter Order ID.";
                    }
                } ?>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <script src="/DBMSProject/src/javascript/js.js"></script>
</body>

</html>

<!-- <input class="btn bg-success text-white m-2" type="submit" name="update" value="Update"></button>
                <input class="btn btn-danger m-2" type="submit" name="delete" value="Delete"></button> -->