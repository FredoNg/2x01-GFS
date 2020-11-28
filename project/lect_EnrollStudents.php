<?php
require_once('../protected/config.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html lang="en">

    <head>
        <title>G.F.S | Lecturer | Enroll Students</title>
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
             <h1> ENROLL STUDENTS INTO MODULE </h1>
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
            <?php
            $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            //we just assume module is ICT1111. mID is 1
            //normally we have Lect select a module here
            $moduleID = 1;
            
            $sql = "SELECT * FROM Users WHERE user_type = 'Student' AND uID NOT IN (SELECT studentID FROM EnrolledStudents WHERE moduleID = '$moduleID')";
            $result = mysqli_query($conn, $sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            //acquired all students not in that module
            //i.e students that can be added
            //place content into a table
            
            //Select a student entry to 'Enroll' that student into module
            //say, we selected the very first entry
            
                $selectedStudent = $row['uID'];
                $name = $row['uName'];
            
                $sql = "INSERT INTO EnrolledStudents VALUES ('$moduleID', '$selectedStudent')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "Student '$name' successfully enrolled into module.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            
            else    //no entries. meaning no available students
            {
                echo "<hr>";
                echo "<h1> There are no students available to enroll.</h1>";
                echo "<br>";
                echo("<button class='btn-default btn-lg' onclick=\"location.href='lectPage.php'\">Back to homepage</button>");
                echo "<hr>";
            }
            //add user
            
            
            $conn->close();
            
            
            

            
            
            
            
            ?>
            
        </main>
    </body>
</html>