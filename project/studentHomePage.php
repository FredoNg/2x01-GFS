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
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
        input[type="text"], select.form-control {
            background: transparent;
            border: none;
            border-bottom: 1px solid #000000;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-radius: 0;
            margin-left: 10px;
        }
        input:valid {
            color: black;
        }
       
    </style>
    <body> 
            <!--<body style="overflow-y: hidden;">--> 

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
                        $sql = "SELECT * FROM users U INNER JOIN enrolledstudents ES on ES.studentID = U.uID INNER JOIN modules M ON M.mID = ES.moduleID WHERE U.uID = 2";

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
                        <div style="margin-top:30px;">
                            <a href="shop.php" class="btn btn-danger btn-lg btn-block test"  role="button">Shop</a>
                        </div>

                    </div>

                </div>
                <div class="col-xs-6  col-md-5 margin-top-bot" >
                     <?php
                        $sql = "SELECT * FROM sql1902664clj.users where uID = 2;";
                        $result = $conn->query($sql);
                        if ( $result->num_rows > 0 ) {
                            foreach ($result as $row){
                                echo ('<h3> '.$row['uName'].' </h3>');
                            }
                        }
                    ?>
                                     
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
                                            $sql2 = "SELECT G.gID, G.grade, SES.aID, G.studentID, SES.mID, SES.aParentID, SES.aName, SES.aWeightage, SES.endDate  
                                                        FROM sql1902664clj.grades G
                                                        LEFT JOIN sql1902664clj.assessments SES
                                                        ON SES.aID = G.aID
                                                        WHERE SES.mID = ".$row['moduleID']." AND G.studentID = 2 AND SES.aName != 'Quizzes'";
                                            
                                            $result2 = $conn->query($sql2);
                                            if ( $result2->num_rows > 0 ) {
                                                foreach ($result2 as $row2) {
                                                    if (strpos($row2['aName'], "Quiz") !== false){
                                                        echo ("<td>
                                                                    <button type='button' class='updatebtn' data-toggle='modal' data-target='#takeaction' class='btn btn-default' 
                                                                    data-userid='".$row2['aID']."' data-grade='".$row2['grade']."' data-aname='".$row2['aName']. "'>
                                                                        <img class='updateoverlayhide' src='images/Progress Bar/smallgreencircle.gif'/>
                                                                        <img class='updateoverlay' src='images/Progress Bar/smallgreencircleTurn.gif'/>
                                                                    </button>
                                                               </td>");
                                                    }
                                            }
                                        }
//                                        <button type='button' class='updatebtn' userid=".$row2['aID']." title='Update Details'>
//                                            <img class='updateoverlayhide' src='images/Progress Bar/smallgreencircle.gif'/>
//                                            <img class='updateoverlay' src='images/Progress Bar/smallgreencircleTurn.gif'/>
//                                        </button>
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
                    <div id="London" class="tabcontent container">
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
                    
                    <div id="Tokyo" class="tabcontent container">
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
                        <!--                        <div class="col-xs-6  col-xs-offset-3 col-sm-4 col-sm-offset-4  col-md-2 col-md-offset-0" id='womenformal'>
                            <a href="aboutus.php" class="btn btn-danger btn-lg btn-block test" role="button">Our Story</a>
                        </div>
                        <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4  col-md-2 col-md-offset-0" id='unisex'>
                            <a href="contact-us.php" class="btn btn-danger btn-lg btn-block test" role="button">Find Us</a>
                        </div> 

                        <div class="btn-toolbar" role="toolbar">
                        </div>-->
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

            
            <div class="modal fade" id="takeaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <bold><h4 class="modal-title" name="aName" id="myModalLabel" value=""></h4><bold>  
                        </div>
                        <form action="process_createCentre.php" method="POST">
                            <div class="modal-body ">
                                <div class="row">
                                    <div>
                                        <h4><bold> Grade </bold></h4>
                                        <label id="grade"><bold> Grade </bold></label>
                                        </br></br>

                                        <h4><bold> Feedback </bold></h4>
                                        <p id="Feedback"><bold>Your team did a very good job in your M4. However there some small part your have to change, but overall this team did very good.</bold></p>
                                            
                                    </div>
                                </div>
                            </div>
                        </form>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span>Confirm</span></button>
                        </div>
                    </div>
                </div>
            </div>
           
            <br>
            <!--Footer-->

            <script>
                //To hide 'customer_id'
//                $("td:nth-of-type(3)").hide();
                //When the page has loaded.
                $(document).ready(function(){
                    $('#message').fadeIn('slow', function(){
                       $('#message').delay(5000).fadeOut(); 
                    });
                });

                $('#takeaction').on('show.bs.modal', function(e) {
                    var userid = $(e.relatedTarget).data('userid');
                    $(e.currentTarget).find('input[name="Feeback"]').val(userid);
//                    document.getElementById("Feedback").innerHTML = "userid";

                    
                    var grade = $(e.relatedTarget).data('grade');
                    $(e.currentTarget).find('input[name="grade"]').val(grade);
                    document.getElementById("grade").innerHTML = grade;

                    var aName = $(e.relatedTarget).data('aname');
                    $(e.currentTarget).find('input[name="aName"]').val(aName);
                    document.getElementById("myModalLabel").innerHTML = aName;

                });

                
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
                };
            </script>
            <?php
            include 'footer.inc.php';
            ?>
            <!--Footer End-->
        </main>
    </body>
</html>