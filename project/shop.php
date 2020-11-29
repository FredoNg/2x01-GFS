<!DOCTYPE html>
<!--Database connection-->
<?php
require_once('../protected/config.php');
$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
if ($conn->connect_error) {
    $errorMsg = "Connection failed: " . $conn->connect_error;
    $success = false;
} else {
    $success = true;
}
?>

<html lang="en">

    <head>
        <title>G.F.S | Shop</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Creole | Bringing People Together Through Fashion">
        <meta name="keywords" content="Fasion, Clothes, Dress, Tops, Bottoms">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/filter.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/shopfilter.css" />
    </head>

    <style>
        * {box-sizing: border-box;}

        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            width: 33.33%;
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /*        insided the div*/
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        .price {
            color: grey;
            font-size: 22px;
        }

        .card button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .card button:hover {
            opacity: 0.7;
        }

    </style>

    <body>
        <main>
            <!-- Navigation  -->
            <?php
            include 'nav.inc.php';
            ?>
            <!--Navigation End  -->
            <h1 style="text-align: center">SHOP NOW EXCHANGE YOUR POINTS</h1>
            <h3 style="text-align: center"> You currently have: 10000 points !</h3>
            </br>
            <div class="row">
                <div class="column">
                    <div class="card">
                        <img src="images/Student/reward2.png" alt="reward2" style="width:100%">
                        <h1>Price</h1>
                        <p class="price">200 points</p>
                        <p>Exchange your 200 points for Price</p>
                        <p><button  type="submit" onclick="clicked();">Exchange</button></p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <img src="images/Student/reward3.png" alt="reward3" style="width:100%">
                        <h1>Medal</h1>
                        <p class="price">500 points</p>
                        <p>Exchange your 500 points for Medal</p>
                        <p><button  type="submit" onclick="clicked();">Exchange</button></p>
                    </div>
                </div>
                <div class="column">


                    <div class="card">
                        <img src="images/Student/reward1.png" alt="reward1" style="width:100%">
                        <h1>Trophy</h1>
                        <p class="price">700 points</p>
                        <p>Exchange your 700 points for Trophy</p>
                        <p><button  type="submit" onclick="clicked();">Exchange</button></p>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                function clicked() {
                    if (confirm('Exchange Success!')) {
                        yourformelement.submit();
                    } else {
                        return false;
                    }
                }

            </script>

        </main>
    </body>

</html>