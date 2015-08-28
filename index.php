<?php
include('login.php'); // Includes Login Script

if (isset($_SESSION['login_user'])) {
    header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"> 
        <script src="script.js"></script>
    </head>
    <body>
        <div class="header">
            <h2>Login Form</h2>
        </div>
        <div class="body">
            <form action="" method="post">
                <label>UserName :</label>
                <input class="textBox" id="name" name="username" placeholder="username" type="text" onblur="validate(this.name, this.value)"></br></br>
                <label>Password :</label>
                <input class="textBox" id="password" name="password" placeholder="**********" type="password" onblur="validate(this.name, this.value)"></br></br>
                <input class="button" onclick="validate()" name="submit" type="submit" value=" Login ">
                <span><?php echo $error; ?></span>
            </form>
        </div>
        <div class="footer">

        </div>
    </body>
</html>
