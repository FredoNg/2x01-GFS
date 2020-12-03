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

        .updateoverlay {
            position: absolute; 
            color: #f1f1f1; 
            transition: .5s ease;
            opacity:0;
            height:250px;
            width:250px;
            right: 7%;
            color: white;
            text-align: center;
        }

        .container:hover .updateoverlay {
          opacity: 1;
        }
        .container:hover .updateoverlayhide {
          opacity: 0;
        }
      </style>

    <body>
        <main>
            <!-- Navigation  -->
            <?php
            include 'nav.inc.php';
            ?>
            <!--Navigation End  -->
             <?php
                $sql = "SELECT SUM(points) FROM sql1902664clj.studentpoints where studentID = 2;";
                $result = $conn->query($sql);
                if ( $result->num_rows > 0 ) {
                    foreach ($result as $row){ ?>
           
            <h1 style="text-align: center">SHOP NOW EXCHANGE YOUR POINTS</h1>
                <h3 style="text-align: center"> You currently have: <?php echo $row["SUM(points)"] ?> points !</h3>
            </br>
             <?php
                        
                    }
                }
            ?>
            <div class="row">
                <div class="column">
                    <div class="card">
                        <div class="container" style="width:100%;">
                            <img class="updateoverlayhide" src="images/Student/reward2.png" alt="reward2" style="width:100%">
                            <img class="updateoverlay" style="right: 76%;" src="images/Student/reward2Turn.gif" alt=""/>
                        </div>
                        <h1>Price</h1>
                        <p class="price">200 points</p>
                        <p>Exchange your 200 points for Price</p>
                        <p><button  type="submit" onclick="clicked();">Exchange</button></p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="container" style="width:100%;">
                            <img class="updateoverlayhide" src="images/Student/reward3.png" alt="" style="width:100%"/>
                            <img class="updateoverlay" style="right: 42%;" src="images/Student/reward3Turn.gif" alt="reward3">
                        </div>
                        <h1>Medal</h1>
                        <p class="price">500 points</p>
                        <p>Exchange your 500 points for Medal</p>
                        <p><button  type="submit" onclick="clicked();">Exchange</button></p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="container" style="width:100%;">
                            <img class="updateoverlayhide" src="images/Student/reward1.png" alt="reward1" style="width:100%">
                            <img class="updateoverlay" src="images/Student/reward1Turn.gif" alt="reward3">
                        </div>
                        <h1>Trophy</h1>
                        <p class="price">700 points</p>
                        <p>Exchange your 700 points for Trophy</p>
                        <p><button  type="submit" onclick="clicked();">Exchange</button></p>
                    </div>
                    </br>
                     <div style="margin-top:30px; width: 40%; margin-left: 165px;">
                         <a href="studentHomePage.php" class="btn btn-danger btn-lg btn-block test" role="button">Back to Homepage</a>
                    </div>
                    </br>
                </div>
            </div>

            <script type="text/javascript">
                function clicked() {
                    if (confirm('Exchange Success!' )) {
                        yourformelement.submit();
                    } else {
                        return false;
                    }
                }
            </script>

        </main>
    </body>

</html>