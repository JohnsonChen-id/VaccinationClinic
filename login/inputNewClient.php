<?php
	session_start();
	$_SESSION['staffID'] = $_GET['uid'];
?>

	<main>
	
		<div class="wrapper-main">
			<section class="section">
			<h1>Input</h1>
			<?php
				if(isset($_GET['error'])) {
					if($_GET['error'] == "emptyfields") {
						echo '<p class="signuperror">Fill in all fields!</p>';
					} else if ($_GET['error'] == "invalid") {
						echo '<p class="invaliderror">The input is INVAlid!</p>';//TODO
					}
				} else if(isset($_GET['register'])) {
					
					if($_GET['register']=="success") {
					echo '<p class="registersucess">Register successful!</p>';
					}
				}
			?>
			<form class="form-input" action="register.php" method="post">
				<input type="text" name="uid" placeholder="ClientID">
				<input type="password" name="healthcard" placeholder="Health Card">
				<input type="text" name="Name" placeholder="Name">
				<input type="text" name="postalCode" placeholder="Postal Code">
				<input type="date" name="birthdate" placeholder="Birthdate">
				<button type="submit" name="register-submit">register</button>
			</form>
			</section>
			</div>
	
	</main>