
<section class = "sec-events" role="section">
		<p> The following options are given for overall inquiry</p>
		<form name="supervisor-divide" action="divide.php" method="post">
		<button type="submit" name="best_vaccine" >Find vaccines used by all immunizers</button>
		<button type="submit" name="terrible_vaccine" >Find vaccines used by no immunizers</button>
		</form>

</section>
<?php
	$id=$_POST['uid'];
	if(isset($_POST['best_vaccine'])||isset($_POST['terrible_vaccine'])) {
		$st = "";
		if(isset($_POST['best_vaccine'])) {
			$st="NOT";
		} else if (isset($_POST['terrible_vaccine'])) {

		}
		$sql2 = "SELECT v.ID, v.Type FROM vaccine v WHERE NOT EXISTS (SELECT * FROM staff s WHERE EXISTS(SELECT * FROM record r WHERE r.ImmunizerID=s.ID) AND ".$st." EXISTS (SELECT r.vaccineID FROM record r WHERE v.ID=r.vaccineID AND s.ID=r.ImmunizerID))";
		require "dbh.php";
			$stmt2 = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt2,$sql2)) {
				header("Location:supervisor.php?login=success&error=sqlerror?uid=".$id);
				exit();
			} else {
				mysqli_stmt_execute($stmt2);
				$result2 = mysqli_stmt_get_result($stmt2);
				echo "<table>";
				echo "<tr><th>ID</th><th>Type</th></tr>";
				while($row = mysqli_fetch_assoc($result2)) {
					echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Type"] . "</td></tr>";
				}
				echo "</table>";
				//header("Location:divide.php?uid=".$id);
				//exit();
			}
	}
	?>
	<br>
	<br>
	<?php
	echo '<a href="supervisor.php?login=success?uid="'.$id.'>Back to Supervisor Page</a>';

	?>

<!--<?php

		if(isset($_POST['best_vaccine'])) {
			$sql2 = "SELECT v.ID, v.Type FROM vaccine v WHERE NOT EXISTS (SELECT * FROM staff s WHERE EXISTS(SELECT * FROM record r WHERE r.ImmunizerID=s.ID) AND NOT EXISTS (SELECT r.vaccineID FROM record r WHERE v.ID=r.vaccineID AND s.ID=r.ImmunizerID))";
			require "dbh.php";
			$stmt2 = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt2,$sql2)) {
				header("Location:supervisor.php?error=sqlerror");
				exit();
			} else {
				mysqli_stmt_execute($stmt2);
				$result2 = mysqli_stmt_get_result($stmt2);
				echo "<table>";
				echo "<tr><th>ID</th><th>Type</th></tr>";
				while($row = mysqli_fetch_assoc($result2)) {
					echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Type"] . "</td></tr>";
				}
				echo "</table>";
			}
	} else if (isset($_POST['terrible_vaccine'])) {
		$sql2 = "SELECT v.ID, v.Type FROM vaccine v WHERE NOT EXISTS (SELECT * FROM staff s WHERE EXISTS(SELECT * FROM record r WHERE r.ImmunizerID=s.ID) AND EXISTS (SELECT r.vaccineID FROM record r WHERE v.ID=r.vaccineID AND s.ID=r.ImmunizerID))";
			require "dbh.php";
			$stmt2 = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt2,$sql2)) {
				header("Location:supervisor.php?error=sqlerror");
				exit();
			} else {
				mysqli_stmt_execute($stmt2);
				$result2 = mysqli_stmt_get_result($stmt2);
				echo "<table>";
				echo "<tr><th>ID</th><th>Type</th></tr>";
				while($row = mysqli_fetch_assoc($result2)) {
					echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Type"] . "</td></tr>";
				}
				echo "</table>";

			}
	}


	?>-->
