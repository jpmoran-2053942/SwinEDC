<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="SwinEDC"/>
	<meta name="keywords" content=""/>
	<meta name="author" content="James Moran"/>
	<meta name="updated" content="13/10/15"/>
	<!-- Need style sheet reference -->
	<title>SwinEDC</title>
</head>

<body>
	<!-- Header php reference -->

	<div id="main">
		
		<!--Content-->
		<section>
		<h1> Registration Error</h1>
			<?
			$error = $_GET["error"];
			echo "<p> $error </p>"
			?>
			<p> <a href="register.php"> Click here to return to the registration page.</a> </p>
		</section>
	</div>
	
	<!-- Footer php reference -->
</body>
</html>