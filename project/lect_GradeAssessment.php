<?php
require_once('../protected/config.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$moduleName = $_SESSION['currentModuleName'];
$moduleID = $_SESSION['currentModuleID'];
?>
<html lang="en">

    <head>
        <title>G.F.S | Lecturer | <?php echo $moduleName;?> | Assessment Feedback (Formative) <?php echo $moduleID;?></title>
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
            <!-- side nav bar -->
            <?php
            include 'sidenavbar.php';
            ?>
            
        </main>
        <div id="info">
            <h1> <?php echo $moduleName;?> : Grade Assessment | Give Summative Feedback</h1>
             
            <br>
            <h2> Give or edit a grade, and give summative feedback</h2>
            <br>
            <?php
            // acquire all assessments that have weightages, put in ddl
                $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM Assessments WHERE mID = '$moduleID' AND aWeightage > 0";
                $result1 = mysqli_query($conn, $sql);

                //acquire list of enrolled students, put in ddl

                $sql = "SELECT u.uID, u.uName FROM Users u, EnrolledStudents e WHERE u.uID = e.studentID AND e.moduleID = '$moduleID'";
                $result2 = mysqli_query($conn, $sql);

                $conn->close();
            ?>

            <form action="lect_GiveGradeAssessmentConfirm.php" method="post">
                <p> Select assessment: </p>
            <select id="assessment" name="assessment" style="font-family:sans-serif; font-size: 18px">
                <?php
                echo '<option>Select</option>';
                while ($row = mysqli_fetch_array($result1)) {
                    //populate with assessment entries
                    $combined = $row['aID'].'_'.$row['aName'];
                    echo '<option value="'.$combined.'">'. $row['aID'].' - '.$row['aName'] .'</option>';
                }
                echo '</select>';
                
                ?>
            </select>
            <br>
            
                <p> Select student: </p>
            <select id="student" name="student" style="font-family:sans-serif; font-size: 18px">
                <?php
                echo '<option>Select</option>';
                while ($row = mysqli_fetch_array($result2)) {
                    //populate with enrolled student entries
                    $combined = $row['uID'].'_'.$row['uName'];
                    //can't place whitespace char in option value apparently.
                    echo '<option value="'.$combined.'">'. $row['uID'].' - '.$row['uName'] .'</option>';
                }
                echo '</select>';
                //shows DDL of all enrolled students
                ?>
            </select>
                
            <br>
            <label>Enter Grade (in percentage)</label>
            <input type="number" name="grade"><br>
            <label>Enter Feedback (can be empty)</label><br>
            <textarea name="feedback" rows="3" cols="40"> </textarea>
            
            <br>
            <button type="submit" value="Submit">Proceed</button>
            </form> 
             
             
        </div>
    <footer>
        <?php
        include 'footer.inc.php';
        ?>
    </footer>
    </body>
</html>