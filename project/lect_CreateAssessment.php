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
        <title>G.F.S | Lecturer | <?php echo $moduleName;?> | Create New Assessment <?php echo $moduleID;?></title>
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
             <h2> <?php echo $moduleName;?> : Create New Assessment</h2>
             
             <br>

            <form action="lect_CreateAssessmentConfirm.php" method="post">
                
                Assessment name: <input type="textbox" name="name"><br>
                Weightage (in numbers): <br>
                (leave empty for parent assessment): <input type="number" name="weightage"><br>
                Deadline: (INSERT DATE-PICKER HERE)<br>
                If Sub-assessment, select parent assessment:<br>
                
                <select id="student" name="parent" style="font-family:sans-serif; font-size: 18px">
                    <option value="0_None">None</option>  
                    <?php
                    //creating DDL for parent assessment selection:
                    
                    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }

                    $sql = "SELECT aID, aParentID, aName, aWeightage, endDate FROM Assessments WHERE mID = '$moduleID' AND aParentID IS NULL AND (aWeightage = 0 OR aWeightage IS NULL)";
                    $result = mysqli_query($conn, $sql);
                    
                    if ($result->num_rows > 0) {
                    // output data of each row
                        while ($row = mysqli_fetch_array($result)) {
                            $combined = $row['aID'].'_'.$row['aName'];
                            echo '<option value="'.$combined.'">'. $row['aID'].' - '.$row['aName'] .'</option>';
                        }
                    }
                    else {
                    echo "0 results";
                    }
                    $conn->close();
                    ?>
                </select>
            <button type="submit" value="Submit">Create Assessment</button>
            </form> 
             
             
        </div>
    <footer>
        <?php
        include 'footer.inc.php';
        ?>
    </footer>
    </body>
</html>