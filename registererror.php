<!DOCTYPE html>
<html lang="en">
<head>
	<head>
		<meta charset="utf-8"/>
    <title>SwinEDC - Registration error</title>
    <meta name="description" content="Your registration failed, please try again later">
    <meta name="keywords" content="SwinEDC, Swinburne, University of technology, Swinburne register, Swinburne hawthorn, team, Swinteam, EDC, Akmal, Robyn, Jame">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="period">
    <meta name="language" content="English">
    <meta name="author" content="Robyn, James and Akmal">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="updated" content="26/10/2015">
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