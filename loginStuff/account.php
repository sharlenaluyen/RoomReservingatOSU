<?php
	session_start();
?>
<!doctype html>
<html lang="en">
  <head>
  <link href= "https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

  <!--  <link href = "https://fonts.googleapis.com/css?family=BreeSerif" rel = "stylesheet">-->

    <meta charset="utf-8">
    <title>Room Reservation</title>
    <link rel="stylesheet" href="css/index.css" media="screen">
    <link rel="stylesheet" href="css/cover.css" media="screen">

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
          <li class="navitem navlink"><a href="../loginStuff/signOut.php">Sign Out</a></li>

        </ul>
      </nav>
    </header>
<?php
	echo "<h1 class='cover-heading'> Student ONID: " . $_SESSION["onid"] . "</h1>";
?>

<button type="button" class="pass_btn" onclick="document.getElementById('id01').style.display='block'">Change Password</button>

<div id="id01" class="modal">
  <form class="modal-content animate" action="passUpdate.php" method="post">
    <div class="container">
      <label><b>Old Password</b></label>
       <input type="text" placeholder="Enter Old Password" name="old_psw" required>
	
	<label><b>New Password</b></label>
	<input type="password" placeholder="Enter New Password" name="new_psw" required>
	<button class="sub_btn" type="submit">Update</button>
      </div>
	
   <div class="container" style="background-color:#f1f1f1">
	<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
<div>
<button type="button" onclick="document.getElementById('id01').style.display='block'">Change Password</button>

<script type="application/javascripti">
	var modal = document.getElementById('id01');
	
	window.onclick = function(event){
		if (event.target == modal){
			modal.style.display = "none";
		}
	}
</script>
  </body>
</html>
