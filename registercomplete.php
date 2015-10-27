<?php 
header("refresh:5; url=login.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
    <title>SwinEDC - Register complete</title>
    <meta name="description" content="This page indicates that registration was successful">
    <meta name="keywords" content="SwinEDC, Swinburne, University of technology, Swinburne register, Swinburne hawthorn, team, Swinteam, EDC, Akmal, Robyn, Jame">
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
            <li><a href="help.php">Help</a> </li>
            <li><a href="mygroups.php">My groups</li>
            <li><a href="profile.html">Profile</a> </li>
            <li><a href="search.php">Search</a> </li>
            <li><a href="home.php">Home</a> </li>
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
		<h1> Registration Success! </h1>
			<p> You have now been registered. Please login to use the site.<br>
			You will be redirected to the login page in 5 seconds.</p>
		</section>
	</div>
	
	 <footer>
        <div id="footer" style="text-align: center">
            <p><b>SwinEDC &copy; is created by Robyn, James and Akmal</b></p>

            <div id="footer">
                <ul >
                    <li><a href="help.php">Help</a> </li>
					<li><a href="mygroups.php">My groups</li>
					<li><a href="profile.html">Profile</a> </li>
					<li><a href="search.php">Search</a> </li>
					<li><a href="home.php">Home</a> </li>
                </ul>

            </div>

        </div>

		

    </footer>
</body>
</html>