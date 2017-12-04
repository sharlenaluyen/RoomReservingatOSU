<?php
	session_start();
?>
<!DOCTYPE html>
<html>
  <head>

    <link href= "https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

	  <link href = "https://fonts.googleapis.com/css?family=BreeSerif" rel = "stylesheet">

    <link rel="stylesheet" href="studyspace.css" media="screen">

    <meta charset="utf-8">
    <title>Find a Study Space</title>
    <link rel="stylesheet" href="studyspace.css">

  </head>

  <body>
    <header>
      <a href="#"><h1 class="site-title"><i class=""></i>Find a Study Space</h1></a>
      <a href="#"><h1 class="page-title">Home</h1></a>

      <nav class="navbar">
	<ul class="navlist">
<?php
	   if ($_SESSION["usr"] != ""){
	    	echo "<li class='navitem navlink'><a href='#'>Logged in as " . $_SESSION["usr"] . "</a></li>";
	   }
	   else{
			 	echo "<li class='navitem navlink'><a href='loginStuff/signUp.php'>Login</a></li>";
	   }

		 require 'calendar.php';

		 echo '<h2>July 2009</h2>';
		 echo draw_calendar(7,2009);
?>
          <li class="navitem navlink"><a href="index.php">Home</a></li>
	        <li class="navitem navlink"><a href="loginStuff/signUp.php">My Account</a></li>
          <li class="navitem navlink active"><a href="studyspace.php">Find a Study Space</a></li>
          <li class="navitem navlink"><a href="#">Edit a Study Space</a></li>
          <li class="navitem navlink"><a href="aboutUs.php">About Us</a></li>
          <li class="navitem navbar-search">
            <input type="text" id="navbar-search-input" placeholder="Search...">
            <button type="button" id="navbar-search-button"><i class="fa fa-search"></i></button>
          </li>
        </ul>
      </nav>
    </header>



  </body>
</html>
