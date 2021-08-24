
<?php

if(isset($_POST['login-submit']))  {
	require 'dbh.php';
	$uid = $_POST['uid'];
	$password = $_POST['password'];
	if(empty($uid)||empty($password)) {
		header("Location:staffLogin.php?error=emptyfields&uid=".$uid);
		exit();
	} else {
		$sql = "SELECT * FROM staff WHERE ID=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:staffLogin.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt,"s",$uid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)) {
				if($password != 4399) {
					header("Location:staffLogin.php?error=wrongpassword");
					exit();
				} else {
					session_start();
					$_SESSION['uid'] = $row['ID'];
					header("Location:staff.php?login=success&uid=".$uid);
					exit();
				}
			} else {
				header("Location:staffLogin.php?error=nouser");
				exit();
			}
		}
	}
} else {
	header("Location:staffLogin.php");
	exit();
}