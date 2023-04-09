<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "t&n";

$con = mysqli_connect($servername,$username,$password,$dbname);



if (!$con)
{
die("connectionfailed: " .$con->connect_error);
}
?>
