<?php
session_start(); // Starting Session
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_DATABASE', "samplelogin");
define('DB_DRIVER', "mysql");

$conn = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD);

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//$connection = mysql_connect("localhost", "root", "");
// Selecting Database
//$db = mysql_select_db("samplelogin", $connection);

// Storing Session
$user_check = $_SESSION['login_user'];
$query = "select username from login where username=?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $user_check);

// SQL Query To Fetch Complete Information Of User
//$ses_sql=mysql_query("select username from login where username=?", $connection);

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$login_session = $row['username'];
if($row == null){
    echo "empty";
}
if (!isset($login_session)) {
//mysql_close($connection); // Closing Connection
    $conn=null;
    //header('Location: index.php'); // Redirecting To Home Page
}
?>