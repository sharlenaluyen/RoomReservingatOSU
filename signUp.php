<!DOCTYPE html>
<html>
<head>
<style>
	<link rel="stylesheet" href="index.css" media="screen">
</style>
</head>
<body>
<h2>Creat a login</h2>
<form action="create.php" method="post">
   <p>
      <label for="sOSU_ID">OSU ID:</label>
      <input type="text" name="sOSU_ID" id="sOSU_ID">
   </p>
   <p>
      <label for="sUserName">Username:</label>
      <input type="text" name="sUserName" id="sUserName">
   </p>
   <p>
      <label for="sName">Name:</label>
      <input type="text" name="sName" id="sName">
   </p>
   <p>
      <label for="sPassword">Password:</label>
      <input type="password" name="sPassword" id="sPassword">
   </p>
   <input type="submit" value="Submit">
</form>
<form action="index.html" method="post">
   <input type="submit" value="Back">
</form>
</body>
</html>
