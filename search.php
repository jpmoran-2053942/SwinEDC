<html>
	<head>
		<title>Search Groups</title>
	</head>
<body>
	<h1>Search Groups</h1>
	<form method="get">
		<fieldset>
			<legend>Fill in the fields below to search for a group</legend>
				<label>Subject Name:<input type="text" name="subjectname"></label><br>
				<label>Unit Code:<input type="text" name="unitcode"></label><br>
				<label>Semester:
				<select name="semester">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="summer">Summer</option>
					<option value="winter">Winter</option>
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
</body>
</html>

<?php
if (isset($_GET['subjectname']) && isset($_GET['unitcode']) && isset($_GET['semester']) && isset($_GET['year']) && isset($_GET['targetgrade']))
{
	
	$subjectname = $_GET['subjectname'];
	$unitcode = $_GET['unitcode'];
	$semester = $_GET['semester'];
	$year = $_GET['year'];
	$targetgrade = $_GET['targetgrade'];
	$username = abcd1234;
	
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
		$query = "select * from Groups where SubjectName='$subjectname' and UnitCode='$unitcode' and Semester='$semester' and Year='$year' and TargetGrade='$targetgrade' " ;
		$results = mysqli_query($connection, $query);

		//Check to see if any groups matching the criteria exist
		if (mysqli_num_rows($results) == 0)
		{
			echo "There are no groups matching your search. Try searching again or create your own group.";
		}
		
		if (mysqli_num_rows($results) >= 1)
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
				echo "<td><input type='submit' name={$row[0]} value='Join'></td></tr>";
				$row = mysqli_fetch_row($results);
			}
			echo "</table>";
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
		}
		
		//If student is not already a member of a group for a specific unit code, create a new group
		if (mysqli_num_rows($results) == 0)
		{
			$gid = $username . $unitcode;
			$insertquery = "insert into Groups (GID, SubjectName, UnitCode, Semester, Year, TargetGrade, Username, Admin) 
			values('$gid', '$subjectname', '$unitcode', '$semester', '$year', '$targetgrade', '$username', 'Y')";
			$insertresults = mysqli_query($connection, $insertquery);
			if (!$insertresults)
			{
				echo "Error creating group";
			}
			else 
			{
				echo "Group successfully created. You can view this group and your members from the mygroups page";
			}
		}
	}
}


?>
