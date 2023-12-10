<?php
include("connect.php");
$email = $_SESSION["Email"];
$sql = "SELECT * FROM c_details WHERE Email='$email'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$Cust_ID = $row["Cust_ID"];
if (isset($_POST["submit"])) {
    $pAddress = $_POST["pickAddress"];
    $p_phoneNumber = $_POST["p_phoneNumber"];
    $pdate = $_POST["pickdate"];
    $ptime = $_POST["picktime"];
    $dAddress = $_POST["dropAddress"];
    $d_phoneNumber = $_POST["d_phoneNumber"];
    $weight = $_POST["Weight"];
    $vehicle = $_POST["vehicle"];
    $ddate = $_POST["dropdate"];
    $query = "INSERT INTO o_details VALUES('','$pAddress','$p_phoneNumber','$pdate','$ptime','$dAddress','$d_phoneNumber','$ddate','$weight','$vehicle','$Cust_ID','','')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('Order Successful!');</script>";
        echo "<script>window.close();</script>";
    } else {
        echo "<script>alert('Order insertion failed!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GDS-Reliable Delivery</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/DBMSProject/src/css/OD.css" rel="stylesheet">
    <!-- For svg icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <!-- for JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- For GoogleMapAPI -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuuJY4wUImeCOpw2WIiIF_fKsXzRbG6Ok&libraries=places"
        defer></script>
</head>

<body>
    <div class="odRoot" id="odRoot">
        <div class="order">Order</div>
        <div class="deliveryOption">
            <div class="flex-container-1">
                <div class="deliverNow" id="deliverNow_id" onclick="deliveryNow()">
                    <svg width="24" height="24" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="path1-1" fill-rule="evenodd" clip-rule="evenodd"
                            d="M35.62 14h.24c14.627.16 26.298 12.071 26.138 26.62-.08 14.629-11.99 26.46-26.618 26.38C20.75 66.92 8.92 55.009 9 40.38 9.08 25.751 20.99 13.92 35.62 14zm-.014 3h.212c12.973.142 23.322 10.705 23.18 23.606C58.929 53.58 48.366 64.07 35.394 64 22.421 63.929 11.93 53.366 12 40.394 12.071 27.42 22.633 16.93 35.606 17z"
                            fill="black"></path>
                        <path id="path1-2"
                            d="M35.5 23c0-1.657 1.35-3.023 2.99-2.78a20.503 20.503 0 0117.29 17.29c.242 1.64-1.123 2.99-2.78 2.99H38.5a3 3 0 01-3-3V23zM35.732 5h-.549C32.294 5 30 7.25 30 10.083v.75c0 .084.085.167.17.167h10.66c.085 0 .17-.083.17-.167v-.75C40.915 7.25 38.62 5 35.732 5z"
                            fill="black"></path>
                    </svg>
                    <p id="deliverNow">Deliver Now
                    </p><br>
                    <p class="assign">
                        We will assign the nearest courier to pick-up and deliver as soon as possible.
                    </p>
                    <br>
                    <p>From ₹100</p>
                    <div class="dividerLine"></div>
                    <i class='fas fa-truck'></i>
                    <i class='fas fa-biking'></i>
                    <br>
                    <p class="assign assign-2">
                        Delivery by 2 Wheelers as well as four Wheelers
                    </p>
                    <br>
                    <i class='fas fa-shopping-bag'></i>
                    <i class='fas fa-shopping-bag'></i>
                    <p class="assign-3">
                        Weight upto 6 tons.
                    </p>
                </div>
            </div>
            <div class="flex-container-2">
                <div class="deliver-Later deliverNow " id="deliverLater" onclick="deliveryLater()">
                    <svg width="24" height="24" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="path2-1"
                            d="M22.732 5h-.549C19.294 5 17 7.25 17 10.083v.75c0 .084.085.167.17.167h10.66c.085 0 .17-.083.17-.167v-.75C27.915 7.25 25.62 5 22.732 5zM31 25.8a1.8 1.8 0 011.8-1.8h5.4a1.8 1.8 0 011.8 1.8v5.4a1.8 1.8 0 01-1.8 1.8h-5.4a1.8 1.8 0 01-1.8-1.8v-5.4zM44.8 24a1.8 1.8 0 00-1.8 1.8v5.4a1.8 1.8 0 001.8 1.8h5.4a1.8 1.8 0 001.8-1.8v-5.4a1.8 1.8 0 00-1.8-1.8h-5.4zM19 37.8a1.8 1.8 0 011.8-1.8h5.4a1.8 1.8 0 011.8 1.8v5.4a1.8 1.8 0 01-1.8 1.8h-5.4a1.8 1.8 0 01-1.8-1.8v-5.4zM32.8 36a1.8 1.8 0 00-1.8 1.8v5.4a1.8 1.8 0 001.8 1.8h5.4a1.8 1.8 0 001.8-1.8v-5.4a1.8 1.8 0 00-1.8-1.8h-5.4zM43 37.8a1.8 1.8 0 011.8-1.8h5.4a1.8 1.8 0 011.8 1.8v5.4a1.8 1.8 0 01-1.8 1.8h-5.4a1.8 1.8 0 01-1.8-1.8v-5.4zM20.8 48a1.8 1.8 0 00-1.8 1.8v5.4a1.8 1.8 0 001.8 1.8h5.4a1.8 1.8 0 001.8-1.8v-5.4a1.8 1.8 0 00-1.8-1.8h-5.4zM31 49.8a1.8 1.8 0 011.8-1.8h5.4a1.8 1.8 0 011.8 1.8v5.4a1.8 1.8 0 01-1.8 1.8h-5.4a1.8 1.8 0 01-1.8-1.8v-5.4zM44.8 48a1.8 1.8 0 00-1.8 1.8v5.4a1.8 1.8 0 001.8 1.8h5.4a1.8 1.8 0 001.8-1.8v-5.4a1.8 1.8 0 00-1.8-1.8h-5.4z"
                            fill="black"></path>
                        <path id="path2-2" fill-rule="evenodd" clip-rule="evenodd"
                            d="M55 14H16c-3.9 0-7 3.1-7 7v39c0 3.9 3.1 7 7 7h39c3.9 0 7-3.1 7-7V21c0-3.9-3.1-7-7-7zm-2.208 3H18.208A6.17 6.17 0 0012 23.207v34.585A6.17 6.17 0 0018.207 64h34.585A6.17 6.17 0 0059 57.792V23.208A6.17 6.17 0 0052.792 17z"
                            fill="black"></path>
                        <path id="path2-3"
                            d="M48.183 5h.549c2.889 0 5.183 2.25 5.268 5.083v.75c0 .084-.085.167-.17.167H43.17c-.085 0-.17-.083-.17-.167v-.75C43 7.25 45.294 5 48.183 5z"
                            fill="black"></path>
                    </svg>
                    <p id="deliverNow">Schedule Later
                    </p><br>
                    <p class="assign">
                        We will assign the nearest courier to pick-up and deliver as soon as possible.
                    </p>
                    <br>
                    <p>From ₹150</p>
                    <div class="dividerLine"></div>
                    <i class='fas fa-truck'></i>
                    <i class='fas fa-biking'></i>
                    <br>
                    <p class="assign assign-2">
                        Delivery by 2 Wheelers as well as four Wheelers.
                    </p>
                    <br>
                    <i class='fas fa-shopping-bag'></i>
                    <i class='fas fa-shopping-bag'></i>
                    <p class="assign-3">
                        Weight upto 6 tons.
                    </p>
                </div>
            </div>
        </div>
        <div class="form-box" id="form-box">
            <form action="" method="post">
                <div class="pickAddress" id="pickAddress">
                    <p class="pickupAddress">
                        From,
                        <br>
                        Pick Up Address
                    </p>
                    <svg class="pin-icon-pu" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                        <path fill-rule="evenodd"
                            d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                    </svg>
                    <input type="text" id="Pick-up" name="pickAddress" placeholder="Street, Locality & City"
                        class="LandingMiniFormAddress" value="" required>
                    <br>
                    <p class="pick-up-number">10 digit Phone Number</p>
                    <br>
                    <input type="tel" name="p_phoneNumber" class="LandingMiniFormAddress phoneNumber"
                        placeholder="Phone number" maxlength="10" minlength="10" pattern="[0-9]{10}" required>
                    <input type="date"  name="pickdate" id="pick-up-date">
                    <input type="time"  name="picktime" id="pick-up-time">
                </div><!--pick up div-->
                <div class="dropAddress" id="dropAddress">
                    <p class="dropoffAddress">
                        To,
                        <br>
                        Drop off Address
                    </p>
                    <svg class="pin-icon-d" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                        <path fill-rule="evenodd"
                            d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                    </svg>
                    <input type="text" id="Drop-off" placeholder="Street, Locality & City"
                        class="LandingMiniFormAddress" value="" name="dropAddress" required>
                    <br>
                    <p class="drop-off-number">10 digit Phone Number</p>
                    <br>
                    <input type="tel" name="d_phoneNumber" class="LandingMiniFormAddress phoneNumber"
                        placeholder="Phone number" maxlength="10" minlength="10" pattern="[0-9]{10}" required>
                    <input type="date" id="pick-up-date" placeholder="2020/12/24" name="dropdate"><b> (optional)</b>
                    <br>
                    <p class="assign-4">
                        <label>Weight(kg):</label> <b>(optional)<b>
                    </p>
                    <input type="text" name="Weight" min="0" max="6000" id="pick-up-date" >
                    <br>
                    <label>Type of vehicle required:</label><br>
                    <select class="form-select" aria-label="Default select example" name="vehicle" required>
                        <option value="TwoWheelers">Two wheelers</option>
                        <option value="heavyPickup">Light Pickup</option>
                        <option value="heavyPickup">Heavy Pickup</option>
                    </select>
                    <br>
                </div> <!--drop off div-->
                <button type="submit" class="submit-btn" name="submit">Submit</button>
            </form>
        </div><!--form-box div-->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="/DBMSProject/src/javascript/js.js"></script>
</body>

</html>