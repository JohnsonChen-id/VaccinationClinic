<?php

if(isset($_POST['login-submit']))  {
	require 'dbh.php';
	$uid = $_POST['uid'];
	$healthcard = $_POST['healthcard'];
	if(empty($uid)||empty($healthcard)) {
		header("Location:index.php?error=emptyfields&uid=".$uid);
		exit();
	} else {
		$sql = "SELECT * FROM client WHERE ID=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:index.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt,"s",$uid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)) {
				$cardcheck = password_verify($healthcard,$row['healthcard']);
				if($cardcheck == false) {
					header("Location:index.php?error=wronghealthcard");
					exit();
				} else {
					session_start();
					$_SESSION['uid'] = $row['ID'];
					$_SESSION['healthcard'] = $row['HealthCardNum'];//columns
					header("Location:index.php?login=success");
					exit();
				}
			} else {
				header("Location:index.php?error=nouser");
				exit();
			}
		}
	}
} else {
	header("Location:index.php");
	exit();
}
	