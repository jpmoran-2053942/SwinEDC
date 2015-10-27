<?php
session_start();
	if(isset($_GET['logout']))
	{
		unset($_SESSION["sessionuser"]);  
		header("Location: login.php");
	}
?>
<html>
	<head>
        <meta charset="UTF-8">
        <title>SwinEDC - My groups</title>
        <meta name="description" content="This page depicts the groups you are a member of and the teams
        you have created">
        <meta name="keywords" content="SwinEDC, Swinburne, University of technology, SwinEDC groups,
        SwinEDC my, Swinburne hawthorn, team, Swinteam, EDC, Akmal, Robyn, Jame">
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
<h4 style="float: right">User: 
<?php echo $_SESSION['sessionuser'];
echo "<form style='float: right'><input type='submit' name='logout' value='Log out'></form>";
?>
</h4>
<br>
<br>
<br>
	<h1>My Groups</h1>
	<p>Below is a list of all the groups that you are currently a member of</p>

	 


<?php

	$username = $_SESSION['sessionuser'];
	//Initialise variables for database connection
	$host = "fdb14.biz.nf";
	$user = "1971863_student";
	$password = "swinedc123";
	$database = "1971863_student";
		
	//Create database connection
	$connection = mysqli_connect($host, $user, $password) or die ("Failed to connect to the server");
	//Select the database for the connection
	@mysqli_select_db($connection, $database) or die ("Database not available");
	
		//Create query for finding the groups the student is a member of
		$query = "select * from Groups where Username='$username' ";
		$results = mysqli_query($connection, $query);
		
		//Check to see if any groups matching the criteria exist
		if (mysqli_num_rows($results) == 0)
		{
			echo "You do not belong to any groups";
		}
		
		if (mysqli_num_rows($results) >= 1 ) {
			$rows = mysqli_fetch_row($results);
			
			
			//loop through the result of group numbers to display all members
			while($rows) 
			{
		
				//Create the query and receiving variable for select statement
				$query1 = "select * from Groups where GNo={$rows[1]} " ;
				$results1 = mysqli_query($connection, $query1);
				
				if (mysqli_num_rows($results1) >= 1)
				{
				
					$row = mysqli_fetch_row($results1);
					
					//Create table
					echo "<table width='100%' border='1'>" ;
					echo "<th>Group Number</th><th>Subject Name</th><th>Unit Code</th><th>Semester</th><th>Year</th><th>Target Grade</th><th>User Name</th>";
					
					//Populate the table with values from the Groups table
					while ($row)
					{
						echo "<tr><td>{$row[1]}</td>";
						echo "<td>{$row[2]}</td>";
						echo "<td>{$row[3]}</td>";
						echo "<td>{$row[4]}</td>";
						echo "<td>{$row[5]}</td>";
						echo "<td>{$row[6]}</td>";
						echo "<td>{$row[8]}</td></tr>";
						$row = mysqli_fetch_row($results1);
					}
					echo "</table><br>";
				}
				$rows = mysqli_fetch_row($results);
			}
		}
?>
<footer>
        <div id="footer" style="text-align: center">
            <p><b>SwinEDC &copy; is created by Robyn, James and Akmal</b></p>

            <div id="footer">
                <ul >
                    <li><a href="help.html">Help</a> </li>
					<li><a href="mygroups.php">My groups</li>
					<li><a href="profile.html">Profile</a> </li>
					<li><a href="search.php">Search</a> </li>
					<li><a href="home.html">Home</a> </li>
                </ul>

            </div>

        </div>

		

    </footer>

</body>


</html>