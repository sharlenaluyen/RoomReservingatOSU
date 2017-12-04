<!DOCTYPE html>
<html>
  <head>

    <link href= "https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <link href = "https://fonts.googleapis.com/css?family=BreeSerif" rel = "stylesheet">

    <link rel="stylesheet" href="css/master.css"/>
    <link rel="stylesheet" href="css/index.css"/>

    <meta charset="utf-8">
    <title>Room Reservation</title>
    <link rel="stylesheet" href="index.css" media="screen">

  </head>

  <body>

    <header>
      <a href="../index.php"><h1 class="site-title"><i class=""></i>Reserve a Room on OSU's Campus</h1></a>

      <nav class="navbar">
  <ul class="navlist">
    <?php
       if ($_SESSION["usr"] != ""){
        echo "<li class='navitem navlink'><a href='#'>Logged in as " . $_SESSION["usr"] . "</a></li>";
       }
    ?>
          <li class="navitem navlink active"><a href="../index.php">Home</a></li>
    <?php
    if($_SESSION["usr"] == ""){
        echo "<li class='navitem navlink'><a href='signUp.php'>My Account</a></li>";
    }
    else{
      echo "<li class='navitem navlink'><a href='account.php'>My Account</a></li>";
    
      echo "<li class='navitem navlink'><a href='studySpace/reserve.php'>Find a Study Space</a></li>";

      echo "<li class='navitem navlink'><a href='down.html'>Edit a Study Space</a></li>";
    }
    ?>
          <li class="navitem navlink"><a href="../aboutUs.php">About Us</a></li>
        </ul>
      </nav>
    </header>
    <div id="signUp">
      <form action="create.php" method="post">
        <h2>Sign Up</h2>
        <input type="text" for="sOSU_ID" name="sOSU_ID" id="sOSU_ID" placeholder="Enter OSU ID"/>
        <input type="text" id="sUserName" name="sUserName" id="sUserName" placeholder="Enter Username"/>
        <input type="text" for="sName" name="sName" id="sName" placeholder="Enter your name"/>
	<input type="password" for="sPassword" name="sPassword" id="sPassword" placeholder="Enter Password"/>
	<input type="submit" id="signUp-btn" value="Sign Up">
      </form>
      <div>
	 <h1>Already a user?</h1>
        <button onclick="document.getElementById('id01').style.display='block'">Login</button>
      </div>
       <!--  <form action="../index.php" method="get">
          <input type="submit" value="Back">
        </form> -->
    </div>
    </div>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="action_page.php" method="post">
    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button class="sub_btn" type="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
  </body>
</html>
