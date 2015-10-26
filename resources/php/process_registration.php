<?php
	//Remove any potentially dangerous characters from inputs.
	function sanatise_input($input) {
		return htmlspecialchars(stripslashes(trim($input)));
	}
	
	//Convert username to lowercase only to avoid duplicate keys.
	$username = strtolower(sanatise_input($_POST["username"]));
	$password = sanatise_input($_POST["password"]);
	$fname = sanatise_input($_POST["fname"]);
	$sname = sanatise_input($_POST["sname"]);
	$course = sanatise_input($_POST["course"]);
	
	//database accepts format: 2011-01-12 00:00:00
	list($month, $year) = explode("-", $_POST["yearstarted"]);
	while (strlen($year) < 4) {
	//Assumes all users started after the year 2000.
		$year = "20" . $year;
	}
	while (strlen($month) < 2) {
		$month = "0" . $year;
	}
	$yearstarted = $year . "-" . $month . "-" . "01 00:00:00";
	
	
	$error = "";
	
	require_once ("dbsettings.php"); //connection info

	$conn = @mysqli_connect("fdb14.biz.nf", "1971863_student","swinedc123","1971863_student");
	
	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>"; // not in production script
	} else {
		// Upon successful connection
		
		// Set up the SQL command to add the data into the table
		$query = "select username FROM user";
		
		// execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
		
		// checks if the execution was successful
		if(!$result) {
			echo "<p>Something is wrong with ", $query, "</p>";
		} else {
			while ($row = mysqli_fetch_assoc($result)){
				if ($username == $row["username"]) {
					$error .= "That username is already in use.";
				}
			}
			// Frees up the memory, after using the result pointer
			mysqli_free_result($result);
		} // if successful query operation
		
		//If there was no error detected...
		if ($error == "") {
			$query = "insert into user (username, password, firstname, surname, course, yearstarted) values ('$username', '$password', '$fname', '$sname', '$course', '$yearstarted')";
                        
                        $result = mysqli_query($conn, $query);
			// checks if the execution was successful
			if(!$result) {
				echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>"; //Would not show in a production script
			}
		}
		
		// close the database connection
		mysqli_close($conn);
	} // if successful database connection
        
	if ($error == "") {
		//Needs to start login session.
		header("location:../../registercomplete.php");
	} else {
		//Passes the error message as a GET.
		header("location:../../registererror.php?error=$error");
	}
?>