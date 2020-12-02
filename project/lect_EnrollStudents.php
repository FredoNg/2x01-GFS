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
        <title>G.F.S | Lecturer | Enroll Students</title>
        <link rel="stylesheet" href="sideNav.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/filter.js"></script> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/lectpages.css"/>

    </head>
    <!-- Navigation  -->
    <?php
    include 'nav.inc.php';
    ?>
    <!--Navigation End  -->

    <body>
        <main>
            <!-- SIDE Navigation  -->
            <?php
            include 'sidenavbar.php';
            ?>
            <!-- SIDE Navigation END -->

            <div class="main">
                <h1> Enroll students into <?php echo $moduleName;?> </h1>

                <div>
                    <?php
                        //acquire list of students, put in ddl
                        $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM Users WHERE user_type = 'Student' AND uID NOT IN (SELECT studentID FROM EnrolledStudents WHERE moduleID = '$moduleID')";
                        $result = mysqli_query($conn, $sql);   //result for unenrolled students

                        $conn->close();

                        ?>
                    
                    <form action="lect_EnrollStudentsConfirm.php" method="post">
                        <p> select student: </p>
                        <select id="student" name="student" style="font-family:sans-serif; font-size: 18px">
                            <?php
                            echo '<option>Select</option>';
                            while ($row = mysqli_fetch_array($result)) {
                                $combined = $row['uID'].'_'.$row['uName'];
                                //can't place whitespace char in option value apparently.
                                echo '<option value="'.$combined.'">'. $row['uID'].' - '.$row['uName'] .'</option>';
                            }
                            echo '</select>';
                            //shows DDL of all students not enrolled
                            ?>
                        </select>
                        <br>
                        <button type="submit" value="Submit">Enroll Student</button>
                    </form> 
                    
                </div>
            </div>

        </main>
    </body>

    <!-- SIDE Navigation DROPDOWN script -->
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script> 

    <footer>
        <?php
        include 'footer.inc.php';
        ?>
    </footer>
</html>