<?php
	session_start();
	//Remove any potentially dangerous characters from inputs.
	function sanatise_input($input) {
		return htmlspecialchars(stripslashes(trim($input)));
	}
	
	$username = sanatise_input($_POST["username"]);
	$password = sanatise_input($_POST["password"]);
	$_SESSION['sessionuser'] = $username;
	
	$error = "";
	$usernamefound = false;
	$passwordmatch = false;
	
	require_once ("dbsettings.php"); //connection info

	$conn = @mysqli_connect("fdb14.biz.nf", "1971863_student","swinedc123","1971863_student");
	
	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p>Database connection failure</p>"; // not in production script
	} else {
		// Upon successful connection
		
		// Set up the SQL command to add the data into the table
		$query = "select username, password FROM user";
		
		// execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
		
		// checks if the execution was successful
		if(!$result) {
			echo "<p>Something is wrong with ", $query, "</p>";
		} else {
			while ($row = mysqli_fetch_assoc($result)){
				if ($username == $row["username"]) {
					$usernamefound = true;
					if ($password == $row["password"]) {
						$passwordmatch = true;
					}
					break;
				}
			}
			
			if (!$passwordmatch) {
				$error = "Incorrect password.";
			}
			if (!$usernamefound) {
				$error = "Invalid username.";
			}
				
			// Frees up the memory, after using the result pointer
			mysqli_free_result($result);
			
		} // if successful query operation
		
		// close the database connection
		mysqli_close($conn);
	} // if successful database connection
        
	if ($error == "") {
		//Needs to pass login data.
		header("location:../../logincomplete.php");
		exit();
	} else {
		//Passes the error message as a GET.
		header("location:../../login.php?error=$error");
	}
?>