<!DOCTYPE html>
<?php
require_once('../protected/config.php');

    define('DB_SERVER', 'rm-gs595dd89hu8175hl6o.mysql.singapore.rds.aliyuncs.com');
    define('DB_USERNAME', 'ict1902664clj');
    define('DB_PASSWORD', 'JLC4662091');
    define('DB_DATABASE', 'sql1902664clj');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>
<html lang="en">
    <head>
        <title>G.F.S | (Login)</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creole | Bringing People Together Through Fashion">
        <meta name="keywords" content="Fasion, Clothes, Dress, Tops, Bottoms">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/bootstrap.min.js">
        </script>
        <link rel="stylesheet" href="css/main.css"/>

    </head>

    <body>
        <main>
            <div class="container-fluid">
                <h1>G.F.S Login</h1>
                <hr class="us">
                <p>Please log in using your given email and password.</p>
                
                <hr class="us">
                <div class="col-xs-6  col-md-3 margin-top-bot" >
                    <h3>Student/Lecturer Login</h3>
                        <form style="border:1px; ">
                            Enter Email:
                            <input type="text" style="margin-left: 0px; border:1px solid #ccc; " pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" class="form-control" name="email" id="email" placeholder="Enter Email" required aria-label="email login"><br>
                            Enter Password:
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required aria-label="Enter password"><br>
                            <button type="submit" class="btn btn-default">Log In</button>
                        </form>
 
                </div>

            </div>
        </main>
    </body>

</html>
