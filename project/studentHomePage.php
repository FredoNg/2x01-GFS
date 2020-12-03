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
    <!--<body>--> 
            <body style="overflow-y: hidden;"> 

        <main>
            <img id="message"  style="display:none; height: 100%; width:100%; position: relative;" src="images/Student/OpenPage.gif" alt=""/>
            <!-- Navigation  -->
            <?php
            include 'nav.inc.php';
            ?>
            <!--Navigation End  -->

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
                                <button class="tablinks" style="width: 100%; margin-bottom: 15px;" onclick="openCity(event, <?php echo $row['mID'] ?>)">
                                    <?php echo $row['mName'];
                                        $session["formativeID"] = $row['mID'];
                                            ?>
                                    
                                </button>
                            <?php
                            }
                        }
                        ?>
                        <button class="tablinks" style="width: 100%; margin-bottom: 15px;" onclick="openCity(event, 'London')">ICT 2902</button>
                        <div style="margin-top:30px;">
                            <!--<a href="shop.php" class="btn btn-danger btn-lg btn-block test"  role="button">View Badges</a>-->
                            <button class="btn btn-danger btn-lg btn-block test"  data-toggle='modal' data-target='#mgtbadges' class='btn btn-default'>
                                View Badges
                            </button>
                        </div>
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
                                    <img class="middle" id="gif5" src="images/Student/anonymous-mask.gif" alt=""/> 
                                    <img class="middle" id="gif1" src="images/Student/ProjoctManagement.gif" alt=""/>
                                    <img class="middle" id="gif2" src="images/Student/2901-Male.gif" alt=""/>
                                    <img class="middle" id="gif3" src="images/Student/ethernet.gif" alt=""/>
                                    <img class="middle" id="gif4"src="images/Student/embedded.gif" alt=""/>
                                    <!--<img class="middle" src="images/Student/1.gif" alt=""/>-->
                                    <!--<img class="text" src="images/Student/anonymous-mask.gif" alt=""/>-->
                                    <img id="reward1" class="middle updateoverlayhide" src="images/Student/reward1.png" style="margin-left: 300px; padding-bottom: 200px;" alt=""/>

                                    <img id="reward2" class="middle updateoverlayhide" src="images/Student/reward2.png" style="margin-left: 300px;" alt=""/>

                                    <img id="reward3" class="middle updateoverlayhide" src="images/Student/reward3.png" style="margin-left: 300px; padding-top: 200px;" alt=""/>


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
                                    <button type='button' data-toggle='modal' data-target='#vformative' class='btn btn-default' 
                                    data-mid='<?php echo $row['moduleID']?>'>
                                        View All Formative Feedback
                                    </button>
                                    <table class="center">
                                        <tr>
                                            <th>Start</th>
                                        <?php 
                                            $greycircle = [];
                                            $sql2 = "SELECT * FROM sql1902664clj.assessments where mID = '".$row['moduleID']."' and aName != 'Quizzes'";
                                            $result2 = $conn->query($sql2);
                                            if ( $result2->num_rows > 0 ) {
                                                foreach ($result2 as $row2) {
                                                    array_push($greycircle, $row2['aName']);
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
                                            $sql2 = "SELECT G.gID, G.grade, SES.aID, G.studentID, SES.mID, SES.aParentID, SES.aName, SES.aWeightage, SES.endDate, FB.ftext  
                                                        FROM sql1902664clj.grades G
                                                        LEFT JOIN sql1902664clj.assessments SES
                                                        ON SES.aID = G.aID
                                                        LEFT JOIN sql1902664clj.feedback FB
                                                        ON FB.gradeID = G.gID
                                                        WHERE SES.mID = ".$row['moduleID']." AND G.studentID = 2 AND SES.aName != 'Quizzes'";
                                            
                                            $result2 = $conn->query($sql2);
                                            $count = 0;
                                            if ( $result2->num_rows > 0 ) {
                                                foreach ($result2 as $row2) {
                                                    if (strpos($row2['aName'], "Quiz") !== false){
                                                        echo ("<td>
                                                                    <button type='button' class='updatebtn' data-toggle='modal' data-target='#takeaction' class='btn btn-default' 
                                                                    data-userid='".$row2['aID']."' data-grade='".$row2['grade']."' data-aname='".$row2['aName']. "
                                                                        ' data-feedback='".$row2['ftext']. "'>
                                                                        <img class='updateoverlayhide' src='images/Progress Bar/smallgreencircle.gif'/>
                                                                        <img class='updateoverlay' src='images/Progress Bar/smallgreencircleTurn.gif'/>
                                                                    </button>
                                                               </td>");
                                                    }
                                                    if (strpos($row2['aName'], "Assignment") !== false){
                                                        echo ("<td>
                                                                    <button type='button' class='updatebtn' data-toggle='modal' data-target='#takeaction' class='btn btn-default' 
                                                                    data-userid='".$row2['aID']."' data-grade='".$row2['grade']."' data-aname='".$row2['aName']. "
                                                                        ' data-feedback='".$row2['ftext']. "'>
                                                                        <img class='updateoverlayhide' src='images/Progress Bar/biggreencicle.gif'/>
                                                                        <img class='updateoverlay' src='images/Progress Bar/biggreencicleTurn.gif'/>
                                                                    </button>
                                                               </td>");
                                                    }
                                                    if (strpos($row2['aName'], "Exam") !== false){
                                                        echo ("<td>
                                                                    <button type='button' class='updatebtn' data-toggle='modal' data-target='#takeaction' class='btn btn-default' 
                                                                    data-userid='".$row2['aID']."' data-grade='".$row2['grade']."' data-aname='".$row2['aName']. "
                                                                        ' data-feedback='".$row2['ftext']. "'>
                                                                        <img class='updateoverlayhide' src='images/Progress Bar/biggreencicle.gif'/>
                                                                        <img class='updateoverlay' src='images/Progress Bar/biggreencicleTurn.gif'/>
                                                                    </button>
                                                               </td>");
                                                    }
                                                    $count++;
                                                }
                                                for ($count; $count < count($greycircle); $count++){
                                                    if (strpos($greycircle[$count], "Quiz")!== false){
                                                        echo ("<td>
                                                                    <button type='button' class='updatebtn' class='btn btn-default' disabled>
                                                                        <img src='images/Progress Bar/smallgreycircle.gif'/>
                                                                    </button>
                                                               </td>");
                                                    }
                                                    if (strpos($greycircle[$count], "Assignment")!== false){
                                                        echo ("<td>
                                                                   <button type='button' class='updatebtn' class='btn btn-default' disabled>
                                                                        <img src='images/Progress Bar/biggreycircle.gif'/>
                                                                    </button>
                                                               </td>");
                                                    }
                                                    if (strpos($greycircle[$count], "Exam")!== false){
                                                        echo ("<td>
                                                                   <button type='button' class='updatebtn' class='btn btn-default' disabled>
                                                                        <img src='images/Progress Bar/biggreycircle.gif'/>
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
                                <th>Assignment 1</th>
                                <th>Quiz 4</th>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="updatebtn" title="Update Details">
                                        <img class="" src="images/Progress Bar/biggreencicle.gif" alt=""/>
                                    </button>
                                </td>
                                <td>
                                    
                                        <button type='button' class='updatebtn' data-toggle='modal' data-target='#takeaction' class='btn btn-default' 
                                        data-userid="98" data-grade='90' data-aname='Quiz 1
                                            ' data-feedback='NA'>
                                            <img class='updateoverlayhide' src='images/Progress Bar/smallgreencircle.gif'/>
                                            <img class='updateoverlay' src='images/Progress Bar/smallgreencircleTurn.gif'/>
                                        </button>
                                   
                                </td>
                                <td>
                                    <button type='button' class='updatebtn' data-toggle='modal' data-target='#takeaction' class='btn btn-default' 
                                        data-userid="97" data-grade='60' data-aname='Quiz 2
                                        ' data-feedback='NA'>
                                        <img class='updateoverlayhide' src='images/Progress Bar/smallgreencircle.gif'/>
                                        <img class='updateoverlay' src='images/Progress Bar/smallgreencircleTurn.gif'/>
                                    </button>
                                </td>  
                                <td>
                                    <button type='button' class='updatebtn' data-toggle='modal' data-target='#takeaction' class='btn btn-default' 
                                        data-userid="96" data-grade='30' data-aname='Quiz 3
                                        ' data-feedback='NA'>
                                        <img class='updateoverlayhide' src='images/Progress Bar/smallgreencircle.gif'/>
                                        <img class='updateoverlay' src='images/Progress Bar/smallgreencircleTurn.gif'/>
                                    </button>
                                </td>  
                                <td>
                                    <button type='button' class='updatebtn' class='btn btn-default' disabled>
                                        <img src='images/Progress Bar/biggreycircle.gif'/>
                                    </button>
                                </td>
                                <td>
                                    <button type='button' class='updatebtn' class='btn btn-default' disabled>
                                        <img src='images/Progress Bar/smallgreycircle.gif'/>
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
                    <img id="bad" class="center" style="margin-top: 100px;" src="images/grade/tryharder.gif" alt=""/>
                    <img id="okok" class="center" style="margin-top: 100px;" src="images/grade/dobetter.gif" alt=""/>
                    <img id="good" class="center" style="margin-top: 100px;" src="images/grade/goodjob.gif" alt=""/>
                    <div class="modal-content" id="box">
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
                                        
                                        <h4><bold>Summative Feedback </bold></h4>
                                        <p id="Feedback"><bold>Your team did a very good job in your M4. However there some small part your have to change, but overall this team did very good.</bold></p>
                                        
                                        <h4><bold>Formative Feedback</bold></h4>
                                        <p id="Feedback"><bold>Your team did a very good job in your M4. However there some small part your have to change, but overall this team did very good.</bold></p>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span>Close</span></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="mgtbadges" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" id="box">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <bold><h4 class="modal-title" name="" id="myModalLabel" value="My Badges">My Badges</h4><bold>  
                        </div>
                        <table style="width: 100%; margin-left:5%;">
                            <tr>
                                <td>
                                    <img class="updateoverlayhide" src="images/Student/reward1.png" alt="reward2">
                                    <button id='btn1' onclick="btnreward1()">Display</button>
                                </td>
                                <td>
                                    <img class="updateoverlayhide" src="images/Student/reward2.png" alt="reward2">
                                    <button id='btn2' onclick="btnreward2()">Display</button>
                                </td>
                                <td>
                                    <img class="updateoverlayhide" src="images/Student/reward3.png" alt="reward2">
                                    <button id='btn3' onclick="btnreward3()">Display</button>
                                </td>
                            </tr>
                        </table>
                                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span>Close</span></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="vformative" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" id="box">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <bold><h4 class="modal-title" name="" id="myModalLabel" value="My">Formative Feedback</h4><bold>  
                        </div>
                        <!--<label id='vmid'></label>-->
                        <?php
                            $sql2 = "SELECT * FROM sql1902664clj.feedback where gradeID is null and moduleid =".$session['formativeID']."";

                                $result2 = $conn->query($sql2);
                                $count = 0;
                                $SN =1;
                                if ( $result2->num_rows > 0 ) {
                                    ?>
                                    <table class="center">
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                                <?php
                                    foreach ($result2 as $row2) {
                                        echo "<tr>
                                                <td>
                                                    ".$SN.".  
                                                </td>
                                                <td>
                                                    ".$row2["fText"]."
                                                </td>
                                            </tr>";   
                                        $SN++;
                                    }
                                    ?>
                                    </table>
                                    <?php
                                }                                              
                        ?>
                        
                                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span>Close</span></button>
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
                    $('#gif1').delay(5000).fadein('slow', function(){
                        $('#gif2').delay(5000).fadein();
                        $('#gif3').delay(5000).fadein();
                        $('#gif4').delay(5000).fadein();
                        $('#gif1').delay(5000).fadein();
                        $('#gif5').delay(5000).fadein();
                    });
                   
                   
                });
                
                $('#mgtbadges').on('show.bs.modal', function(e) {
                    
                });
                
                $('#vformative').on('show.bs.modal', function(e) {
//                    var mID = $(e.relatedTarget).data('mid');
//                    document.getElementById("vmid").innerHTML = mID;
                });
                
                function btnreward1() {
                    var x = document.getElementById("reward1");
                    if (x.style.display == "none"){
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                }
                function btnreward2() {
                    var x = document.getElementById("reward2");
                    if (x.style.display == "none"){
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                }
                function btnreward3() {
                    var x = document.getElementById("reward3");
                    if (x.style.display == "none"){
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                }
                
                $('#takeaction').on('show.bs.modal', function(e) {
                   
                    var x = document.getElementById("box");
                    var good = document.getElementById("good");
                    var bad = document.getElementById("bad");
                    var okok = document.getElementById("okok");
                    okok.style.display = "none";
                    good.style.display = "none";
                    bad.style.display = "none";
                    x.style.display = "none";
                    
                    var grade = $(e.relatedTarget).data('grade');
                    $(e.currentTarget).find('input[name="grade"]').val(grade);
                    document.getElementById("grade").innerHTML = grade;
                    
                    if (grade >= 80){
                        $('#good').fadeIn('slow', function(){
                            $('#good').delay(5000).fadeOut(); 
                         });
                    }else if (grade < 80 && grade > 50){
                        $('#okok').fadeIn('slow', function(){
                            $('#okok').delay(5000).fadeOut(); 
                         });
                    }else {
                        $('#bad').fadeIn('slow', function(){
                            $('#bad').delay(5000).fadeOut(); 
                         });
                    }
                  
                    setTimeout(function() {
                        x.style.display = "block";
                    }, 5500);
                                        
                    var feedback = $(e.relatedTarget).data('feedback');
                    document.getElementById("Feedback").innerHTML = feedback;
                    
                    

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
//            include 'footer.inc.php';
            ?>
            <!--Footer End-->
        </main>
    </body>
</html>