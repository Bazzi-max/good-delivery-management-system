<?php
include("connect.php");
$email = $_SESSION["Email"];
$sql = "SELECT * FROM dm_details WHERE Email='$email'";
$sql_query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($sql_query);
$D_ID = $row['D_ID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Details</title>
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
        </nav>
    </div>
    <div class="container-fluid">
        <div class="setting row">
            <div class="col-2 border ">
                <p class="active border-bottom text-center"><a href="Dashboard1.php">Take Orders</a>
                </p>
                <p class="active border-bottom text-center"><a href="orderDDetails.php">Order Details</a>
                </p>
                <p class="border-bottom text-center"><a href="#">Update Order</a></p>
                <p class="border-bottom text-center"><a href="logout1.php" role="button">Log out</a></p>
            </div>
            <div class="col-10">
                <form action="" method="GET" class="orderID">
                    <input type="text" class="form-control" placeholder="Order ID" name="orderID" aria-label="orderID"
                        value="" />
                    <input class="btn btn-primary m-2" type="submit" name="submit" value="Submit">
                </form>
                <?php
                if (isset($_GET["orderID"])) {
                    $orderID = $_GET["orderID"];
                    if (!empty($orderID)) {
                        $query = "SELECT * FROM o_details WHERE O_ID='$orderID'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        if (mysqli_num_rows($result) == 1 && $row['status'] == "open") {
                            echo "
                            <form method='post' action=''>
                            <input class='btn bg-success text-white m-2' type='submit' name='delivered' value='Delivery Done'>
                            <input class='btn btn-danger m-2' type='submit' name='cancel' value='Cancel Order'>
                            </form>";
                            if (isset($_POST['delivered'])) {
                                $status_update = "UPDATE o_details SET status='closed' WHERE O_ID='$orderID' AND D_ID='$D_ID'";
                                $result = mysqli_query($conn, $status_update);
                                if ($result) {
                                    echo "<script>alert('Delivery updation Successful!');</script>";
                                    echo "<script>window.location.replace('orderDDetails.php')</script>";
                                } else {
                                    echo "<script>alert('Delivery updation Failed!');</script>";
                                }
                            }
                            if (isset($_POST['cancel'])) {
                                $status_update = "UPDATE o_details SET status='' WHERE O_ID='$orderID' AND D_ID='$D_ID'";
                                $result = mysqli_query($conn, $status_update);
                                if ($result) {
                                    echo "<script>alert('Order Canceled!');</script>";
                                    echo "<script>window.location.replace('orderDDetails.php')</script>";
                                } else {
                                    echo "<script>alert('Operation Failed!');</script>";
                                }
                            }
                        } else {
                            echo "Order either is delivered or doesn't exist";
                        }
                    } else {
                        echo "Enter Order ID.";
                    }
                    // $sql = "UPDATE status FROM o_details WHERE O_ID='$orderID' AND D_ID='$D_ID'";
                    // $sql_query = mysqli_query($conn, $sql);
                    // $row = mysqli_fetch_assoc($sql_query);
                }

                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="/DBMSProject/src/javascript/js.js"></script>
</body>

</html>





<!-- <p class="border-bottom text-center"> Insert Order </p>
                <p class="border-bottom text-center">Update Order</p>
                <p class="border-bottom text-center">Delete Order</p> -->