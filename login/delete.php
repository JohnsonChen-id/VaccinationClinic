<?php
		require 'staff.php';
		if(isset($_POST['Delete'])) {
			require 'dbh.php';
			$rid = intval($_POST['recordID']);
			$stmt = mysqli_stmt_init($conn);
			$sql = "DELETE FROM record WHERE RecordID=? ";
			if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:staff.php?error=sqlerror&uid=".$id);
			exit();
			} else {
			mysqli_stmt_bind_param($stmt,"i",$rid);
			mysqli_stmt_execute($stmt);
			header("Location:staff.php?delete=success&uid=".$id);
			}
		}
	?>