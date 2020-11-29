<?php
require_once('../protected/config.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$moduleName = $_POST["moduleName"];
?>
<html lang="en">

    <head>
        <title>G.F.S | Lecturer | <?php echo $moduleName;?></title>
        <link rel="stylesheet" href="sideNav.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/filter.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
        
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
            <br>

        </main>
        
        <div id="info">
            <h1> <?php echo $moduleName;?> : MODULE INFORMATION</h1>
            
                  <?php
            
            $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            
            //dirty way to get module ID. because I don't know how to get both ID and name from prev page.
            
            $sql = "SELECT mID FROM Modules WHERE mName = '$moduleName'";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            $moduleID = $row["mID"];
            $_SESSION['currentModuleID'] = $moduleID;
            $_SESSION['currentModuleName'] = $moduleName;
            //we have module id. now we pull info based on that.

            //pulling Assessments
            
            $sql = "SELECT aID, aParentID, aName, aWeightage, endDate FROM Assessments WHERE mID = '$moduleID'";
            $result = mysqli_query($conn, $sql);
 

            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "aID: " . $row["aID"]. " - Name: " . $row["aName"]. " - Weightage: " . $row["aWeightage"]. 
                        " - End Date: " . $row["endDate"]. "<br>";
                    }
                }
            else {
            echo "0 results";
            }
            
            
            
            $conn->close();
            //pull query results to 'result'
            ?>
            <form action="lect_GiveFeedbackAll.php" method="post">
            <button type="submit" value="Submit">Give mass feedback</button>
            </form> 

            <br>

            <form action="lect_GiveFeedbackSingleModule.php" method="post">
            <button type="submit" value="Submit">Give individual feedback (Summative)</button>
            </form> 
        </div>
         <footer>
        <?php
        include 'footer.inc.php';
        ?>
    </footer>
    </body>
</html>