<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
    <title>SwinEDC - Log in</title>
    <meta name="description" content="This is the log in page for SwinEDC, you need your username
    and password to log in successfully">
    <meta name="keywords" content="SwinEDC, Swinburne, University of technology, SwinEDC log in,
    , Swinburne hawthorn, team, Swinteam, EDC, Akmal, Robyn, Jame">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="period">
    <meta name="language" content="English">
    <meta name="author" content="Robyn, James and Akmal">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="updated" content="21/10/2015">

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
        #footer { width: 100%; overflow: hidden; }
        #footer ul { list-style: none; position: relative; float: left; display: block; left: 45%; }
        #footer ul li { position: relative; float: left; display: block; right: 50%; }
        #footer ul li a {padding-right: 10px;}
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
<br>
<br>
<br>
<br>
<br>
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

 <footer>
        <div id="footer" style="text-align: center">
            <p><b>SwinEDC &copy; is created by Robyn, James and Akmal</b></p>

            <div id="footer">
                <ul >
                    <li><a href="help.html">Help</a> </li>
					<li><a href="register.php">Register</a> </li>
					<li><a href="login.php">Login</a> </li>
					<li><a href="home.html">Home</a> </li>
                </ul>

            </div>

        </div>

		

    </footer>
</body>
</html>