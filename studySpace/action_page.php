<?php
	session_start();
// change the value of $dbuser and $dbpass to your username and password
	include '../connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	// Escape user inputs for security
	$startTime = mysqli_real_escape_string($conn, $_POST['sTime']);
	$endTime = mysqli_real_escape_string($conn, $_POST['eTime']);
	$date = mysqli_real_escape_string($conn, $_POST['cday']);
	$roomId = 0;//mysqli_real_escape_string($conn, $_POST['roomNum']);
	$onid = $_SESSION["onid"];

	for($i = 6; $i < 9 ; $i++){
		$calId[$i] = $onid[$i];
	}

	$calId = implode("", $calId);// Array to string
	$tag = rand(100,999); // Fix this, could lead to same calendar ID's
	$calId .= $tag;
	$query_cal = "INSERT INTO Project_Calendar (Calendar_ID, Room_ID, OSU_ID) VALUES ('$calId', '$roomId', '$onid')";
	if (mysqli_query($conn, $query_cal)){

		$query_res = "INSERT INTO Project_Reservation (OSU_ID, Calendar_ID, Start_Time, End_Time, Date) VALUES ('$onid', '$calId', '$startTime', '$endTime', '$date')";
		if (mysqli_query($conn, $query_res)){
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
