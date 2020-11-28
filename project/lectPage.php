<?php
session_start();
?>
<html lang="en">
    <head>
        <title>G.F.S | Lecturer | Home</title>
        <link rel="stylesheet" href="sideNav.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="js/filter.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/main.css"/>
<!--        <style>
            div.content {
  margin-left: 600px;
  padding: 1px 16px;
/*  height: 100px;*/
}
        </style>-->
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
                    <div class="col-md-6 col-md-offset-5">
                        <h1> Welcome, <?php echo $_SESSION['name']; ?>.</h1>
                        <hr/>
                    </div>

                        <?php
                        include 'sidenavbar.php';
                        ?>
                </div>
            </div>       
        </main>
    </body>

<footer>
    <?php
    include 'footer.inc.php';
    ?>
</footer>
</html>