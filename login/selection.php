	
	
	<main role="main">
	<form name="selection" action="" method="post">
	<p>Please Select your Query Below</p>
	<p>Select 
	From Clients WHERE ID=<input type="text" name="where" placeholder="Your wanted"></p>
	<button type="submit" name="Select">Submit</button>
	</form>

<?php
		if(isset($_POST['Select'])) {
			require 'dbh.php';
			$awhere = $_POST['where'];
			$stmt = mysqli_stmt_init($conn);
			$sql = "SELECT * FROM client WHERE ID=? ";
			if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:staff.php?error=sqlerror&uid=".$id);
			exit();
			} else {
			mysqli_stmt_bind_param($stmt,"s",$awhere);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
            echo "<table>";
            echo "<tr><th>ID</th><th>Postal Code</th><th>Birthdate</th><th>Name</th><th>HealthCardNum</th><th>Staff ID</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["PostalCode"] . "</td>
					<td>" . $row["Birthdate"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["HealthCardNum"] . "</td><td>" . $row["StaffID"] . "</td>
					</tr>";
			}
			echo "</table>";
		}
		}
	?>
	<?php
	echo '<a href="staff.php?uid='.$_GET['staff']. '">Back to Staff Page</a>';
	?>
	</main>