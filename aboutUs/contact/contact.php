<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/master.css">


    <link href= "https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <link href = "https://fonts.googleapis.com/css?family=BreeSerif" rel = "stylesheet">

    <meta charset="utf-8">
    <title>Room Reservation</title>
  

  </head>
  <body>
  <header>
      <a href="../../index.php"><h1 class="site-title"><i class=""></i>Reserve a Room on OSU's Campus</h1></a>

      <nav class="navbar">
        <ul class="navlist">
          <li class="navitem navlink active"><a href="../../aboutUs.php">About Us</a></li>
          <li class="navitem navlink"><a href="../FAQ/faq.php">FAQ</a></li>
          <li class="navitem navlink"><a href="../contact/contactus.php">Contact Us</a></li>
          </li>
        </ul>
      </nav>
    </header>
    <div class="info-box">
       <h2 class ="sub" >
	CONTACT US
       <h2/>
       <div id="after_submit"></div>
<form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
  <div class="row sub">
    <label class="required" for="name">Your name:</label><br />
    <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
    <span id="name_validation" class="error_message"></span>
  </div>
  <div class="row sub">
    <label class="required" for="email">Your email:</label><br />
    <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
    <span id="email_validation" class="error_message"></span>
  </div>
  <div class="row sub">
    <label class="required" for="message">Your message:</label><br />
    <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
    <span id="message_validation" class="error_message"></span>
  </div>
  <div class="sub">
   <button type="submit">Send Message</button>
   </div>
   <!-- <input class = "sub" id="submit_button" type="submit" value="Send message" /> -->
</form>
       <!-- <div class="icons">
        <a href="../../aboutUs.php" class="button">Back</a>
       </div> -->
    </div>
  </body>
</html>
