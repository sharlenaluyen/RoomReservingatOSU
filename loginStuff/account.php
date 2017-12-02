<?php
	session_start();
?>
<!doctype html>
<html lang="en">
  <head>
  <link href= "https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <link href = "https://fonts.googleapis.com/css?family=BreeSerif" rel = "stylesheet">

    <link rel="stylesheet" href="index.css" media="screen">

    <meta charset="utf-8">
    <title>Room Reservation</title>
    <link rel="stylesheet" href="index.css" media="screen">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Cover Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css" media="screen">
  </head>

  <body>

  <header>
      <a href="../index.php"><h1 class="site-title"><i class=""></i>Reserve a Room on OSU's Campus</h1></a>

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

      echo "<li class='navitem navlink'><a href='down.html'>Edit a Study Space</a></li>";
    }
    ?>
          <li class="navitem navlink"><a href="aboutUs.php">About Us</a></li>
        </ul>
      </nav>
    </header>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <header class="masthead clearfix">
	  <div class="inner">
	  <?php
		echo "<h3 class='masthead-brand'>Username: " . $_SESSION["usr"] . "</h3>"; 
	  ?>
              <nav class="nav nav-masthead">
                <a class="navv-link active" href="../index.php">Home</a>
                <a class="navv-link" href="userSettings.php">Settings</a>
                <a class="navv-link" href="signOut.php">Sign Out</a>
              </nav>
            </div>
          </header>

	  <main role="main" class="inner cover">
	  <?php
		echo "<h1 class='cover-heading'> Student ONID: " . $_SESSION["onid"] . "</h1";
	  ?>
            <p class="lead">This is your account page<p>
            <p class="lead">
              <!--<a href="#" class="btn btn-lg btn-secondary">Learn more</a>-->
            </p>
	  </main>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
