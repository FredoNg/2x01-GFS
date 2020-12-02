<?php
require_once('../protected/config.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$name = $_POST["name"];
$weightage = $_POST["weightage"];
//$date = $_POST["date"];

$parentInfo = explode("_", $_POST['parent']);
$parentID = $parentInfo[0];
$parentName = $parentInfo[1];

$moduleName = $_SESSION['currentModuleName'];
$moduleID = $_SESSION['currentModuleID'];
?>
<html lang="en">

    <head>
        <title>G.F.S | Lecturer | <?php echo $moduleName;?> | Confirm New Assessment </title>
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
            <h1> <?php echo $moduleName;?> : Confirm New Assessment</h1>
            
                     <br>

            <?php
            //create assessment.
            $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT SUM(aWeightage) FROM Assessments WHERE mID = '$moduleID'";
            //check if weightages are cool. if not, return to previous.
            $result =  mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            $sumWeightage = $row["SUM(aWeightage)"] + $weightage;
            $remainder = ($sumWeightage - 100);
            
            if ( $remainder < 0)
            {
                //difference more than 0, thus good. allow insertion.
                if ($parentID == "0")   //no parent assessment
                $sql = "INSERT INTO ASSESSMENTS (mID, aName, aWeightage, endDate) VALUES ('$moduleID', '$name', '$weightage', NULL)";
            
                else                    //with parent assessment
                    $sql = "INSERT INTO ASSESSMENTS (mID, aParentID, aName, aWeightage, endDate) VALUES ('$moduleID', '$parentID', '$name', '$weightage', NULL)";

                // with a parent
                if ($conn->query($sql) === TRUE) {
                    echo "Assessment ".$name." created";
                } else {
                    echo "Error: " . $sql . " Unable to create Assessment '$name'"."<br>" . $conn->error;
                    }
            }
            
            else
            {
                //total weightage will exceed 100 if this assessment is added. reject.
                echo "Error! Unable to create Assessment '$name'"."!<br>";
                echo "Total weightage exceeds 100 by $remainder"."!<br>";
            }
            
            
                    
            $conn->close();
            
            ?>
            <br>
            <a href="lect_CreateAssessment.php">Return to Create Assessment</a><br>
            <a href="lectPage.php">Return to Main</a>

        </div>
        
    <footer>
        <?php
        include 'footer.inc.php';
        ?>
    </footer>
    </body>
</html>