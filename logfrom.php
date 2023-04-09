<?php 
include 'connection.php';
	if(!isset($_SESSION)){
	session_start();
	}

	if(isset($_POST['login'])){
		$ulog=mysqli_real_escape_string($con, $_POST['ulog']);
		$plog= mysqli_real_escape_string($con, $_POST['plog']);

		$compare = "SELECT * FROM `users` WHERE `username`='$ulog' AND `password`='$plog' ";
		$r=mysqli_query($con,$compare);

		if (mysqli_num_rows($r) == 1 ){
			$_SESSION['uname']=$ulog;
			header('location:admin.php');
		}
		else{
			echo "Wrong Data";
		}
	}
	//logout
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['uname']);
		header('location:Login.php');
	}
?>