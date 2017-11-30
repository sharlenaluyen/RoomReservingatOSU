<?php
	session_start();
?>
<!doctype html>
<html lang="en">
  <head>
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
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <header class="masthead clearfix">
	  <div class="inner">
	  <?php
		echo "<h3 class='masthead-brand'>Username: " . $_SESSION["usr"] . "</h3>"; 
	  ?>
              <nav class="nav nav-masthead">
                <a class="nav-link" href="../index.php">Home</a>
                <a class="nav-link active" href="#">Settings</a>
                <a class="nav-link" href="signOut.php">Sign Out</a>
              </nav>
            </div>
          </header>

	  <main role="main" class="inner cover">
		<button onclick="document.getElementById('id01').style.display='block'">Change password</button>
	  </main>

        </div>

      </div>

    </div>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="passUpdate.php" method="post">
    <div class="container">
      <label><b>Old Password</b></label>
      <input type="text" placeholder="Enter Old Password" name="old_psw" required>

      <label><b>New Password</b></label>
      <input type="password" placeholder="Enter New Password" name="new_psw" required>
        
      <button type="submit">Update</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script>
      var modal = document.getElementById('id01');
      window.onclick = function(event){
	if (event.target == modal){
		modal.style.display = "none";
	}
      }
    </script>
  </body>
</html>
