<?php

//session_destroy(); 

session_start(); // Starting Session
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_DATABASE', "samplelogin");
define('DB_DRIVER', "mysql");
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {

        //assing text box value to variable 
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            //Establish DB Connection
            $conn = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);
           
            $query = "select * from login where password=? AND username=?";
            $stmt = $conn->prepare($query);
            //bind username & password to sql quary and execute the quary
            $stmt->bindParam(1, $password);
            $stmt->bindParam(2, $username);
            $stmt->execute();
            $result = $stmt->fetchAll();
            //get the count of the out put rows from the exacuted quary
            $row = $stmt->rowCount();

            //assing the Log in user to session
            if ($row == 1) {
                $_SESSION['login_user'] = $username; // Initializing Session
                header("location: profile.php"); // Redirecting To Other Page
                //echo 1;
            } else {
                $error = "Username or Password is invalid";
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }





        $conn = null; // Closing Connection
    }
}
?>