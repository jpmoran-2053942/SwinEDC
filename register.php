<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
    <title>SwinEDC - Register</title>
    <meta name="description" content="This is the registration page for a new user, you must input
    all the data required to register. After registration you can log into SwinEDC">
    <meta name="keywords" content="SwinEDC, Swinburne, University of technology, Swinburne register, Swinburne hawthorn, team, Swinteam, EDC, Akmal, Robyn, Jame">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="period">
    <meta name="language" content="English">
    <meta name="author" content="Robyn, James and Akmal">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="updated" content="21/10/2015">
	<!-- Need style sheet reference -->
	<script src="resources/script/register.js"></script>



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
		<h1> Register</h1>
			<p> Thanks for your interest in this service! Please fill out the form below to start using the site. </p>
				
			<form id="register" method="post" action="resources/php/process_registration.php" novalidate="novalidate" >
				
				<fieldset>
					<legend>Login details:</legend>
					<legend>Username:</legend>
					<input type="text" name="username" id="username" size="18" required="required" pattern="^[a-zA-z0-9]{1,20}$" placeholder="20 char max"/>
					<br />
					<legend>Password:</legend>
					<input type="password" name="password" id="password" size="18" required="required" /pattern="^[a-zA-z0-9]{1,20}$">
					<br />
					<legend>Password (again):</legend>
					<input type="password" name="password2" id="password2" size="18" required="required" pattern="^[a-zA-z0-9]{1,20}$"/>
				</fieldset>
				
				<fieldset>
					<legend>Personal:</legend>
					<legend for="fname">First Name:</legend>					
					<input type="text" name="fname" id="fname" size="18" required="required" pattern="^[a-zA-z]{1,20}$" placeholder="20 char max"/>
					<br />
					<legend for="sname">Surname:</legend>
					<input type="text" name="sname" id="sname" size="18" required="required" pattern="^[a-zA-z]{1,20}$" placeholder="20 char max"/>
					<br />
					<legend for="course">Course:</legend>
					<!-- maybe replace with a select box? can be get a database form of all Swinburne courses? -->
					<input type="text" name="course" id="course" size="18" pattern="^[a-zA-z]{1,40}$" placeholder="40 char max"/>
					<br />
					<legend for="yearstarted">Year Started:</legend>
					<input type="text" name="yearstarted" id="yearstarted" size="18" pattern="^\d{2}\-(\d{2}|\d{4})$" placeholder="mm-yy"/>
				</fieldset>
				
				<p><input type="submit" value="Submit" />
					<input type="reset" value="Reset" />
				</p>
			</form>
		</section>
	</div>


</body>
</html>