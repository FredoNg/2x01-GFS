<?php
require_once('../protected/config.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$aInfo = $_POST['assessment'];
$sInfo = $_POST['student'];

$moduleName = $_SESSION['currentModuleName'];
$moduleID = $_SESSION['currentModuleID'];
?>
<html lang="en">

    <head>
        <title>G.F.S | Lecturer | <?php echo $moduleName;?> | Enter Grade and Feedback</title>
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
            <h1> <?php echo $moduleName;?> : Enter Grade and Feedback</h1>
            <br>
                <label>Note: this will overwrite any existing grade for the same student and assessment.</label>
                <form action="lect_GiveGradeAssessmentConfirm.php" method="post">
                    <br>
                    <label>Enter Grade (in percentage)</label>
                    <input type="number" name="grade"><br>
                    <label>Enter Feedback (can be empty)</label><br>
                    <textarea name="feedback" rows="3" cols="40"> </textarea>
                    
                    <input type="hidden" id="assessment" name="assessment" value="<?php echo $aInfo?>">
                    <input type="hidden" id="student" name="student" value="<?php echo $sInfo?>">
                    <button type="submit" value="Submit">Proceed</button>
                </form>
            <br>
            <a href="lectPage.php">Exit and return to Main</a>
        </div>
        
    <footer>
        <?php
        include 'footer.inc.php';
        ?>
    </footer>
    </body>
</html>