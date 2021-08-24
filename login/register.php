<?php
if(isset($_POST['register-submit'])) {
	session_start();
	require 'dbh.php';
	require 'staff.php';
	$uid = $_POST['uid']; //whatever and more is inputed at staff end
	$healthcard = $_POST['healthcard'];
	$name = $_POST['Name'];
	$postal = $_POST['postalCode'];
	$birthdate = $_POST['birthdate'];
	
	if(empty($uid)||empty($healthcard)||empty($name)) {
		header("Location:inputNewClient.php?error=emptyfields&uid=".$uid."&name=".$name);
		exit();
	} else if(!preg_match("/^[A-Z][0-9]*$/",$healthcard)) {
		header("Location:inputNewClient.php?error=invalidhealthcard&uid=".$uid);
		exit();
	} else {
		$sql = "SELECT ID FROM client WHERE ID=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:inputNewClient.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt,"s",$uid);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck >0) {
				header("Location:inputNewClient.php?error=usertaken&name=".$name);
				exit();
			} else {
				$sql = "INSERT INTO client(ID, PostalCode, Birthdate, Name, HealthCardNum, StaffID) VALUES(?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql)) {
					header("Location:inputNewClient.php?error=sqlerror");
					exit();
				} else {
					mysqli_stmt_bind_param($stmt,"sssssi",$uid,$postal, $birthdate, $name, $healthcard,$_SESSION['staffID']);
					mysqli_stmt_execute($stmt);
					header("Location:staff.php?register=success&uid=".$_SESSION['staffID']);
					exit();
				}
			}
		}
	}
	
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
} else {
	header("Location:inputNewClient.php");
	exit();
}

