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
                <h1>Welcome, <?php echo $_SESSION['name']; ?>.</h1>
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