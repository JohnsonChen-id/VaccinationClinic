<?php
	require "header.php";
?>

<html>
	<head>

		<meta charset = "utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="stylesheet"  href="../Template.css" media="screen"/>
	</head>
	<div class="line"></div>

	<body>


	<header role="banner" >

	<h3>Notice:</h3>
	<h4>New client must registered through clinic staffs.
	<br>To help protect your identity and privacy, you need to provide one piece of your government-issued ID and your health card number upon arrival.
	<br>Please double-check that you are bringing the right ID before coming in - it could save you an extra trip or other delays.
</h4>
		<div class="header-login">

		<?php
			if(isset($_SESSION['uid'])) {
				echo '<form action="logout.php" method="post">
				<button type="submit" name="logout-submit">Logout</button>
				</form>';
			} else {
				echo '<section class="sec-events" role="section">
					<hr/>
					<form action="clientLoginInfo.php" method="post">
					<input type="text" name="uid" placeholder="UserID..">
					<input type="password" name="healthcard" placeholder="Healthcard Number..">
					<button type="submit" name="login-submit">Login</button>
					</form>';
			}
		?>



		</nav>
	</div>
	</header>
