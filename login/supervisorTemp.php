
<div class="line"></div>
<div class="wrapper">
  <header role="banner">
  <link rel="stylesheet"  href="../Template.css" media="screen"/>
    <nav role="navigation">
      <h1><em>Vaccination Clinic</em></h1>
      <ul class="nav-ul">
        <li><a href="Template.html">Home</a></li>
      </ul>
    </nav>
  </header>
  
  <main role="main">
    <section class="sec-intro" role="section">
      <h1>CPSC304</h1>
    </section>
	
	<section class = "sec-events" role="section">
		<h3> Dear Supervisor:</h3>
		<p> The Current Vaccine type available at your clinic are </p>
		
		<?php
		$sql = "SELECT ID, type FROM vaccine;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:index.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
            echo "<table>";
            echo "<tr><th>ID</th><th>Type</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Type"] . "</td></tr>";
			} 
			echo "</table>";
		}
		
		?>
	</section>
	</hr>
	
	<section class = "Suppliers" role="section">
		<p> Your Immunizer Info: </p>
	</section>
	
	
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
</div>
<footer>
  <p class="copy">&copy; Definitely copy righted by CPSC304 team </p>
</footer>
<div class="line"></div>