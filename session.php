<?php
session_start(); // Starting Session
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_DATABASE', "samplelogin");
define('DB_DRIVER', "mysql");
// Establishing Connection with Server and Selecting Database
$conn = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);


// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$query = "select username from login where username=?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $user_check);



$row = $stmt->fetch(PDO::FETCH_ASSOC);
$login_session = $row['username'];
if($row == null){
    echo "empty";
}
if (!isset($login_session)) {

    $conn=null;// Closing Connection
    //header('Location: index.php'); // Redirecting To Home Page
}
?>