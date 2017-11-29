<?php
	session_start();
// change the value of $dbuser and $dbpass to your username and password
	include '../connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	// Escape user inputs for security
	$user = mysqli_real_escape_string($conn, $_POST['uname']);
	$pass = mysqli_real_escape_string($conn, $_POST['psw']);

// qurery = looks for a sUsername in the Users table 
	$query = "SELECT * FROM `Project_Users` WHERE Username = '$user'";// 'useris unique
	$result = mysqli_query($conn, $query);// Return the results of the crery
	// Look at individual cell da	ta. Should check if query faild, howev cin this 
	// instance it will not fail. data is eather there or not.c

	$row = mysqli_fetch_assoc($result);// Brakes the qurery into one ro
					// Lets use get access to each cell in the row
	$salt = $row["salt"];// Get data from the salt column
	$dbPass = $row["Password"];// Get data from the sPassword column
	$ONID = $row["OSU_ID"];
	
	$pass = md5($pass . $salt);
	// If statment checks if hashed password is the same password in the database
	if ($pass == $dbPass){
		$_SESSION["usr"] = $user;
		$_SESSION["onid"] = $ONID;
		header("Location: ../index.php");
	}
	else{
		echo "Username/Password not found";
		echo "<p>Try again?</p>";
		echo "<form action='signUp.php' method='post'>";
		echo "<input type='submit' value='Back'>";
	}
// Free results
mysqli_free_result($row);
// close connection
mysqli_close($conn);
?>

</body>
</html>
