<!DOCTYPE html>
<!-- Database connection-->
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
          width: 100%;
        }

        .image {
          opacity: 1;
          display: block;
          width: 100%;
          height: auto;
          transition: .5s ease;
          backface-visibility: visible;

        }
        .middle {
          transition: .5s ease;
          opacity: 1;
          position: absolute; 
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          text-align: center;
        }

        .container:hover .image {
          opacity: 1;
        }

        .container:hover .middle {
          opacity: 1;
        }

        .text {
          color: white;
          font-size: 16px;
        }
        .center {
            margin-left: auto;
            margin-right: auto;
        }
        th{
            text-align: center;
        }
        .updatebtn{
            position: relative;
            background-color: transparent;
            border-style: none;
        }
        .updateoverlay {
            position: absolute; 
            color: #f1f1f1; 
            transition: .5s ease;
            opacity:0;
            left: 10%;
            color: white;
            text-align: center;
        }

        button:hover .updateoverlay {
          opacity: 1;
        }
        button:hover .updateoverlayhide {
          opacity: 0;
        }
        
        
        body {font-family: Arial;}

        /* Style the tab */
        .tab {
          overflow: hidden;
          border: 1px solid #ccc;
          background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
          background-color: inherit;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          transition: 0.3s;
          font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
          background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
          background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
          display: none;
          padding: 6px 12px;
          border: 1px solid #ccc;
          border-top: none;
        }

    </style>
    <body> 
        <main>
            <img id="message"  style="display:none; height: 100%; width:100%; position: relative;" src="images/Student/OpenPage.gif" alt=""/>
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
                <div class="col-xs-6 col-md-2 col-md-offset-2" id='season'>
                    <h2>List of Modules</h2>
                    <hr>
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM users U INNER JOIN enrolledstudents ES on ES.studentID = U.uID INNER JOIN modules M ON M.mID = ES.moduleID WHERE U.uID = 1";

                        $result = $conn->query($sql);

                        if ( $result->num_rows > 0 ) {
                            foreach ($result as $row) {
                                ?>
                                <button class="tablinks" style="width: 100%; margin-bottom: 15px;" onclick="openCity(event, <?php echo $row['mID'] ?>)"><?php echo $row['mName'] ?></button>
                            <?php
                            }
                        }
                        ?>
                        <button class="tablinks" style="width: 100%; margin-bottom: 15px;" onclick="openCity(event, 'Paris')">ICT 1002</button>
                        <button class="tablinks" style="width: 100%; margin-bottom: 15px;" onclick="openCity(event, 'Tokyo')">Tokyo</button>
                    </div>

                </div>
                <div class="col-xs-6  col-md-5 margin-top-bot" >
                    <h3> {Student Name} </h3>
                    <div class="container">
                        <img src="images/Student/Female.jpg" alt="Avatar" class="image" style="width:100%">
                            <div class="middle">
                                <div class="middle">
                                    <img class="middle" src="images/Student/anonymous-mask.gif" alt=""/> 
                                    <img class="middle" src="images/Student/ProjoctManagement.gif" alt=""/>
                                    <img class="middle" src="images/Student/2901-Male.gif" alt=""/>
                                    <img class="middle" src="images/Student/ethernet.gif" alt=""/>
                                    <img class="middle" src="images/Student/embedded.gif" alt=""/>
                                    <!--<img class="middle" src="images/Student/1.gif" alt=""/>-->
                                    <!--<img class="text" src="images/Student/anonymous-mask.gif" alt=""/>-->
                                </div>
                            </div>
                        </div
                    </div>
                    
                </div>
            </div>
            <!-- End Shop Now -->

            <!-- Start Quick Shop --> 
            <div class="container-fluid" id="quickshop">
                <div class="row" id="madeforyou">
                    <h2> Your current progress  </h2>
                    <hr>
                     <?php
                        $sql = "SELECT * FROM sql1902664clj.enrolledstudents where studentId = 2;";
                        $result = $conn->query($sql);
                        if ( $result->num_rows > 0 ) {
                            foreach ($result as $row) {
                                ?>
                                <div id="<?php echo $row['moduleID'] ?>" class="tabcontent" class="container">
                                    <table class="center">
                                        <tr>
                                            <th>Start</th>
                                        <?php 
                                            $sql2 = "SELECT * FROM sql1902664clj.assessments where mID = '".$row['moduleID']."' and aName != 'Quizzes'";
                                            $result2 = $conn->query($sql2);
                                            if ( $result2->num_rows > 0 ) {
                                                foreach ($result2 as $row2) {
                                        ?>
                                            <th><?php echo $row2['aName'] ?></th>
                                        <?php 
                                            }
                                        }
                                        ?>
                                        </tr>
                                            <td>
                                                <img src="images/Progress Bar/biggreencicle.gif"/>
                                            </td>
                                        <?php 
                                            $sql2 = "SELECT * 
                                                        FROM sql1902664clj.grades G
                                                        LEFT JOIN sql1902664clj.assessments SES
                                                        ON SES.aID = G.aID
                                                        WHERE SES.mID = ".$row['moduleID']." AND G.studentID = 2 AND SES.aName != 'Quizzes'";
                                            
                                            $result2 = $conn->query($sql2);
                                            if ( $result2->num_rows > 0 ) {
                                                foreach ($result2 as $row2) {
                                                    if (strpos($row2['aName'], "Quiz") !== false){
                                                        echo ("<td>
                                                                    <button type='button' class='updatebtn' title='Update Details'>
                                                                        <img class='updateoverlayhide' src='images/Progress Bar/smallgreencircle.gif'/>
                                                                        <img class='updateoverlay' src='images/Progress Bar/smallgreencircleTurn.gif'/>
                                                                    </button>
                                                                </td>");
                                                    }
                                            }
                                        }
                                        ?>
                                        </tr>

<!--                                        <tr>
                                            <td>
                                                <button type="button" class="updatebtn" title="Update Details">
                                                    <img class="updateoverlayhide" src="images/Progress Bar/biggreencicle.gif" alt=""/>
                                                    <img class="updateoverlay" src="images/Progress Bar/biggreencicleTurn.gif" alt=""/>
                                                </button>
                                            </td>
                                            
                                        </tr>-->
                                    </table>
                                </div>
                            <?php
                            }
                        }
                        ?>
                    <div id="London" class="tabcontent" class="container">
                        <table class="center">
                            <tr>
                                <th>Start</th>
                                <th>Quiz 1</th>
                                <th>Quiz 2</th>
                                <th>Quiz 3</th>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="updatebtn" title="Update Details">
                                        <img class="updateoverlayhide" src="images/Progress Bar/biggreencicle.gif" alt=""/>
                                        <img class="updateoverlay" src="images/Progress Bar/biggreencicleTurn.gif" alt=""/>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="updatebtn" title="Update Details">
                                        <img class="updateoverlayhide"  src="images/Progress Bar/smallgreencircle.gif" alt=""/>
                                        <img class="updateoverlay" src="images/Progress Bar/smallgreencircleTurn.gif" alt=""/>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="updatebtn" title="Update Details">
                                        <img class="updateoverlayhide"  src="images/Progress Bar/smallgreycircle.gif" alt=""/>
                                        <img class="updateoverlay" src="images/Progress Bar/smallgreycircleTurn.gif" alt=""/>
                                    </button>
                                </td>  
                                <td>
                                    <button type="button" class="updatebtn" title="Update Details">
                                        <img class="updateoverlayhide" src="images/Progress Bar/biggreycircle.gif" alt=""/>
                                        <img class="updateoverlay" src="images/Progress Bar/biggreycircleTurn.gif" alt=""/>
                                    </button>
                                </td>  
                            </tr>
                        </table>
                    </div>
                    
                    <div id="Paris" class="tabcontent">
                        <table class="center">
                            <tr>
                                <th>Start</th>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="updatebtn" title="Update Details">
                                        <img class="updateoverlayhide" src="images/Progress Bar/biggreencicle.gif" alt=""/>
                                        <img class="updateoverlay" src="images/Progress Bar/biggreencicleTurn.gif" alt=""/>
                                    </button>
                                </td>
                                 
                            </tr>
                        </table>
                     </div>
                    
                    <div id="Tokyo" class="tabcontent" class="container">
                        <table class="center">
                            <tr>
                                <th>Start</th>
                                <th>Quiz 1</th>
                                
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="updatebtn" title="Update Details">
                                        <img class="updateoverlayhide" src="images/Progress Bar/biggreencicle.gif" alt=""/>
                                        <img class="updateoverlay" src="images/Progress Bar/biggreencicleTurn.gif" alt=""/>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="updatebtn" title="Update Details">
                                        <img class="updateoverlayhide"  src="images/Progress Bar/smallgreencircle.gif" alt=""/>
                                        <img class="updateoverlay" src="images/Progress Bar/smallgreencircleTurn.gif" alt=""/>
                                    </button>
                                </td>
                                
                            </tr>
                        </table>
                     </div>
                                       
                    
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
                        
                        
                        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
                        <script>
                        //When the page has loaded.
                        $( document ).ready(function(){
                            $('#message').fadeIn('slow', function(){
                               $('#message').delay(5000).fadeOut(); 
                            });
                        });
                        </script>

                    </div>    
                </div> 
            </div>
            <!-- End Quick Shop -->

<!--             Trending Products 
            <div class="container-fluid" id="trend">
                <div class="row">
                    <div class=" col-md-8 col-md-offset-2" id="trending">
                        <h2>Trending Products</h2>
                        <hr>        
                    </div>
                </div>
            </div>-->
           <!-- View Catering Details Modal -->
            <div class="modal fade" id="updateCatering" tab-index="-1" role="dialog" aria-labelledby="viewCaterinngDetails" aria-hidden="true">
            
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Centre Information</h4>
                        </div>
                        <form action="process_updatedetailsc.php" method="POST">
                            <div class="modal-body ">
                                Display the grade/ feedbacks
<!--                                        <input type="hidden" name="customerID" id="customerID" class="form-control" placeholder="Customer ID" readonly>
                                        <div class="form-group">
                                            <label> Centre Code </label>
                                            <input type="text" name="centreCode" id="centreCode" class="form-control" placeholder="Centre Code" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label> Organization Code </label>
                                            <input type="text" name="orgCode" id="orgCode" class="form-control" placeholder="Organisation Code">
                                        </div> 
                                        <div class="form-group">
                                            <label> Service Model </label>
                                            <input type="text" name="serviceModel" id="serviceModel" class="form-control" placeholder="Service Model" >
                                        </div> 
                                        <div class="form-group">
                                            <label> Email </label>
                                            <input type="text" name="emailAddress" id="emailAddress" class="form-control" placeholder="Email" >
                                        </div>  
                                        <div class="form-group">
                                            <label> Address </label>
                                            <input type="text" name="centreAddress" id="centreAddress" class="form-control" placeholder="Address">
                                        </div>-->
                                    </div>
                                 
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark" name="deletebutton">Delete</button>
                                <button type="submit" class="btn btn-dark" name="updatebutton">Update</button>
                            </div>
                             <!--Our div is hidden by default-->
                        </form>
                    </div>
                </div>
            </div>
           
           
            <br>
            <!--Footer-->
            <script>
                //To hide 'customer_id'
//                $("td:nth-of-type(3)").hide();

                function openCity(evt, cityName) {
                  var i, tabcontent, tablinks;
                  tabcontent = document.getElementsByClassName("tabcontent");
                  for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                  }
                  tablinks = document.getElementsByClassName("tablinks");
                  for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                  }
                  document.getElementById(cityName).style.display = "block";
                  evt.currentTarget.className += " active";
                }


                $(document).ready(function () {
                    $('.updatebtn').on('click', function () {
                        $('#updateCatering').modal('show');

                        $tr = $(this).closest('tr');

                        var data = $tr.children("td").map(function () {
                            return $(this).text();
                        }).get();

                        console.log(data);

                        $('#centreCode').val(data[1]);
                        $('#centreName').val(data[3]);
                        $('#orgCode').val(data[6]);
                        
                    });
                });
            </script>
            <?php
            include 'footer.inc.php';
            ?>
            <!--Footer End-->
        </main>
    </body>
</html>