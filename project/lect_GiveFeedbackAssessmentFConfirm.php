<?php
require_once('../protected/config.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$feedbackText = $_POST["feedback"];
$feedbackTextDDL = $_POST["feedbackDDL"];
$aInfo = explode("_", $_POST['assessment']);
$aID = $aInfo[0];
$aName = $aInfo[1];
$sInfo = explode("_", $_POST['student']);
$sID = $sInfo[0];
$sName = $sInfo[1];

$moduleName = $_SESSION['currentModuleName'];
$moduleID = $_SESSION['currentModuleID'];
?>
<html lang="en">

    <head>
        <title>G.F.S | Lecturer | <?php echo $moduleName;?> | Confirm Assessment Feedback (Formative)</title>
        <link rel="stylesheet" href="sideNav.css">
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
            <!-- side nav bar -->
            <?php
            include 'sidenavbar.php';
            ?>
   

        </main>
        <div id ="info">
            <h1> <?php echo $moduleName;?> : Confirm Assessment Feedback (Formative)</h1>
            
                     <br>

            <?php
            //insert feedback for student under a module. summative.
            $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            if ($_POST["feedbackDDL"] == "none")  //use textbox input
            {
                $sql = "INSERT INTO Feedback(fText, givenDate, moduleID, studentID, assessmentID)"
                    . " VALUES ('$feedbackText', NOW(), '$moduleID', '$sID', '$aID')";
            }
            else                                //use DDL inpunt
            {
                $sql = "INSERT INTO Feedback(fText, givenDate, moduleID, studentID, assessmentID)"
                    . " VALUES ('$feedbackTextDDL', NOW(), '$moduleID', '$sID', '$aID')";
            }

            if ($conn->query($sql) === TRUE) {
                echo "Feedback given for student '$sName' under assessment '$aName'";
            } else {
                echo "Error: " . $sql . " Feedback unsuccessful for student '$sName' under assessment '$aName' "."<br>" . $conn->error;
                }
                    
            $conn->close();
            
            ?>
            <br>
            <a href="lectPage.php">Return to Main</a>
        </div>
        
    <footer>
        <?php
        include 'footer.inc.php';
        ?>
    </footer>
    </body>
</html>