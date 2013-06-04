<?php

	require_once ('finder_fns.php');

	if(isset($_POST["finder_upload_name"]))
	{$upload_name = $_POST["finder_upload_name"];
	//header("Location: ../home.php");
	}
	//header("Location: ../home.php");
	if(isset($_POST['finder_upload_choice']))
	{$upload_choice = $_POST['finder_upload_choice'];
	//header("Location: ../home.php");
	}
	
	if(isset($_POST['finder_upload_startdaytime']))
	{$upload_startdaytime = $_POST['finder_upload_startdaytime'];
	//header("Location: ../home.php");
	}
	
	if(isset($_POST['finder_upload_enddaytime']))
	{$upload_enddaytime = $_POST['finder_upload_enddaytime'];
	//header("Location: ../home.php");
	}
	;
	if(isset($_POST['finder_upload_day']))
	{$upload_day = $_POST['finder_upload_day'];
	//header("Location: ../home.php");
	}
	
	if(isset($_POST['finder_upload_starttime']))
	{$upload_starttime = $_POST['finder_upload_starttime'];
	//header("Location: ../home.php");
	}
	if(isset($_POST['finder_upload_endtime']))
	{$upload_endtime = $_POST['finder_upload_endtime'];
	//header("Location: ../home.php");
	}
	if(isset($_POST['finder_upload_longitude']))
	{$upload_longitude = $_POST['finder_upload_longitude'];
	//header("Location: ../home.php");
	}
	if(isset($_POST['finder_upload_latitude']))
	{$upload_latitude = $_POST['finder_upload_latitude'];
	//header("Location: ../home.php");
	}
	if(isset($_POST['finder_upload_radius']))
	{$upload_radius = $_POST['finder_upload_radius'];
	//header("Location: ../home.php");
	}
	if(isset($_POST['finder_upload_tag']))
	{$upload_tag = $_POST['finder_upload_tag'];
	//header("Location: ../home.php");
	}

	
	
	if(isset($_POST['finder_upload_txt'])){
		//upload new post
		$upload_txt = $_POST['finder_upload_txt'];
		//header("Location: ../home.php");
		uploadNote($upload_name, $upload_txt, $upload_choice, $upload_startdaytime, $upload_enddaytime, $upload_day, $upload_starttime, $upload_endtime, $upload_longitude, $upload_latitude, $upload_radius, $upload_tag);
		//header("Location: ../home.php");
	//}else{
		//upload new filter
		//header("Location: ../home.php");
		//header("Location: ../home.php");
		uploadFilter($upload_name, $upload_choice, $upload_startdaytime, $upload_enddaytime, $upload_day, $upload_starttime, $upload_endtime, $upload_longitude, $upload_latitude, $upload_radius, $upload_tag);
		//header("Location: ../home.php");
	}
	
	
	
	header("Location: ../home.php");
	
?>