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
        <title>G.F.S | Lecturer | Modules</title>
        <link rel="stylesheet" href="sideNav.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/filter.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/shopfilter.css" />

    </head>

    <!-- Navigation  -->
    <?php
    include 'nav.inc.php';
    ?>
    <!--Navigation End  -->
    <body>
        <main>
            <div class="container-fluid" id="messageTag">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4" style="text-align:center">
                        <h1> MODULES </h1>
                    </div>
                    <br>
                    <div class="col-md-6 col-md-offset-4" style="text-align:center">
                        <?php
                        $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT mName FROM Modules";
                        $result = mysqli_query($conn, $sql);

                        $conn->close();
                        //pull query results to 'result'
                        ?>

                        <form style="border:1px; " action="lect_ModuleInfo.php" method="post" >


                            <select id="moduleName" name="moduleName">
                                <?php
                                echo '<option>Select</option>';
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option>' . $row['mName'] . '</option>';
                                }
                                echo '</select>';
                                //shows DDL of modules
                                ?>
                            </select>
                            <button type="submit" class="btn btn-default">Check Module Info</button>

                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <!-- side nav bar -->
    <?php
    include 'sidenavbar.php';
    ?>
    <footer>
        <?php
        include 'footer.inc.php';
        ?>
    </footer>
</html>
