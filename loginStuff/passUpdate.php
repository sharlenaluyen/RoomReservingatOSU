<?php
	session_start();
	include '../connectvarsEECS.php';
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}

	$Old_psw = mysqli_real_escape_string($conn, $_POST['old_psw']); // Get old password from user
	$New_psw = mysqli_real_escape_string($conn, $_POST['new_psw']); // Get new password from user
	$usr = $_SESSION["usr"];
	$onid = $_SESSION["onid"];

	$query = "SELECT * FROM `Project_Users` WHERE Username = '$usr'"; // Finds the user in the DB
	$result = mysqli_query($conn, $query); // Tie conn to the query, call this result
	$row = mysqli_fetch_assoc($result); // Chop the result into its rows

	$salt = $row["salt"]; //Get the salt value
	$dbPass = $row["Password"]; //Get the user's current DB password

	$pass = md5($Old_psw . $salt); // Check to see if user entered password matches that in the DB 
	if ($pass == $dbPass){ // If password from user and DB match, updates the password in the DB
		$salt = rand(10000,90000);// Creates a random salt
		$New_psw .= (string) $salt;
		$passwordmd5 = md5($New_psw);

		$query = "UPDATE Project_Users
			  SET salt='$salt', Password='$passwordmd5'
			  WHERE OSU_ID = '$onid'";
		if (mysqli_query($conn, $query)){
			header("Location: account.php");
		}
		else{
			echo "<div>ERROR: " . mysqli_error($conn) ."</div><a href='signUp.php' class='back_button'>Back</a> ";
		}
	}
	else{
		echo "fail";
	}

?>
