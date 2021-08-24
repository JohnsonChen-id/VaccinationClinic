	
	
	<main role="main">
	<form name="selection" action="" method="post">
	<p>Please Select your Query Below: First point is to be inputed COUNT(ID): They need to be legal terms, such as AVG(HealthCardNum) is not Permitted as HealthCardNum is not integer
	<br>
	The second point is about what attribute you want it to be grouped upon: such as StaffID</p>
	<p>I want <input type="text" name="what" placeholder="Main Point">
	From Clients To Group By<input type="text" name="groupby" placeholder="Group by"></p>
	<button type="submit" name="Go">Submit</button>
	</form>

<?php
		if(isset($_POST['Go'])) {
			require 'dbh.php';
			$awhat = $_POST['what'];
			$agroup = $_POST['groupby'];
			$stmt = mysqli_stmt_init($conn);
			$sql = "SELECT ".$agroup.",".$awhat." FROM client Group by ".$agroup;
			if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:staff.php?error=sqlerror&uid=".$id);
			exit();
			} else {

			mysqli_stmt_execute($stmt);
			//$result = mysqli_stmt_get_result($stmt);
			$stmt->bind_result($col1,$col2);
            echo "<table>";
            echo "<tr><th>".$agroup."</th><th>".$awhat."</th></tr>";
			while($stmt->fetch()){
				//echo "<tr><td>" . $row["StaffID"] . "</td><td>" . $row["COUNT(ID)"] . "</td></tr>";
				echo "<tr><td>" . $col1 . "</td><td>" . $col2 . "</td></tr>";
			}
			echo "</table>";
			}
		}
	?>
	<?php
	echo '<a href="staff.php?uid='.$_GET['uid']. '">Back to Staff Page</a>';
	?>
	</main>