<?php
	session_start();
// change the value of $dbuser and $dbpass to your username and password
	include '../connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	// Escape user inputs for security
	$startTime = mysqli_real_escape_string($conn, $_POST['sTimeMod']);
	$endTime = mysqli_real_escape_string($conn, $_POST['eTimeMod']);
	$date = mysqli_real_escape_string($conn, $_POST['cdayMod']);
	$calId = mysqli_real_escape_string($conn, $_POST['calId']);

	$roomId = 0;
	$onid = $_SESSION["onid"];

	$query = "UPDATE Project_Reservation SET Start_Time = '$startTime', End_Time = '$endTime', Date='$date' WHERE Calendar_ID = '$calId'";

	if (mysqli_query($conn, $query)){
		header("Location: reserve.php");
	}
	else{
		echo "<div>ERROR: " . mysqli_error($conn) ."</div><a href='signUp.php' class='back_button'>Back</a> ";
	}

	mysqli_close($conn);
?>

</body>
</html>
