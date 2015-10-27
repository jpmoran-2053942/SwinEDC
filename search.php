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
		<meta charset="utf-8"/>
    <title>SwinEDC - Search</title>
    <meta name="description" content="This is the saerch page, allows you to search for groups">
    <meta name="keywords" content="SwinEDC, Swinburne, University of technology, Swinburne register, Swinburne hawthorn, team, Swinteam, EDC, Akmal, Robyn, Jame">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="period">
    <meta name="language" content="English">
    <meta name="author" content="Robyn, James and Akmal">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="updated" content="26/10/2015">
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
            <li><a href="help.html">Help</a> </li>
            <li><a href="mygroups.php">My groups</li>
            <li><a href="profile.html">Profile</a> </li>
            <li><a href="search.php">Search</a> </li>
            <li><a href="home.html">Home</a> </li>
        </ul>
    </div>
</nav>
<br>
<br>
<h5>User: 
<?php echo $_SESSION['sessionuser'];
echo "<form style='float: right'><input type='submit' style='width:100%' name='logout' value='Log out'></form>";
?>
</h5>
<br>
<br>
<br>
	<h1>Search Groups</h1>
	<form method="get">
		<fieldset>
			<legend>Fill in the fields below to search for a group</legend>
				<label>Unit Code:
				<?php
				//Initialise variables for database connection
				$host = "fdb14.biz.nf";
				$user = "1971863_student";
				$password = "swinedc123";
				$database = "1971863_student";
					
				//Create database connection
				$conn = mysqli_connect($host, $user, $password) or die ("Failed to connect to the server");
				//Select the database for the connection
				@mysqli_select_db($conn, $database) or die ("Database not available");
				
				//This select dropdown needs to be populated by the Unit table so students can select valid units to create groups for
				$units = "select * from Unit";
				$res = mysqli_query($conn, $units);
				echo "<select name= 'unitcode'>";
				$row = mysqli_fetch_row($res);
				print_r($row);
				while ($row)
				{
				echo "<option value={$row[0]}>";
				echo "{$row[0]}</option>";
				$row = mysqli_fetch_row($res);
				}
				echo "</select><br>";
				?>
				<label>Semester:
				<select name="semester">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="Summer">Summer</option>
					<option value="Winter">Winter</option>
				</select>
				</label><br>
				<label>Year:
				<select name="year">
					<option value="2016">2016</option>
					<option value="2017">2017</option>
				</select>
				</label><br>
				<label>Target Grade:
				<select name="targetgrade">
					<option value="pass">Pass</option>
					<option value="credit">Credit</option>
					<option value="distinction">Distinction</option>
					<option value="highdistinction">High Distinction</option>
				</select>
				</label><br>
				<input type="submit" name="search" value="Search">
		</fieldset>
		<p>If your search doesn't return what you are looking for, click the button below to create your own group!</p>
		<input type="submit" name="create" value="Create Group">
	</form>




<?php
if (isset($_GET['semester']) && isset($_GET['year']) && isset($_GET['targetgrade']))
{
	$groups = array();
	$unitcode = $_GET['unitcode'];
	$semester = $_GET['semester'];
	$year = $_GET['year'];
	$targetgrade = $_GET['targetgrade'];
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
	
	if (isset($_GET['search']))
	{
		
		//Create the query and receiving variable for select statement
		$query = "select * from Groups where UnitCode='$unitcode' and Semester='$semester' and Year='$year' and TargetGrade='$targetgrade' and Admin='Y' " ;
		$results = mysqli_query($connection, $query);

		//Check to see if any groups matching the criteria exist
		if (mysqli_num_rows($results) == 0)
		{
			echo "There are no groups matching your search. Try searching again or create your own group.";
			die();
		}
		
		else// (mysqli_num_rows($results) >= 1)
		{
		
			$row = mysqli_fetch_row($results);
			//Create table
			echo "<table width='100%' border='1'>" ;
			echo "<th>Group Number</th><th>Subject Name</th><th>Unit Code</th><th>Semester</th><th>Year</th><th>Target Grade</th><th>Join Group</th>";
			
			//Populate the table with values from the Groups table
			while ($row)
			{
				echo "<tr><td>{$row[1]}</td>";
				echo "<td>{$row[2]}</td>";
				echo "<td>{$row[3]}</td>";
				echo "<td>{$row[4]}</td>";
				echo "<td>{$row[5]}</td>";
				echo "<td>{$row[6]}</td>";
				echo "<td><form method='post' ><input type='submit' style='width:100%' name='{$row[1]}' value='Join Group {$row[1]}'></form></td></tr>";
				$groups[] = $row[1];
				
				$row = mysqli_fetch_row($results);
			}
			echo "</table></form>";
		}
	}
	
	if (isset($_GET['create']))
	{
		
		//Create the query and receiving variable for select statement
		$query = "select * from Groups where Username='$username' and UnitCode='$unitcode'" ;
		$results = mysqli_query($connection, $query);
		
		//Check to see if student is already a member of a group for that unit code
		if (mysqli_num_rows($results) == 1)
		{
			echo "You are already a member of a group for that subject";
			die();
		}
		
		//If student is not already a member of a group for a specific unit code, create a new group
		if (mysqli_num_rows($results) == 0)
		{
			$gid = $username . $unitcode;
			
			//Get the unit name for the subject code selected
			//This comes from the Unit table
			$namequery = "select Title from Unit where UnitID = '$unitcode'";
			$result = mysqli_query($connection, $namequery);
			$row = mysqli_fetch_row($result);
			
			$insertquery = "insert into Groups (GID, SubjectName, UnitCode, Semester, Year, TargetGrade, Username, Admin) 
			values('$gid', '$row[0]', '$unitcode', '$semester', '$year', '$targetgrade', '$username', 'Y')";
			$insertresults = mysqli_query($connection, $insertquery);
			if (!$insertresults)
			{
				echo "Error creating group";
				die();
			}
			else 
			{
				echo "Group successfully created " . $username .". You can view this group and your members from the mygroups page";
				die();
			}
		}
	}
	
	//This loop iterates through the lowest group number in the db to the highest
	for($i = min($groups); $i <= max($groups); $i++)
	{
		//This is seeing which group number's "Join" button was clicked as each as a unique name corresponding to group number
		if(isset($_POST[$i]))
		{
			//This select query returns the specific group information so a user can be added
			$gquery = "select * from Groups where GNo = '$i' ";
			$gres = mysqli_query($connection, $gquery);
			$grows = mysqli_fetch_row($gres);

			$gid = $username. $unitcode;
			
			//Insert query for inserting a new student into an existing group
			$joinquery = "insert into Groups (GID, GNo, SubjectName, UnitCode, Semester, Year, TargetGrade, Username, Admin)
			values ('$gid', '$i', '{$grows[2]}', '{$grows[3]}', '{$grows[4]}', '{$grows[5]}', '{$grows[6]}', '$username', 'N')";
			$joinres = mysqli_query($connection, $joinquery);
			
			//Error handling
			if(!$joinres)
			{
				echo mysqli_errno($connection) . ": " . mysqli_error($connection) . "\n";
				echo "There was an error joining this group. Please try again or contact an administrator";
				die();
			}
			else
			{
				echo "You have successfully joined a group. You can see all your groups on the mygroups page.";
				die();
			}
		}
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
