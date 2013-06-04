<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>HomePage</title>
<link rel="stylesheet" href="bootstrap.min.css"/>
<link rel="stylesheet" href="css/homepage.css"/>
<link rel="stylesheet" href="css/main.css"/>
<link rel="stylesheet" href="css/upload.css"/>
<!-- For supporting HTML5 tags -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- For supporting media query -->
<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<body onload='getNodes(<?PHP session_start(); echo $_SESSION['valid_user'];?>);'>
	<script src="jquery.min.js"></script>
	<script src="bootstrap.min.js"></script>
	<script src="js/body.js"></script>
	<div id="xnote_wrap">
		<header id="xnote_header">
			
			<nav>
				<ul id="xnote_main_nav">
					<li><a href="javascript:location.reload();">Home</a></li>
					<li><a href="javascript:postNote()">Post Note</a></li>
					<li><a href='javascript:getFilters(<?PHP echo $_SESSION['valid_user'];?>);'>Filters</a> </li>
					<li><a href="javascript:newFilter()">New Filter</a></li>
				</ul>
				<!-- /#finder_main-nav --> 
			</nav>
		</header>
		
		<div id="xnote_body_content">
			<article class="xnote_body_section xnote_filter">

			</article>
		</div>
		
		<footer id="xnote_footer">
			<a href="javascript:logout();" class="" id="xnote_logout"><h2>Log out</h2></a>
		</footer>
	</div>
	
	
	<article class='xnote_body_section xnote_upload_note' style="display: none;top: 60px;" >
		<div class='finder_upload'>
			<form class='finder_upload_form' action='ajax/upload.php' method='post' enctype='multipart/form-data'>
				<abbr title="Username:"><input class='body_upload_input' type='text' name='finder_upload_name' id='finder_upload_name' value='<?php echo $_SESSION['valid_user']?>' readonly></input></abbr>
				<input class='body_upload_input' type='text' name='finder_upload_txt' id='finder_upload_txt' placeholder='Note:'></input>
				
				<select class='body_upload_input' id='finder_upload_choice' name='finder_upload_choice' required/>
					<option value='0'>One day</option>
					<option value='1'>Every Week</option>
				</select>
				<abbr title="Start DayTime"><input class='body_upload_input' type='datetime-local' name='finder_upload_startdaytime' id='finder_upload_startdaytime' placeholder='Start Day time' required></input></abbr>
				<abbr title="End DayTime"><input class='body_upload_input' type='datetime-local' name='finder_upload_enddaytime' id='finder_upload_enddaytime' placeholder='End Day time' required></input></abbr>
				
				<select class='body_upload_input' id='finder_upload_day' name='finder_upload_day' required/>
					<option value='1'>Mon</option>
					<option value='2'>Tue</option>
					<option value='3'>Wed</option>
					<option value='4'>Thu</option>
					<option value='5'>Fri</option>
					<option value='6'>Sat</option>
					<option value='7'>Sun</option>
				</select>
				<abbr title="Start Time"><input class='body_upload_input' type='time' name='finder_upload_starttime' id='finder_upload_starttime' placeholder='Start time' required></input></abbr>
				<abbr title="End Time"><input class='body_upload_input' type='time' name='finder_upload_endtime' id='finder_upload_endtime' placeholder='End time' required></input></abbr>
				<span>Click on the map for coordinates.</span>
				<div id='finder_upload_map'>
				<?php 
					include('map/lo.html');
				?>
				</div>
				<input class='body_upload_input' type='text' name='finder_upload_longitude' id='finder_upload_longitude' placeholder='Longitude' required/>
				<input class='body_upload_input' type='text' name='finder_upload_latitude' id='finder_upload_latitude' placeholder='Latitude' required/>
				<input class='body_upload_input' type='text' name='finder_upload_radius' id='finder_upload_radius' placeholder='Radius' required/>
				<select class='body_upload_input' id='finder_upload_tag' name='finder_upload_tag' required/>
					<option value='food'>Food</option>
					<option value='shopping'>Shopping</option>
					<option value='nightlife'>Nightlife</option>
					<option value='beauty&spas'>Beauty&Spas</option>
					<option value='health&medical'>Health&Medical</option>
					<option value='theatre'>Theatre</option>
					<option value='museum'>Museum</option>
					<option value='public services'>Public Service</option>
					<option value='hotel&travel'>Hotel&Travel</option>
				</select>
				<input class='body_upload_submit' type='submit' name='add' id='finder_upload_submit' value='New Post'/>
			</form>
		</div>
	</article>
	
</body>
</html>