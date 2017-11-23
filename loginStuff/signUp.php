<html>
  <head>
	<link rel="stylesheet" href="css/master.css"/>
  </head>
  <body>
    <div id="signUp">
      <form action="create.php" method="post">
        <h2>Sign Up</h2>
        <input type="text" for="sOSU_ID" name="sOSU_ID" id="sOSU_ID" placeholder="Enter OSU ID"/>
        <input type="text" id="sUserName" name="sUserName" id="sUserName" placeholder="Enter Username"/>
        <input type="text" for="sName" name="sName" id="sName" placeholder="Enter Username"/>
	<input type="password" for="sPassword" name="sPassword"id="sPassword" placeholder="Enter Password"/>
	<input type="submit" id="signUp-btn" value="Sign Up">
      </form>
      <form>
        <h1>Already a user?</h1>
        <input type="button" id="signUp-btn" value="Login"/>
      </form>
      <form action="../index.html" method="get">
        <input type="submit" value="Back">
      </form>
    </div>
  </body>
</html>
