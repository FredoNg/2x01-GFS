<!DOCTYPE html>
<!-- Database connection-->
<?php
//require_once('../protected/config.php');
//$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
//if ($conn->connect_error) {
//    $errorMsg = "Connection failed: " . $conn->connect_error;
//    $success = false;
//} else {
//    $success = true;
//}
//define("results_per_page", 10);
?>
<html lang="en">

    <head>
        <title>Creole | (Shop)</title>
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
        .container {
          position: relative;
          width: 50%;
        }

        .image {
          opacity: 1;
          display: block;
          width: 100%;
          height: auto;
          transition: .5s ease;
          backface-visibility: hidden;
        }

        .middle {
          transition: .5s ease;
          opacity: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          text-align: center;
        }

        .container:hover .image {
          opacity: 0.3;
        }

        .container:hover .middle {
          opacity: 1;
        }

        .text {
          background-color: #4CAF50;
          color: white;
          font-size: 16px;
          padding: 16px 32px;
        }
    </style>
    <body> 
        <main>

            <!-- Navigation  -->
            <?php
            include 'nav.inc.php';
            ?>
            <!--Navigation End  -->
            <!-- Start Carousel --> 
            <div id="myCarousel" class="carousel slide">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>

                </ol>
                <!--End Indicators-->
                <!-- Wrapper for slides -->
                <div class="carousel-inner" id="carousel1" >
                    <div class="item active">
                    </div>
                    <div class="item">
                    </div>
                </div>
                <!-- End Slider Wrap-->
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev" aria-label="Christmas Banner">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next" aria-label="Year End Banner">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
            <!-- End Carousel-->

            <!--Shop Now-->
            <div class="container-fluid" id="shopnow">
                <div class="col-xs-6 col-md-4 col-md-offset-2" id='season'>
                    <h2>October Series Collections</h2>
                    <hr>
                    <p>Get Prepped up for Autumn with our Korean</p>
                    <p>inspired Autumn fashion in our</p>
                    <p>October Series Collections</p>
                </div>
                <div class="col-xs-6  col-md-3 margin-top-bot" >
                    <h3>Student/Lecture Login</h3>
                    <div class="container">
                        <img src="img_avatar.png" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                          <div class="text">John Doe</div>
                        </div>
                    </div
                </div>
            </div>
            <!-- End Shop Now -->

            <!-- Start Quick Shop --> 
            <div class="container-fluid" id="quickshop">
                <div class="row" id="madeforyou">
                    <h2>Ease Of Use</h2>
                    <h3>Navigate Through Things That Might Interest You</h3>
                    <div class="container-fluid margin-top-bot" id="threebutton">
                        <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4 col-md-2 col-md-offset-3" id='menformal'>
                            <a href="shop.php" class="btn btn-danger btn-lg btn-block test"  role="button">Shop</a>
                        </div>
                        <div class="col-xs-6  col-xs-offset-3 col-sm-4 col-sm-offset-4  col-md-2 col-md-offset-0" id='womenformal'>
                            <a href="aboutus.php" class="btn btn-danger btn-lg btn-block test" role="button">Our Story</a>
                        </div>
                        <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4  col-md-2 col-md-offset-0" id='unisex'>
                            <a href="contact-us.php" class="btn btn-danger btn-lg btn-block test" role="button">Find Us</a>
                        </div> 

                        <div class="btn-toolbar" role="toolbar">

                        </div>

                    </div>    
                </div> 
            </div>
            <!-- End Quick Shop -->

            <!-- Trending Products -->
            <div class="container-fluid" id="trend">
                <div class="row">
                    <div class=" col-md-8 col-md-offset-2" id="trending">
                        <h2>Trending Products</h2>
                        <hr>        
                    </div>
                </div>
            </div>
           
            <br>
            <!--Footer-->
            <?php
            include 'footer.inc.php';
            ?>
            <!--Footer End-->
        </main>
    </body>
</html>