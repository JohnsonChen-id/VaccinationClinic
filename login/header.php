<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>CPSC 304 Vaccine Clinic</title>
		<img src= "../img/logo.png" alt= "logo" width = 350px/>

		<meta charset = "utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="stylesheet"  href="../Template.css" media="screen"/>
	</head>

	<div class="line"></div>

	<body>


	<header role="banner">
		<nav role="navigation">


			<h1><em>CPSC 304 COVID-19 Vaccine Clinic</em></h1>


<div id="menu">
		<ul class="nav-ul">
				<li><a href="index.php">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
        <li><a href = "https://www.canada.ca/en/public-health/services/diseases/cor
		onavirus-disease-covid-19/vaccines.html?utm_campaign=hc-sc-covidvaccine-
		21-22&utm_medium=sem&utm_source=bing&utm_content=ad-text-en&utm_term=sho
		uld%20i%20get%20the%20covid%20vaccine&adv=2122-89750&id_campaign=3964
		59392&id_source=1252344292751481&id_content=78271643577387&gclid=f386
		ab05d98a19ed5406cbaebf61449f&gclsrc=3p.ds"

		target="https://www.canada.ca/en/public-health/services/diseases/cor
		onavirus-disease-covid-19/vaccines.html?utm_campaign=hc-sc-covidvaccine-
		21-22&utm_medium=sem&utm_source=bing&utm_content=ad-text-en&utm_term=sho
		uld%20i%20get%20the%20covid%20vaccine&adv=2122-89750&id_campaign=3964
		59392&id_source=1252344292751481&id_content=78271643577387&gclid=f386
		ab05d98a19ed5406cbaebf61449f&gclsrc=3p.ds">More About COVID-19 Vaccines</a></li>

		</ul>
</div>



		</nav>

		<?php
			if(isset($_SESSION['uid'])) {
				echo '<form action="logout.php" method="post">
				<button type="submit" name="logout-submit">Logout</button>
				</form>';
			} else {
				echo '<section class="sec-events" role="section">

					<a href="clientLogin.php">Login as Client</a>
					<br>
					<a href="staffLogin.php">Login as Staff</a>
					<br>
					<a href="supervisorLogin.php">Login as Supervisor</a>
					<br>';
			}
		?>
		
	</div>
	</header>
	<hr>
	<!--<select id = "Role">
					<option value = "1"> Supervisor </option>
					<option value = 2> Staff </option>
					<option value = 3> Client </option>
					</select>-->
