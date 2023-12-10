<?php
include("connect.php");
$email = $_SESSION["Email"];
$sql = "SELECT * FROM dm_details WHERE Email='$email'";
$sql_query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($sql_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Details</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/DBMSProject/src/css/dashboard.css" rel="stylesheet">
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
        <div class="setting row border">
            <div class="col-2 border ">
            <p class="active border-bottom text-center"><a href="Dashboard1.php">Take Orders</a>
                </p>
                <p class="active border-bottom text-center"><a href="#">Order Details</a>
                </p>
                <p class="border-bottom text-center"><a href="modifyDDetails.php">Update Order</a></p>
                <p class="border-bottom text-center"><a href="logout1.php" role="button">Log out</a></p>
            </div>
            <div class="col-10">
                <div class="frame">
                <table class="table table-bordered table-striped table-hover table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th>S.N.</th>
                                <th>O_ID</th>
                                <th>Cust_ID</th>
                                <th>Pick Address</th>
                                <th>Pick Phone Number</th>
                                <th>Pick Date</th>
                                <th>Pick Time</th>
                                <th>Drop Address</th>
                                <th>Drop Phone Number</th>
                                <th>Drop Date</th>
                                <th>Weight</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = $row["D_ID"];
                            $query = "SELECT * FROM o_details WHERE D_ID='$id' ORDER BY status='closed'";
                            $sql = mysqli_query($conn, $query);
                            $count = 0;
                            if (mysqli_num_rows($sql) > 0) {
                                while ($row = mysqli_fetch_assoc($sql)) {
                                    echo "
                                    <tr>
                                        <td>" . ++$count . "</td>
                                        <td>" . $row["O_ID"] . "</td>
                                        <td>" . $row["Cust_ID"] . "</td>
                                        <td>" . $row["pAddress"] . "</td>
                                        <td>" . $row["p_phoneNumber"] . "</td>
                                        ";
                                    if (empty($row["pdate"])) {
                                        echo "<td>" . null . "</td>
                                            <td>" . null . "</td>";
                                    } else {
                                        echo "<td>" . $row["pdate"] . "</td>
                                        <td>" . $row["ptime"] . "</td>";
                                    }
                                    echo "
                                        <td>" . $row["dAddress"] . "</td>
                                        <td>" . $row["d_phoneNumber"] . "</td>
                                        ";
                                    if (empty($row["ddate"])) {
                                        echo "<td>" . null . "</td>";
                                    } else {
                                        echo "<td>" . $row["ddate"] . "</td>";
                                    }
                                    if ($row["weight"] == "0") {
                                        echo "<td>" . null . "</td>";
                                    } else {
                                        echo "<td>" . $row["weight"] . "</td>";
                                    }
                                    echo "
                                        <td>" . $row["status"] . "</td>
                                    </tr>
                                    ";
                                }
                            }
                            ?>
                        </tbody>
                    </table>

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