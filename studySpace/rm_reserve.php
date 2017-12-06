<?php
	session_start();
// change the value of $dbuser and $dbpass to your username and password
	include '../connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$calId = mysqli_real_escape_string($conn, $_POST['calIdRm']);

	$roomId = 0;
	$onid = $_SESSION["onid"];

	$query_res = "DELETE FROM Project_Reservation WHERE Calendar_ID = '$calId'";
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
