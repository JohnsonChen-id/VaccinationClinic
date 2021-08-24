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



		<div class="header-login">

		<?php
			if(isset($_SESSION['uid'])) {
				echo '<form action="logout.php" method="post">
				<button type="submit" name="logout-submit">Logout</button>
				</form>';
			} else {
				echo '<section class="sec-events" role="section">
					
					<p> Notice: The default password is assigned to all supervisors by the clinic. Ask your admin for permission to change the password.</p>
					<form action="supervisorLoginInfo.php" method="post">
					<input type="text" name="uid" placeholder="UserID..">
					<input type="password" name="password" placeholder="Password..">
					<button type="submit" name="login-submit">Login</button>
					</form>';
			}
		?>



		</nav>
	</div>
	</header>
