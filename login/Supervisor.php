<?php
	require "header.php";
	require "dbh.php";
	$stmt = mysqli_stmt_init($conn);
?>
  <main role="main">
	
	<section class = "sec-events" role="section">
		<h3> Dear Supervisor ID :
		<?php $id = intval($_GET['uid']);
				echo $id;?></h3>
		<p> The Current Vaccine type available at your clinic are </p>
		
		<p class = "warning"> You may ONLY check one vaccine at a time</p>
		<?php
		$sql = "SELECT v.ID, v.Type , v.SupplierName , v.Availability, vs.Country FROM vaccine v, vaccine_supplier vs WHERE v.SupplierName=vs.Name";
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:supervisor.php?error=sqlerror&uid=".$id);
			exit();
		} else {
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
            echo "<table>";
            echo "<tr><th>ID</th><th>Type</th><th>Availability</th><th>Supplier Name</th><th>Country</th></tr>";
			echo '<form name="vaccine-change" action="" method="post">';
			while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Type"] . "</td><td>" . $row["Availability"] . "</td><td>" . $row["SupplierName"] . "</td><td>" . $row["Country"] . "</td><td>" . '<input type="checkbox"
					name="vaccines[]" value="' . $row["ID"] . '">' . "</td></tr>";
			}
			echo "<button type='submit' name='vaccine-change'>Change Availability</button>";
			echo "</form>";
			
			if( $_POST ) {
				$array = $_POST['vaccines']; 
				$change = intval($array[0]);
				$sql2 = "UPDATE vaccine SET Availability = NOT Availability WHERE ID=?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql2)) {
					header("Location:supervisor.php?login=success&error=sqlerror&uid=".$uid);
					exit();
				} else {
					mysqli_stmt_bind_param($stmt,"i",$change);
					mysqli_stmt_execute($stmt);
					header("Location:supervisor.php?login=success&edit=success&uid=".$id);
					exit();
					}
			}
			echo "</table>";
			
		}
		
		?>
	</section>
	</hr>
	
	<section class = "Staff" role="section">
		<p> Your Staff Info: </p>
		<?php
		$sql = "SELECT ID, Name, Shifthours, SupervisorID FROM staff";
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:supervisor.php?error=sqlerror&uid=".$id);
			exit();
		} else {
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Shifthours</th><th>SupervisorID</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Name"] . "</td>
					<td>" . $row["Shifthours"] . "</td><td>" . $row["SupervisorID"] . "</td>
					</tr>";
			}
			echo "</table>";
		}
		?>
	</section>
	
	<?php
	echo '<a href="divide.php?uid='.$id. '" target="divide.php?uid='.$id. '">Redirect to Divide Page</a>';
	?>
	
	
	
    <section class="sec-events" role="section">
      <hr />
      <h1>General</h1>
      <article>
        <h1>The clinic takes appointment by call only, Please call 1-800-GET-VACC for appointment,
		or 1-800-WHATS-UP for questions regarding vaccination. </h1>
        <p>This website is under constant development</p>
      </article>
    </section>
	
  </main>
</div>
<footer>
  <p class="copy">&copy; Definitely copy righted by CPSC304 team </p>
</footer>
<div class="line"></div>