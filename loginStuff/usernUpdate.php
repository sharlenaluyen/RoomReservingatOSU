<?php
	session_start();
	include '../connectvarsEECS.php';
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}

	$New_usrn = mysqli_real_escape_string($conn, $_POST['new_usrn']); // Get old password from user
	$Conf_usern = mysqli_real_escape_string($conn, $_POST['conf_usern']); // Get new password from user
	$usr = $_SESSION["usr"];
	$onid = $_SESSION["onid"];

	$query = "SELECT * FROM `Project_Users` WHERE Username = '$usr'"; // Finds the user in the DB
	$result = mysqli_query($conn, $query); // Tie conn to the query, call this result
	$row = mysqli_fetch_assoc($result); // Chop the result into its rows

	$usrname = $row["Username"]; //Get the salt value

	if ($New_usrn == $Conf_usern){ // If password from user and DB match, updates the password in the DB

		$query = "UPDATE Project_Users
			  SET Username='$New_usrn'
			  WHERE OSU_ID = '$onid'";
		if (mysqli_query($conn, $query)){
			$_SESSION["usr"] = $New_usrn;
			header("Location: account.php");
		}
		else{
			echo "<div>ERROR: " . mysqli_error($conn) ."</div><a href='signUp.php' class='back_button'>Back</a> ";
		}
	}
	else{
		 echo "<script>
                   alert('Username did not match.');
                   window.location.href='account.php';
            	   </script>";
	}

?>
