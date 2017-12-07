<?php
	session_start();
// change the value of $dbuser and $dbpass to your username and password
	include '../connectvarsEECS.php'; 
// connect to DB	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
// Get the calendar ID to delete
	$calId = mysqli_real_escape_string($conn, $_POST['calIdRm']);

	$roomId = 0;
	$onid = $_SESSION["onid"];
// Query of reservation to delete
	$query_res = "DELETE FROM Project_Reservation WHERE Calendar_ID = '$calId'";
// Querey of calendar ID  to delete
	$query_cal = "DELETE FROM Project_Calendar WHERE Calendar_ID = '$calId'";
	if (mysqli_query($conn, $query_res)){
		if (mysqli_query($conn, $query_cal)){
			header("Location: reserve.php");
		}
		else{
			echo "<div>ERROR: " . mysqli_error($conn) ."</div><a href='signUp.php' class='back_button'>Back</a> ";
		}
	}
	else{
		echo "<div>ERROR: " . mysqli_error($conn) ."</div><a href='signUp.php' class='back_button'>Back</a> ";
	}
	mysqli_close($conn);
?>

</body>
</html>
