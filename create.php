<!DOCTYPE html>
<head>
<style>
	html{
  	  background-image:url(images/justinBissonBeck.jpg);
  	  background-repeat:no-repeat;
  	  background-size:contain;
  	  -webkit-background-size:cover;
  	  -moz-background-size:cover;
  	  -o-background-size:cover;
 	  background-size:cover;
 	  font-family:'Helvetica Neue', sans-serif;	
	}
	.button {
   	  background-color: #D85A1A;
   	  border: none;
   	  color: #000000;
   	  padding: 15px 32px;
  	  text-align: center;
  	  text-decoration: none;
   	  display: inline-block;
   	  font-size: 16px;
   	  margin: 4px 2px;
   	  cursor: pointer;
  	  float: center;
	  position: relative;
	}
</style>

</head>
<body>
<?php
	include 'connectvarsEECS.php';// User credentials

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}
// Escape is used for input security
	$sUsername = mysqli_real_escape_string($conn, $_POST['sUsername']);
	$sFirstName = mysqli_real_escape_string($conn, $_POST['sFirstName']);
	$sLastName = mysqli_real_escape_string($conn, $_POST['sLastName']);
	$sEmail = mysqli_real_escape_string($conn, $_POST['sEmail']);
	$sPassword = mysqli_real_escape_string($conn, $_POST['sPassword']);
	$sAge = mysqli_real_escape_string($conn, $_POST['sAge']);
	

	// Tries to insert the query
		$salt = rand(10000,90000);// Creates a random salt
		$sPassword .= (string) $salt;
		echo "$saltPassword";
		$passwordmd5 = md5($sPassword);
		$query = "INSERT INTO Users (sUsername, sFirstName, sLastName, sEmail, sPassword, sAge, salt) VALUES ( '$sUsername', '$sFirstName', '$sLastName', '$sEmail', '$passwordmd5', '$sAge', '$salt')";
		if (mysqli_query($conn, $query)){
			echo "User Created.";
		}
		else{
			echo "ERROR: " . mysqli_error($conn);
		}
	}
	mysqli_close($conn)
?>
<a href="index.html" class="button">Back</a>
</body>
</html>
