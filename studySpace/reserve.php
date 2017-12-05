<?php
	session_start();
	if ($_SESSION["usr"] == ""){
		header("Location: ../index.php");
	}
	$onid = $_SESSION["onid"];

	function draw_calendar($month,$year){

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">', $headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	$day_count = 1;
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day" id='. $day_count++ .' onclick="document.getElementById(\'id01\').style.display=\'block\'">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);

		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';

	/* all done, return result */
	return $calendar;
}
?>
<!doctype html>
<html lang="en">
<head>

	<link href= "https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href = "https://fonts.googleapis.com/css?family=BreeSerif" rel = "stylesheet">

	<link rel="stylesheet" href="../studySpace/css/reserve.css"/>
	<link rel="stylesheet" href="../studySpace/css/calendar.css"/>
	<link rel="stylesheet" href="../studySpace/css/master.css">
	<link rel="stylesheet" href="../studySpace/css/popbox.css"/>

	<meta charset="utf-8">
	<title>Reserve a Study Space</title>
	<link rel="stylesheet" href="../studySpace/css/reserve.css"/>

</head>

<body>
	<header>
		<a href="../studySpace/reserve.php"><h1 class="site-title"><i class=""></i>Find a Study Space</h1></a>

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
				echo "<li class='navitem navlink'><a href='../loginStuff/account.php'>My Account</a></li>";

				//echo "<li class='navitem navlink active'><a href='../studySpace/reserve.php'>Find a Study Space</a></li>";
			}
			?>

		 <li class="navitem navlink"><a href="../aboutUs.php">About Us</a></li>
		</ul>
		</nav>
	</header>

<div class ="updateFont">
      	<?php
	echo "'<h2>December 2017</h2>'";
	echo "<div style='margin-left:100px'>" . draw_calendar(12,2017) . "</div>";
	echo "\n\n\n\n\n";

	include '../connectvarsEECS.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$query = "SELECT * FROM Project_Reservation
			WHERE OSU_ID IN
			(SELECT OSU_ID FROM Project_Calendar
			UNION
			SELECT OSU_ID FROM Project_Reservation
			NATURAL JOIN Project_Users) AND OSU_ID = '$onid'";

	$result = mysqli_query($conn, $query);

  //echo "<div class='reservation-title'>";
	//echo "<h1>Reservations</h1>";
	//echo "</div>";
	echo "<div class='reservation-box'>";
	echo "<h1>Reservations</h1>";
	echo "<table id='reservation'>
	<tr>
	  <th>Date</th>
	  <th>Start Time</th>
	  <th>End Time</th>
	</tr>";

	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td id=". $row['Calendar_ID'] . "-Date" . ">" . $row['Date'] . "</td>";
		echo "<td id=". $row['Calendar_ID'] . "-StrT" . ">" . $row['Start_Time'] . "</td>";
		echo "<td id=". $row['Calendar_ID'] . "-EndT" . ">". $row['End_Time'] . "</td>";
		echo "<td><button id=". $row['Calendar_ID'] ." onclick='document.getElementById(\"id02\").style.display=\"block\"' class='edit_btn' type='submit'>Edit</buton>";
		echo "</tr>";

	}

	echo "</table>";
	echo "</div>";
	?>
</div>
    </main><!-- /.container -->
<div id="id01" class="modal">
  <form class="modal-content animate" action="action_page.php" method="post">
   <h1 id="clickedDate"></h1>
    <div class="container">
      <label><b>Start Time</b></label>
      <input type="time" for="sTime" name="sTime" id="sTime">
      <label><b>End Time</b></label>
      <input type="time"for="eTime" name="eTime" id="eTime">
      <br></br>
      <label><b>Date</b></label>
      <input type="date" id="cday" for="cday" name="cday" >
      <button type="submit" class="sub_btn">Reserve</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  <form class="modal-content animate" action="edit_page.php" method="post">  
   <h1 id="clickedDate"></h1>
    <div class="container">
    <label><b>Start Time</b></label>
      <input type="time" for="sTimeMod" name="sTimeMod" id="sTimeMod">
      <label><b>End Time</b></label>
      <input type="time"for="eTimeMod" name="eTimeMod" id="eTimeMod">
      <br></br>
      <label><b>Date</b></label>
      <input type="date" id="cdayMod" for="cdayMod" name="cdayMod" >
      <input type="hidden" id="calId" for="calId" name="calId">
      <button type="submit" class="sub_btn">Update</button>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
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
    // Get the modal
    var modal1 = document.getElementById('id01');
    var modal2 = document.getElementById('id02');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal1) {
	    modal.style.display = "none";
    }
    if (event.target == modal2){
	   modal.style.display = "none";
    }
}
</script>
<script type="application/javascript">
	$(".calendar-day, .edit_btn").click(function(){ 
		var day = this.id;
		document.getElementById("clickedDate").innerHTML = "Day: " + day;

		if (day > 9){
			document.getElementById("cday").value = "2017-12-" + day;
		}
		else{
			day = "0" + day;
			document.getElementById("cday").value = "2017-12-" + day;
		}	
	});
</script>
<script type="application/javascript">
	$(".edit_btn").click(function(){ 
		var editId = this.id;
		var startT = document.getElementById(editId + "-StrT").innerHTML;
		var endT = document.getElementById(editId + "-EndT").innerHTML;
		var dateT = document.getElementById(editId + "-Date").innerHTML;

		document.getElementById("calId").value = editId;
		document.getElementById("sTimeMod").value = startT;
		document.getElementById("eTimeMod").value = endT;
		document.getElementById("cdayMod").value = dateT;
	});
</script>
  </body>
</html>
