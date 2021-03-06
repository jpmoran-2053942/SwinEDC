<?php
session_start();
if(isset($_GET['logout']))
	{
		unset($_SESSION["sessionuser"]); 
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>SwinEDC - This is the official webpage of SwinEDC. </title>
    <meta name="description" content="SwinEDC is a website which allows
            Swinburne university student to log in and create teams for the subjects they are
            enrolled in. Students can also join into another team if they are interested.">
    <meta name="keywords" content="SwinEDC, Swinburne, University of technology,
    Swinburne hawthorn, team, Swinteam, EDC, Akmal, Robyn, Jame">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="period">
    <meta name="language" content="English">
    <meta name="author" content="Robyn, James and Akmal">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
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
            <li><a href="register.php">Register</a> </li>
            <li><a href="login.php">Login</a> </li>
            <li><a href="home.php">Home</a> </li>
        </ul>
    </div>
</nav>
<br>
<br>
<h5 style="float: right">User: 
<?php echo $_SESSION['sessionuser'];
echo "<form style='float: right'><input type='submit' style='width:100%' name='logout' value='Log out'></form>";
?>
</h5>


<br>
<br>
<br>
<div style="overflow: auto;">
    <div class="intro" style="float: left">

        <h3>Our vision</h3>
        <p style="width:40em;">
            Our vision is to create a comprehensive web application capable of allowing
            Swinburne students of all education levels to easily collaborate and form
            groups with one another. We aim to help these students in increasing their
            ease of life by giving them the simplest opportunity to create groups for
            specific subjects, specific grades at specific times. Swinedc will assist
            students in creating groups ahead of time without the physical tutorial
            constraints.
        </p>

    </div>

</div>

 <footer>
        <div id="footer" style="text-align: center">
            <p><b>SwinEDC &copy; is created by Robyn, James and Akmal</b></p>

            <div id="footer">
                <ul >
                    <li><a href="help.php">Help</a> </li>
                    <li><a href="register.php">Register</a> </li>
                    <li><a href="login.php">Login</a> </li>
                    <li><a href="home.php">Home</a> </li>
                </ul>

            </div>

        </div>

		

    </footer>


</body>



</html>