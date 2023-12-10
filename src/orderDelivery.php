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
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="Signup-in.php">Login/Sign up</a></li>
                <li><a href="bac1.php">Become a Provider</a></li>
                <li><a href="OD.php">Order a Delivery</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="setting row border">
            <div class="col-2 border ">
                <p class="active border-bottom text-center"><a href="/src/orderDetails.php"> Order Details</a>
                </p>
                <p class="border-bottom text-center"><a href="modifyDetails.php">Modify Order</a></p>
                <p class="border-bottom text-center"><a href="orderDelivery.php">Order a Delivery</a></p>
                <p class="border-bottom text-center"><a href="Signup-in.php" role="button">Log out</a></p>
            </div>
            <div class="col-10">
                <iframe id="frame" src="/DBMSProject/src/innerphp/OD1.php" class="ratio ratio-1x1"></iframe>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <script src="/DBMSProject/src/javascript/js.js"></script>
</body>
</html>