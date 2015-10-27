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
    <title>SwinEDC Help</title>
    <meta name="description" content="This is the help page of SwinEDC. This page shows users
        how to log in, register, create a new team, join a new team, approve members to the team,
        change his/her information and how to saerch for a team.">
    <meta name="keywords" content="SwinEDC, Swinburne, University of technology,
     SwinEDC help,Swinburne hawthorn, team, Swinteam, EDC, Akmal, Robyn, Jame">
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
<h4 style="float: right">User: 
<?php echo $_SESSION['sessionuser'];
echo "<form style='float: right'><input type='submit' name='logout' value='Log out'></form>";
?>
</h4>
<br>


    <h1>Help</h1>

    <h3>What SwinEDC is</h3>
    <p>Our vision is to create a comprehensive web application capable of allowing
        Swinburne students of all education levels to easily collaborate and form
        groups with one another. We aim to help these students in increasing their
        ease of life by giving them the simplest opportunity to create groups for
        specific subjects, specific grades at specific times. Swinedc will assist
        students in creating groups ahead of time without the physical tutorial
        constraints. </p>
    <br>
    <hr>
    <h3>How to use SwinEDC</h3>

    <div style="margin-left: 20px">
        <h4>Step 1 : Register to SwinEDC</h4>
        <p>Students who wish to use SwinEDC to find teammates for their assignments or find
            a team, they must register into SwinEDC first. To register use the link below
            <br>
            <br>
            <a href="register.php">Register</a>
        </p>

        <h4>Step 2 : login into SwinEDC</h4>
        <p>After registration students can login in to SwinEDC. After logging in students are able
            to create their own team for a subject or a student can view teams for other subjects</p>

            <a href="login.php">Log in</a>
        <h4>Step 3 : Create a new team</h4>
        <p>A student can create their own team for a subject. When a student creates a team
            he/she automatically becomes the team leader in that team. Students can create
            their own team using the below link
            <br>
            <br>
            <a href="search.php">New team</a> </p>

        <h4>Step 4 : Accept students who applied to be on your team</h4>
        <p> After a student creates a team, other SwinEDC users will be able to look up your
            team. After some time you can view the students who wish to join your team, you will
            be able to accept who you want to be in your team.</p>
			<br>
			<br>
			<a href="mygroups.php">My groups</a>
        <h4>Step 5 : Searching a team</h4>
        <p> Any user is able to search for teams in the current semester as well as the next semester
            . A user can search teams using the following link
            <br>
            <br>
            <a href="search.php">Search</a> </p>

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