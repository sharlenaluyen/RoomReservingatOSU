<?php
	session_start();
?>
<!doctype html>
<html lang="en">
  <head>
  <link href= "https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <link href = "https://fonts.googleapis.com/css?family=BreeSerif" rel = "stylesheet">

    <meta charset="utf-8">
    <title>Room Reservation</title>
    <link rel="stylesheet" href="../loginStuff/index.css" media="screen">
    <link rel="stylesheet" href="../loginStuff/cover.css" media="screen">

    <title>Cover Template for Bootstrap</title>

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
  </head>

  <body>

  <header>
      <a href="../loginStuff/account.php"><h1 class="site-title"><i class=""></i>My Account</h1></a>

      <nav class="navbar">
      <ul class="navlist">
      <?php
       if ($_SESSION["usr"] != ""){
        echo "<li class='navitem navlink'><a>Logged in as " . $_SESSION["usr"] . "</a></li>"; //href='#'
       }
      ?>
          <li class="navitem navlink"><a href="../index.php">Home</a></li>
      <?php
      if($_SESSION["usr"] == ""){
        echo "<li class='navitem navlink'><a href='../loginStuff/signUp.php'>My Account</a></li>";
      }
      else{
        echo "<li class='navitem navlink'><a href='../studySpace/reserve.php'>Find a Study Space</a></li>";

      }
      ?>
          <li class="navitem navlink"><a href="../aboutUs.php">About Us</a></li>
        </ul>
      </nav>
    </header>

	  <main role="main" class="inner cover">

    <p class="lead">Account Details: <br> <p>
    <p class="lead">
      <!--<a href="#" class="btn btn-lg btn-secondary">Learn more</a>-->
    </p>
	  <?php
		echo "<h1 class='cover-heading'> Student ONID: " . $_SESSION["onid"] . "</h1";
	  ?>

	  </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
