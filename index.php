<?php
	session_start();
?>
<!DOCTYPE html>
<html>
  <head>

    <link href= "https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

	  <link href = "https://fonts.googleapis.com/css?family=BreeSerif" rel = "stylesheet">

    <link rel="stylesheet" href="index.css" media="screen">

    <meta charset="utf-8">
    <title>Room Reservation</title>
    <link rel="stylesheet" href="index.css" media="screen">

  </head>

  <body>
    <header>
      <a href="#"><h1 class="site-title"><i class=""></i>Reserve a Room on OSU's Campus</h1></a>

      <nav class="navbar">
	<ul class="navlist">
	  <?php
	     if ($_SESSION["usr"] != ""){
	     	echo "<li class='navitem navlink'><a>Logged in as " . $_SESSION["usr"] . "</a></li>"; //href='#'
	     }
	  ?>
          <li class="navitem navlink active"><a href="#">Home</a></li>
	  <?php
		if($_SESSION["usr"] == ""){
	  		echo "<li class='navitem navlink'><a href='loginStuff/signUp.php'>My Account</a></li>";
		}
		else{
			echo "<li class='navitem navlink'><a href='loginStuff/account.php'>My Account</a></li>";

			echo "<li class='navitem navlink'><a href='studySpace/reserve.php'>Find a Study Space</a></li>";

		}
	  ?>
          <li class="navitem navlink"><a href="aboutUs.php">About Us</a></li>
        </ul>
      </nav>
    </header>

<div class ="videowrapper">
    <video width="320" height="240" autoplay="" loop="" poster="http://oregonstate.edu/sites/default/files/fall.jpg">
      <source src="http://sites.oregonstate.edu/DONTDELETE/fall.mp4" type="video/mp4">
        <source src="http://sites.oregonstate.edu/DONTDELETE/fall.ogg" type="video/ogg">
          Your browser does not support the video tag. </video>
</div>
  </body>
</html>
