<?php
	require "header.php";
	require "dbh.php";
?>


  <main role="main">

<?php
	$id = intval($_GET['uid']);
	$sql = "SELECT * FROM Client WHERE id = $id;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck > 0) {
		if($row = mysqli_fetch_assoc($result)){
			$pc = $row['PostalCode'];
			$name = $row['Name'];
			$bd = $row['Birthdate'];
			$healthcard = $row['HealthCardNum'];
			$sid = $row['StaffID'];
		}
	}
 ?>


	<section class = "sec-events" role="section">
		<h1> Welcome!</h1>
		<h4> Client ID: <?php echo $id;?>
		<br> Client Name: <?php echo $name;?>
		</h4>
	</section>


	<section class = "Immunizer" role="section">

		<?php
			$sql = "SELECT * FROM Record WHERE ClientID = $id;";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if($resultCheck > 0) {
				if($row = mysqli_fetch_assoc($result)){
					$rid = $row['RecordID'];
					$iid = $row['ImmunizerID'];
					$shot= $row['ShotNum'];
					$cid = $row['ClinicID'];
				}
			}
 		?>

		<hr>
			<h4> Your Immunization Record: </h4>
			<p> We do not disclose your personal information to any third party unless otherwise authorized to do so. </p>

			<table border="1">
				<tr>
					<th>Record#</th><th>Immunizer ID</th><th>Shot#</th><th>Clinic ID</th>
				</tr>
				<tr>
					<th><?php echo $rid ?></th><th><?php echo $iid ?></th><th><?php echo $shot ?></th><th><?php echo $cid ?></th>
				</tr>
			</table>
	</section>

	<section>

		<?php
			$result1 = mysqli_query($conn,"SELECT COUNT(RecordID) AS count1 FROM Record;");
			$result2 = mysqli_query($conn,"SELECT COUNT(RecordID) AS count2 FROM Record WHERE ShotNum=2;");
			$data1 = mysqli_fetch_assoc($result1);
			$data2 = mysqli_fetch_assoc($result2);
			$count1 = $data1['count1'];
			$count2 = $data2['count2'];
			$perc = $count2/$count1*100;
		?>

		<hr>
		<h4> Vaccination Statistics</h4>
		<p>Here you will see how many people recieved their COVID-19 vaccination at our clinic.</p>
			<button onclick="show()" type="button">Click to View Statistics</button>

			<style>
			div.ex1 {display: none}
			</style>

			<div id="stat" class = "ex1">
				<p>Number of people vaccined: <?php echo $count1 ?>
					<br> Number of people fully vaccined (recieved two dose): <?php echo $count2 ?>
					<br> <?php echo $perc ?>% of population is fully vaccined.
				</p>

			</div>

			<script>

			function show() {
				var x = document.getElementById("stat");
				if(x.style.display === "none") {
					x.style.display = "block";
				} else {
					x.style.display = "none";
				}
			}
			</script>

	</section>

    <section class="sec-events" role="section">
      <hr />

      <article>
        <h1>The clinic takes appointment by call only.
					<br> Call 1-800-GET-VACC for appointment,
		or 1-800-WHATS-UP for questions regarding vaccination.
        <br>Note: This website is under constant development</h1>
        <a class="link" href="#">more...</a>
      </article>
    </section>

  </main>
</div>
<footer>
  <p class="copy">&copy; Definitely copy righted by CPSC304 team </p>
</footer>
<div class="line"></div>
