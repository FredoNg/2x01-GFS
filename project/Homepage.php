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

            <!-- Introduction text-->
            <div class="container-fluid" id="intro">
                <div class="row">
                    <div class="col-xs-12 col-sm-12  col-md-6 text-center  justify-content-center" id="branding">
                        <img src="images/design/logo.png" alt="brand logo" >
                    </div>

                    <div class="col-xs-12 col-sm-12  col-md-6 " id="textbrand">
                        <h1>Creole</h1>
                        <hr>
                        <p>Uniting People Through Fashion</p>

                    </div>
                </div>
            </div>    
            <!--End introduction text-->   

            <!--Start 2 Box of Content-->
            <div class="container-fluid" id="secondcontent">           
                <div class="col-sm-12" id="story">
                    <h2>Our Vision</h2>
                    <h3>Where Fashion Meets Culture</h3>
                    <hr>
                    <p>At Creole we believe that through our</p>
                    <p>culturally inspired fashion, we can</p>
                    <p>unite the world through bringing</p>
                    <p>awareness of the diverse cultures that exists.</p>

                </div>          
            </div>
            <!--End 2nd Content-->

            <!--Shop Now-->
            <div class="container-fluid" id="shopnow">
                <div class="col-xs-6 col-md-4 col-md-offset-2" id='season'>
                    <h2>October Series Collections</h2>
                    <hr>
                    <p>Get Prepped up for Autumn with our Korean</p>
                    <p>inspired Autumn fashion in our</p>
                    <p>October Series Collections</p>
                </div>
                <div class="col-xs-6  col-md-3 margin-top-bot">
                    <img  src="images/products/product-05/1.jpeg" alt="Chania" class='img-responsive' />
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




                        <!--database connection-->
                        <?php
                        $servername = "161.117.122.252";
                        $username = "p1_5";
                        $password = "96rjYQmInJ";
                        $dbname = "p1_5";
                        $link = new mysqli($servername, $username, $password, $dbname);
                        if ($link === false) {
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }
                        ?>
                        <!--Top sells/Trending Products-->
                        <?php
                        $sql = "SELECT * FROM p1_5.products ORDER BY total_qt asc LIMIT 3;";


                        if ($result = mysqli_query($link, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $prod_id = $row['product_id'];
                                    if ($prod_id < 10) {
                                        $prod_id = "0" . $prod_id;
                                    }
                                    echo'<div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-0" >';
                                    echo'<a href="product.php?id=' . $prod_id . '">';
                                    echo'<img src="images/products/product-' . $prod_id . '/1.jpeg" alt="' . $row['product_name'] . '" class="img-responsive"></a>';
                                    echo'<p>' . $row['product_name'] . '</p>';
                                    echo'<p>' . $row['product_price'] . '</p>';
                                    echo'</div>';
                                }
                            }
                        }
                        ?>         
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