<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="SwinEDC"/>
	<meta name="keywords" content=""/>
	<meta name="author" content="James Moran"/>
	<meta name="updated" content="14/10/15"/>
	<!-- Need style sheet reference -->
	<title>SwinEDC</title>
</head>

<body>
	<!-- Header php reference -->

	<div id="main">
		
		<!--Content-->
		<section>
		<h1> Login</h1>
			<p> Please login via the form below to start using the site. </p>
				
			<form id="login" method="post" action="resources/php/process_login.php" novalidate="novalidate" >
				
				<fieldset>
					<legend>Login details:</legend>
					<legend>Username:</legend>
					<input type="text" name="username" id="username" size="18" required="required" pattern="^[a-zA-z0-9]{1,20}$"/>
					<br />
					<legend>Password:</legend>
					<input type="password" name="password" id="password" size="18" required="required" /pattern="^[a-zA-z0-9]{1,20}$">
				</fieldset>
				
				<?
				//Print error message if the page was passed one.
				if (!empty($_GET)) {
					$error = $_GET["error"];
					echo "<p id='error'> $error </p>";
				}
				?>
				
				<p><input type="submit" value="Submit" />
					<input type="reset" value="Reset" />
				</p>
			</form>
		</section>
	</div>
	
	<!-- Footer php reference -->
</body>
</html>