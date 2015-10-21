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

    <style>
        .navbar{
            position: absolute;
            right: 0;
            margin-top: 18px;
        }
        .navigationitems{
            list-style-type: none;
            margin : 0;
            padding : 0;
            overflow: hidden;
        }
        .navigationitems > li{
            float: right;
        }
        .navigationitems > li > a{
            display: block;
            padding-right: 10px;
        }
    </style>
</head>

<body>
<nav>
    <h1 style="float: left">SwinEDC</h1>
    <div class="navbar">
        <ul class="navigationitems">
            <li><a href="help.html">Help</a> </li>
            <li><a href="register.php">Register</a> </li>
            <li><a href="login.php">Login</a> </li>
            <li><a href="home.html">Home</a> </li>
        </ul>
    </div>
</nav>

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