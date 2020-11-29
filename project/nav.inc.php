<?php
$count = 0;
if (isset($_SESSION['shopping_cart'])) {
    $count = count($_SESSION['shopping_cart']);
}
?>
<header>
    <nav class = "navbar navbar-inverse navbar-static-top" >
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                  
                </button>
                <a href="login.php" class="navbar-left"><img src="images/design/gfslogo.png" id="nav-logo" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (!isset($_SESSION['user_id'])) {
                        ?>
                        <li><a href="login.php" title="Login to an existing account"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php } else { ?>
                        <li><a href="logout.php" title="Logout of your account"><span class="glyphicon glyphicon-log-in"></span>
                                Logout</a></li>
                        <li><a href="profile.php" title="Visit your profile page"><span class="glyphicon glyphicon-user"></span>
                                Profile</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

</header>