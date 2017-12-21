<?php
	include '../connectvarsEECS.php';// User credentials

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}
// Escape is used for input security
	$sOSU_ID = mysqli_real_escape_string($conn, $_POST['sOSU_ID']);
	$sUserName = mysqli_real_escape_string($conn, $_POST['sUserName']);
	$sName = mysqli_real_escape_string($conn, $_POST['sName']);
	$sPassword = mysqli_real_escape_string($conn, $_POST['sPassword']);

// Tries to insert the query
		$salt = rand(10000,90000);// Creates a random salt
		$sPassword .= (string) $salt; // Salt the password
		echo "$saltPassword";
		$passwordmd5 = md5($sPassword);// Hash the password
// Insert query for a new user
		$query = "INSERT INTO Project_Users (OSU_ID, Username, Student_Name, Password, salt) VALUES ( '$sOSU_ID', '$sUserName', '$sName','$passwordmd5', '$salt')";
		if (mysqli_query($conn, $query)){
			session_start();
			$_SESSION["usr"] = $sUserName;
			$_SESSION["onid"] = $sOSU_ID;
			header("Location: ../index.php");//Send the user to the home page
		}
		else{
			echo "<div>ERROR: " . mysqli_error($conn) ."</div><a href='signUp.php' class='back_button'>Back</a> ";
		}
	mysqli_close($conn);
?>
</body>
</html>
