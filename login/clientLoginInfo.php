
<?php

if(isset($_POST['login-submit']))  {
	require 'dbh.php';
	$uid = $_POST['uid'];
	$healthcard = $_POST['healthcard'];
	if(empty($uid)||empty($healthcard)) {
		header("Location:clientLogin.php?error=emptyfields&uid=".$uid);
		exit();
	} else {
		$sql = "SELECT * FROM client WHERE ID=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:clientLogin.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt,"s",$uid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)) {
				//$cardcheck = password_verify($healthcard,$row['HealthCardNum']);
				//if($cardcheck == false) {
				if($healthcard != $row['HealthCardNum']) {
					header("Location:clientLogin.php?error=wronghealthcard");
					exit();
				} else {
					session_start();
					$_SESSION['uid'] = $row['ID'];
					$_SESSION['healthcard'] = $row['HealthCardNum'];//columns
					header("Location:client.php?login=success&uid=".$uid);
					exit();
				}
			} else {
				header("Location:clientLogin.php?error=nouser");
				exit();
			}
		}
	}
} else {
	header("Location:clientLogin.php");
	exit();
}
