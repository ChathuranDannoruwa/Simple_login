<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Your Home Page</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="header">
            <b id="welcome">Welcome : <i><?php echo $user_check; ?></i></b>
            <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>
        <div class="body">

        </div>
        <div class="footer">

        </div>
    </body>
</html>