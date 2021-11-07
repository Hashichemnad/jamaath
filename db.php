<?php
/* Database connection settings */
$host = 'localhost';
$user = 'hashichemnad';
$pass = 'a';
$db = 'jamath';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$connect = mysqli_connect($host, $user, $pass, $db); 

// DB credentials.
define('DB_HOST',$host);
define('DB_USER',$user);
define('DB_PASS',$pass);
define('DB_NAME',$db);
// Establish database connection.
try
{
$dbo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>