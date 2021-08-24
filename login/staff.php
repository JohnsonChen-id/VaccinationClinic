<?php
	require "header.php";
	require "dbh.php";
?>

  <main role="main">


	<section class = "sec-events" role="section">
		<p> Hello Dear Staff#
		<?php $id = intval($_GET['uid']);
				echo $id;?> Here is client Information: </p>
	</section>
	<?php
	echo '<a href="inputNewClient.php?uid='.$id. '">input new client information</a>';
	?>
	<section class = "sec-events" role="section">
	<form name="client-info" action="" method="post">
	<button type="submit" name="clients" >Show my Clients</button>
	<br>
	<br>
	<input type="text" name="record" placeholder="record">
	<p> To verify not a bot, Please enter "record" in place to check records for all.</p>
	<button type="submit" name="records" >Show all Records </button>
	</form>
	<?php

	if(isset($_POST['clients'])) {
		$sql = "SELECT ID, Name , HealthCardNum , PostalCode FROM client WHERE StaffID=?";
		$stmt = mysqli_stmt_init($conn);
		$sid = intval($id);
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:staff.php?error=sqlerror&uid=".$id);
			exit();
		} else {
			mysqli_stmt_bind_param($stmt,"i",$sid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>HealthCardNum</th><th>PostalCode </th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["HealthCardNum"] . "</td><td>" . $row["PostalCode"] . "</td></tr>";
			}
			echo "</table>";
		}
	} else if (isset($_POST['records'])) {
		$input = $_POST['record'];
		$sql = "SELECT RecordID , ShotNum , ImmunizerID, ClinicID FROM ".$input;
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:staff.php?error=sqlerror&uid=".$id);
			exit();
		} else {
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
            echo "<table>";
            echo "<tr><th>RecordID</th><th>ShotNum</th><th>ImmunizerID</th><th>ClinicID</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row["RecordID"] . "</td><td>" . $row["ShotNum"] . "</td><td>" . $row["ImmunizerID"] . "</td><td>" .$row["ClinicID"] . "</td></tr>";
			}
			echo "</table>";
		}
	}


	?>
	</section>
	<br>
	<form name="client-joins" action="" method="post">
	<button type="submit" name="clients_records" >Show all my client's process on shots</button>
	<button type="submit" name="records_adverse" >Show all my recorded adverse reactions</button>
	</form>
	<?php
	if(isset($_POST['clients_records'])) {
		$sql = "SELECT c.ID, c.Name , c.HealthCardNum , c.PostalCode, r.ShotNum, r.ClinicID FROM client c, record r WHERE c.ID = r.ClientID AND StaffID=?";
		$stmt = mysqli_stmt_init($conn);
		$sid = intval($id);
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:staff.php?error=sqlerror&uid=".$id);
			exit();
		} else {
			mysqli_stmt_bind_param($stmt,"i",$sid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>HealthCardNum</th><th>PostalCode</th>
			<th>Shot#</th><th>Clinic ID</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["HealthCardNum"] . "</td><td>" . $row["PostalCode"] . "</td><td>" . $row["ShotNum"] . "</td><td>" . $row["ClinicID"] . "</td></tr>";
			}
			echo "</table>";
		}
	} else if (isset($_POST['records_adverse'])) {
		$sql = "SELECT r.RecordID , r.ShotNum , ad.Name, ad.Severity FROM record r, adverse_reaction ad WHERE r.RecordID = ad.RecordID AND r.ImmunizerID=?";
		$stmt = mysqli_stmt_init($conn);
		$sid = intval($id);
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:staff.php?error=sqlerror&uid=".$id);
			exit();
		} else {
			mysqli_stmt_bind_param($stmt,"i",$sid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
            echo "<table>";
            echo "<tr><th>RecordID</th><th>ShotNum</th><th>Name of Reaction</th><th>Severity </th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row["RecordID"] . "</td><td>" . $row["ShotNum"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Severity"] . "</td></tr>";
			}
			echo "</table>";
		}
	}


	?>

	<section class="deletion-portal">
	<form name="deletion" action="delete.php" method="post">
	<p>You are about to delete record:</p>
	<input type="int" name="recordID" placeholder="recordID">
	<button type="submit" name="Delete">Delete</button>
	</form>
	</section>


	<?php
	echo '<a href="selection.php?staff='.$id. '" target="selection.php?staff='.$id. '">Redirect to Selection Page</a>';
	?>
	<br>
	<br>
	<?php
	echo '<a href="groupby.php?uid='.$id. '" target="groupby.php?uid='.$id. '">Redirect to Group by Page</a>';
	?>


    <section class="sec-events" role="section">
      <hr />
      <h1>General</h1>
      <article>
        <p>This website is under constant development</p>
      </article>
    </section>

  </main>
</div>
<footer>
  <p class="copy">&copy; Definitely copy righted by CPSC304 team </p>
</footer>
<div class="line"></div>
