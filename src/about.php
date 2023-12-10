<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/DBMSProject/src/css/about.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <!-- for JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>    
    </head>
    <body>
        <div class="aboutRoot">
            <nav>
                <div class="logo"><span id="brand">GDS</span><span id="logo-span"></span></div>
                <input type="checkbox" id="click">
                <label for="click" class="menu-btn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a  href="Signup-in.php">Login/Sign up</a></li>
                    <li><a href="bac1.php">Become a Courier</a></li>
                    <li><a class="active" href="#">About</a></li>
                </ul>
            </nav>
            <div class="about-div">
                <p class="about-1">
                    This Website is Developed for the DBMS mini Project <br> under the guidence of
                    <div class="ul">
                        <ol>
                            <li >Dr. T.N. ANITHA (Professor)
                            </li>
                            <li class="li"> Mrs. ASMA BEGUM (Assistant Professor)</li>
                            <li class="li"> Ms. Malini (Assistant Professor)</li>
                        </ol>
                    </div>
                </p>
                    <br>
                    <div class="about-2">
                        <p class="about-2">On Completion of this project, We will be able to demonstrate fully functional Goods Delivery Management System, which stores the Client data, DeliveryMan data and the Order data. After taking in Client data in the database, the Client will be able to provide a delivery order which will be stored in order database.</p>
                    </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="/DBMSProject/src/javascript/js.js"></script>
    </body>
</html>