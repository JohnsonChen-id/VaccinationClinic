<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title></title>
		<!--<link rel="stylesheet" href="style.css">-->
	</head>
	<body>
	
	
	<header>
		<nav class="nav-header>
		<a href="#">
		<img src="" alt="logo">
		</a>
		<!--<ul>
			<li><a href="index.php"> Home</a></li>
			<li><a href="#"> Login</a></li
		</ul> -->
		<div class="header-login">
		<?php
			if(isset($_SESSION['userID'])) {
				echo '<form action="logout.php" method="post">
				<button type="submit" name="logout-submit">Logout</button>
				</form>';
			} else {
				echo '<form action="login.php" method="post">
			<input type="text" name="id" placeholder="UserID..">
			<input type="password" name="password" placeholder="Password..">
			<button type="submit" name="login-submit">Login</button>
			</form>
			<a href="inputNewClient.php">input new client information</a>';
			}
		?>
		
		
		
		</nav>
	</div>
	</header>