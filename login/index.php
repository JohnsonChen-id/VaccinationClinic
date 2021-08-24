<?php
	require "header.php";
?>
	<link rel="stylesheet"  href="../Template.css" media="screen"/>
	<main>
	<div class = "wrapper-main">
		<section class="section">

			<div class="login">

			<?php
				// if(isset($_SESSION['uid'])) {
				// 	echo '<form action="logout.php" method="post">
				// 	<button type="submit" name="logout-submit">Logout</button>
				// 	</form>';
				// } else {
				// 	echo '<section class="sec-events" role="section">
				//
				// 		<a href="clientLogin.php">Login as Client</a>
				// 		<br>
				// 		<a href="staffLogin.php">Login as Staff</a>
				// 		<br>
				// 		<a href="supervisorLogin.php">Login as Supervisor</a>
				// 		<br>';
				// }
			?>

		
		<?php
			if(isset($_SESSION['userID'])) {
				echo '<p class="login-status">You are logged in</p>';
			} else {
				echo '<p class="login-status">You are NOT logged in</p>';
			}
		?>
		</section>
	</div>

	<section class="sec-intro" role="section">

			<h2>CPSC 304 Vacccine Clinic</h2>
			<p> Welcome to CPSC 304 Vaccine Clinic! Publicly funded (free) COVID-19 vaccines are now available through our health unit.
				<br/>This Clinic opens for the general public for Vaccination of COVID-19, Monday to Friday from 9 a.m. to 7 p.m.
				<br/> We truly care for your health during this hard time. Spread the word and help your friends and family complete
				<br/> their registration, book an appointment and get the vaccine.
			</p>
		</section>

		<div id="images_display">
			<section style = "text-align : left;">
				<img src = "../img/image1.jpg"
				style = "object-fit: contain;
					width:500px;
					height:335px;
					border: solid 1px #CCC";
					alt="img1"/>

					<img src = "../img/image2.jpg"
						style = "object-fit: contain;
								width:500px;
								height:335px;
								border: solid 1px #CCC";
								alt="img2"/>

					<img src = "../img/image3.jpg"
						style = "object-fit: contain;
						width:500px;
						height:335px;
						border: solid 1px #CCC";
						alt="img3"/>

					<img src = "../img/image4.jpg"
							style = "object-fit: contain;
							width:500px;
							height:335px;
							border: solid 1px #CCC";
							alt="img4"/>
						</section>
			</div>



    <section class="sec-events" role="section">
      <hr />
      <h1>General</h1>
      <article>
        <h1>The clinic takes appointment by call only, Please call 1-800-GET-VACC for appointment,
		or 1-800-WHATS-UP for questions regarding vaccination. </h1>
        <p>This website is under constant development</p>
        <a class="link" href="#">more...</a>
      </article>
    </section>

	</main>

<footer>
  <p class="copy">&copy; Definitely copy righted by CPSC304 team </p>
</footer>
<div class="line"></div>
