<html>
	<head>
		<title>My Groups</title>
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
            <li><a href="mygroups.php">My groups</li>
            <li><a href="profile.html">Profile</a> </li>
            <li><a href="search.php">Search</a> </li>
            <li><a href="home.html">Home</a> </li>
        </ul>
    </div>
</nav>

	<h1>My Groups</h1>
	<p>Below is a list of all the groups that you are currently a member of</p>
</body>
</html>

<?php

	$sid = 4931645;
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
		$query = "select * from Groups where SID='$sid' ";
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