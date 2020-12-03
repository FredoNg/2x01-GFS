<?php
require_once('../protected/config.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$feedbackText = $_POST["feedback"];
$grade = $_POST['grade'];

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
        <title>G.F.S | Lecturer | <?php echo $moduleName;?> | Confirm Grade and Feedback (Formative)</title>
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
            <h1> <?php echo $moduleName;?> : Confirm Grade and Feedback (Summative)</h1>
            
                     <br>

            <?php
            
            if ($grade < 0 || $grade > 100)  //bad input for grade
                echo "ERROR: Given grade is less than 0 or more than 100.<br>Please try again.";
            
            else    //grade is good. continue rest of program.
            {   
                $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                //check if this grade already exists.
                
                $sql = "SELECT * FROM Grades WHERE aID = '$aID' AND studentID = '$sID'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $gradeID = $row['gID'];
                
                if ($result->num_rows > 0) {
                //there's a duplicate. just UPDATE the record.
                    $sql = "UPDATE Grades SET grade = '$grade' WHERE gID = '$gradeID'";
                    
                    if ($conn->query($sql) === TRUE) {
                        
                        $sql = "UPDATE Feedback SET fText = '$feedbackText' WHERE gradeID = '$gradeID'";
                        if ($conn->query($sql) === TRUE) {
                            echo "Assessment '$aName' grade updated for student '$sName' .<br>";
                            echo "Feedback updated  for student '$sName' under assessment '$aName'";
                        } else {
                            echo "Error: " . $sql . " Feedback unsuccessful for student '$sName' under assessment '$aName' "."<br>" . $conn->error;
                            }
                    }
                    else 
                    {
                        echo "Error: " . $sql . " Feedback unsuccessful for student '$sName' under assessment '$aName' "."<br>" . $conn->error;
                    }
                    
                }
                
                else
                {
                    //no existing grade. make new grade.
                    //insert grade for student's assessment
                    $sql = "INSERT INTO Grades (grade, givenDate, aID, studentID) VALUES ($grade, NOW(), '$aID', '$sID')";

                    if ($conn->query($sql) === TRUE) {
                        //get gradeID from above insert

                        $sql = "SELECT * FROM Grades WHERE aID = '$aID' AND studentID = '$sID'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        $gradeID = $row['gID'];

                        //acquired gradeID, now make insert feedback
                        //insert feedback for student under a module. summative
                        $sql = "INSERT INTO Feedback(fText, givenDate, moduleID, studentID, assessmentID, gradeID)"
                                . " VALUES ('$feedbackText', NOW(), '$moduleID', '$sID', '$aID', '$gradeID')";

                        if ($conn->query($sql) === TRUE) {
                            echo "Assessment '$aName' graded for student '$sName' .<br>";
                            echo "Feedback given for student '$sName' under assessment '$aName'";
                        } else {
                            echo "Error: " . $sql . " Feedback unsuccessful for student '$sName' under assessment '$aName' "."<br>" . $conn->error;
                            }

                    }
                    else
                        echo "Error: " . $sql . " Grading unsuccessful for student '$sName' under assessment '$aName' "."<br>" . $conn->error;
                }
                
                $conn->close();
            }

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