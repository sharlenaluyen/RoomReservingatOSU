<html>
  <head>
	<link rel="stylesheet" href="css/master.css"/>
        <link rel="stylesheet" href="css/index.css"/>
  </head>
  <body>
    <div id="signUp">
      <form action="create.php" method="post">
        <h2>Sign Up</h2>
        <input type="text" for="sOSU_ID" name="sOSU_ID" id="sOSU_ID" placeholder="Enter OSU ID"/>
        <input type="text" id="sUserName" name="sUserName" id="sUserName" placeholder="Enter Username"/>
        <input type="text" for="sName" name="sName" id="sName" placeholder="Enter your name"/>
	<input type="password" for="sPassword" name="sPassword"id="sPassword" placeholder="Enter Password"/>
	<input type="submit" id="signUp-btn" value="Sign Up">
      </form>
      <div>
	 <h1>Already a user?</h1>
        <button onclick="document.getElementById('id01').style.display='block'">Login</button>
      </div>
        <form action="../index.php" method="get">
          <input type="submit" value="Back">
        </form>
    </div>
    </div>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/img_avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
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
