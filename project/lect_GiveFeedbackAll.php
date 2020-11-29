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
        <title>G.F.S | Lecturer | <?php echo $moduleName;?> | Give Mass Feedback | <?php echo $moduleID;?></title>
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
        <div id =info>
            <h1> <?php echo $moduleName;?> : Give Mass Feedback</h1>
            
             <br>

            <form action="lect_GiveFeedbackAllConfirm.php" method="post">
            <textarea name="feedback" rows="3" cols="40"> </textarea>
            <button type="submit" value="Submit">Give Feedback</button>
            </form> 
        </div>
    <footer>
        <?php
        include 'footer.inc.php';
        ?>
    </footer>
    </body>
</html>