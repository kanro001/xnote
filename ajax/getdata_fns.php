<?php
require_once 'databaseClass.php';

function getAreaSiderBarData(){
	$item_num = Array();
	$db = new database();
	$db->connect();
	
	//Hoboken
	$sql = "SELECT count(*)\n"
    . "FROM `room` \n"
    . "WHERE `area` = 'Hoboken'";
	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$row1 = mysql_fetch_row($tempres);
		$item_num[0] = $row1[0];
	}
	
	//Korean Town
	$sql1 = "SELECT count(*)\n"
			. "FROM `room` \n"
			. "WHERE `area` = 'Korean Town'";
	$db->send_sql($sql1);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$row2 = mysql_fetch_row($tempres);
		$item_num[1] = $row2[0];
	}
	
	//West Villiage
	$sql2 = "SELECT count(*)\n"
			. "FROM `room` \n"
			. "WHERE `area` = 'West Villiage'";
	$db->send_sql($sql2);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$row3 = mysql_fetch_row($tempres);
		$item_num[2] = $row3[0];
	}
	
	//East Villiage
	$sql3 = "SELECT count(*)\n"
			. "FROM `room` \n"
			. "WHERE `area` = 'East Villiage'";
	$db->send_sql($sql3);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$row4 = mysql_fetch_row($tempres);
		$item_num[3] = $row4[0];
	}
	
	//Times Square
	$sql4 = "SELECT count(*)\n"
			. "FROM `room` \n"
			. "WHERE `area` = 'Times Square'";
	$db->send_sql($sql4);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$row5 = mysql_fetch_row($tempres);
		$item_num[4] = $row5[0];
	}
	
	$db->disconnect();
	unset($db);
	return $item_num;
}


function getGenderSiderBarData(){
	$item_num = Array();
	$db = new database();
	$db->connect();

	//Both
	$sql_both = "SELECT count(*)\n"
    . "FROM `room`\n"
    . "WHERE `gender` = 0";
	$db->send_sql($sql_both);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$row1 = mysql_fetch_row($tempres);
		$item_num[0] = $row1[0];
	}

	//Male
	$sql_male = "SELECT count(*)\n"
    . "FROM `room`\n"
    . "WHERE `gender` = 1";
	$db->send_sql($sql_male);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$row2 = mysql_fetch_row($tempres);
		$item_num[1] = $row2[0];
	}

	//Female
	$sql_female = "SELECT count(*)\n"
    . "FROM `room`\n"
    . "WHERE `gender` = 2";
	$db->send_sql($sql_female);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$row3 = mysql_fetch_row($tempres);
		$item_num[2] = $row3[0];
	}

	//Unisex
	$sql_unisex = "SELECT count(*)\n"
    . "FROM `room`\n"
    . "WHERE `gender` = 3";
	$db->send_sql($sql_unisex);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$row4 = mysql_fetch_row($tempres);
		$item_num[3] = $row4[0];
	}

	
	$db->disconnect();
	unset($db);
	return $item_num;
}

function getActicleDataByArea($area){
	$item_num = Array();
	$db = new database();
	$db->connect();

	$sql = "SELECT `room_name`, `area`, `city`, `date`, `addr`, `phone`, `gender`, `img` FROM `room`\n"
    . "WHERE `area` = '".$area."'\n"
    . "ORDER BY `date` desc LIMIT 0, 30";

	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$i = 0;
		while($row = mysql_fetch_row($tempres)){
			$item_num[$i][0] = $row[0];//room_name
			$item_num[$i][1] = $row[1];//area
			$item_num[$i][2] = $row[2];//city
			$item_num[$i][3] = $row[3];//date
			$item_num[$i][4] = $row[4];//addr
			$item_num[$i][5] = $row[5];//phone
			$item_num[$i][6] = $row[6];//gender
			$item_num[$i][7] = $row[7];//img
			$i++;
		}

		$item_num[$num][0] = $num;
	}

	$db->disconnect();
	unset($db);
	return $item_num;
}

function getActicleDataByGender($gender){
	$item_num = Array();
	$db = new database();
	$db->connect();

	$sql = "SELECT `room_name`, `area`, `city`, `date`, `addr`, `phone`, `gender`, `img` FROM `room`\n"
			. "WHERE `gender` = '".$gender."'\n"
					. "ORDER BY `date` desc LIMIT 0, 30";

	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$i = 0;
		while($row = mysql_fetch_row($tempres)){
			$item_num[$i][0] = $row[0];//room_name
			$item_num[$i][1] = $row[1];//area
			$item_num[$i][2] = $row[2];//city
			$item_num[$i][3] = $row[3];//date
			$item_num[$i][4] = $row[4];//addr
			$item_num[$i][5] = $row[5];//phone
			$item_num[$i][6] = $row[6];//gender
			$item_num[$i][7] = $row[7];//img
			$i++;
		}

		$item_num[$num][0] = $num;
	}

	$db->disconnect();
	unset($db);
	return $item_num;
}

function getActicleDataByName($name){
	$item_num = Array();
	$db = new database();
	$db->connect();

	$sql = "SELECT `room_name`, `area`, `city`, `date`, `addr`, `phone`, `gender`, `img` FROM `room`\n"
			. "WHERE `room_name` like '".$name."'\n"
					. "ORDER BY `date` desc LIMIT 0, 30";

	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$i = 0;
		while($row = mysql_fetch_row($tempres)){
			$item_num[$i][0] = $row[0];//room_name
			$item_num[$i][1] = $row[1];//area
			$item_num[$i][2] = $row[2];//city
			$item_num[$i][3] = $row[3];//date
			$item_num[$i][4] = $row[4];//addr
			$item_num[$i][5] = $row[5];//phone
			$item_num[$i][6] = $row[6];//gender
			$item_num[$i][7] = $row[7];//img
			$i++;
		}

		$item_num[$num][0] = $num;
	}

	$db->disconnect();
	unset($db);
	return $item_num;
}

function upload($name, $addr, $area, $city, $gender, $img, $phone, $long, $lat){
	// check if username is unique
	$db = new database();
	$db->connect();
	$sql = "INSERT INTO `finder`.`room` (`room_id`, `posted_id`, `verified_id`, `room_name`, `addr`, `area`, `city`, `gender`, `img`, `phone`, `date`, `longitude`, `latitude`) VALUES (NULL, '7', '7', '".$name."', '".$addr."', '".$area."', '".$city."', '".$gender."', '".$img."', '".$phone."', NOW(), '".$long."', '".$lat."');";
	$db->send_sql($sql);
	$tempres=$db->res;
	$db->disconnect();
	if ($tempres==1) {
		unset($tempres);
		return true;
	}
	else if($tempres==0){
		unset($tempres);
		throw new Exception('Impossible.');
	}
	else{
		unset($tempres);
		throw new Exception('Could not insert new data');
	}
}

function uploadNote($uid, $txt, $choice, $startdaytime, $enddaytime, $day, $starttime, $endtime, $long, $lat, $rad, $tag){
	// check if username is unique
	$db = new database();
	$db->connect();
	$sql = "INSERT INTO `xnote`.`note` (`nid`, `uid`, `txt`, `post_time`, `privacy`, `delete_flag`, `dow`, `start_time`, `end_time`, `start_daytime`, `end_daytime`, `choice`, `lat`, `long`, `radius`, `tag`) VALUES (NULL, '".$uid."', '".$txt."', CURRENT_TIMESTAMP, '0', '0', '".$day."', '".$starttime."', '".$endtime."', '".$startdaytime."', '".$enddaytime."', '".$choice."', '".$long."', '".$lat."', '".$rad."', '".$tag."');";
	$db->send_sql($sql);
	$tempres=$db->res;
	$db->disconnect();
	if ($tempres==1) {
		unset($tempres);
		return true;
	}
	else if($tempres==0){
		unset($tempres);
		throw new Exception('Impossible.');
	}
	else{
		unset($tempres);
		throw new Exception('Could not insert new data');
	}
}

/*function uploadFilter($uid, $choice, $startdaytime, $enddaytime, $day, $starttime, $endtime, $long, $lat, $rad, $tag){
	// check if username is unique
	$db = new database();
	$db->connect();
	$loc = $uid.new time();
	$sqll = "INSERT INTO `xnote`.`flocation` (`loc`, `loc_radius`, `long`, `lat`) VALUES ('".$loc."', '".$rad."', '".$long."', '".$lat."');";
	$db->send_sql($sqll);
	$sql = "INSERT INTO `xnote`.`filter` (`fid`, `uid`, `state`, `tag`, `dow`, `f_start_time`, `f_end_time`, `choice`, `loc`) VALUES (NULL, '".$uid."', '1', '".$tag."', '".$day."', '".$startdaytime."', '".$enddaytime."', '0', '".$loc."');";
	$db->send_sql($sqll);
	
	$db->disconnect();
	
}*/
function uploadFilter($uid, $choice, $startdaytime, $enddaytime, $day, $starttime, $endtime, $long, $lat, $rad, $tag){
	// check if username is unique
	$db = new database();
	$db->connect();
	$loc = $uid.new time();
	$sql = "INSERT INTO `xnote`.`filter` (`fid`, `uid`, `state`, `tag`, `dow`, `f_start_time`, `f_end_time`, `choice`, `loc`) VALUES (NULL, '".$uid."', 'n/a', '".$tag."', '0', '".$startdaytime."', '".$enddaytime."', '0', '".$loc."');";
	$db->send_sql($sql);
	$sqll = "INSERT INTO `xnote`.`flocation` (`loc`, `loc_radius`, `long`, `lat`) VALUES ('$loc', '".$rad."', '".$long."', '".$lat."');";
	$db->send_sql($sqll);
	$db->disconnect();

}


function getFilters($uid){
	$item_num = Array();
	$db = new database();
	$db->connect();

	$sql = "SELECT * FROM `filter`, `flocation` WHERE `uid` = '".$uid."' LIMIT 0, 30 ";

	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$i = 0;
		while($row = mysql_fetch_row($tempres)){
			$item_num[$i][0] = $row[2];//state
			$item_num[$i][1] = $row[3];//tag
			$item_num[$i][2] = $row[4];//dow
			$item_num[$i][3] = $row[5];//start_time
			$item_num[$i][4] = $row[6];//end_time
			$item_num[$i][5] = $row[7];//choice
			$item_num[$i][6] = $row[8];//loc
			$item_num[$i][7] = $row[10];//rad
			$item_num[$i][8] = $row[11];//long
			$item_num[$i][9] = $row[12];//lat
			$i++;
		}
		$item_num[$num][0] = $num;
	}

	$db->disconnect();
	unset($db);
	return $item_num;
}

function getNotes($uid){
	$item_num = Array();
	$db = new database();
	$db->connect();

	$sql = "SELECT * FROM `filter`, `flocation` WHERE `uid` = '".$uid."' LIMIT 0, 30 ";
	$sql2 = "SELECT `note`.* FROM `filter`, `note` WHERE ";
	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$i = 0;
		while($row = mysql_fetch_row($tempres)){
			/*$item_num[$i][0] = $row[2];//state
			$item_num[$i][1] = $row[3];//tag
			$item_num[$i][2] = $row[4];//dow
			$item_num[$i][3] = $row[5];//start_time
			$item_num[$i][4] = $row[6];//end_time
			$item_num[$i][5] = $row[7];//choice
			$item_num[$i][6] = $row[8];//loc
			$item_num[$i][7] = $row[10];//rad
			$item_num[$i][8] = $row[11];//long
			$item_num[$i][9] = $row[12];//lat*/
			if($i == 0){
				$sql2=$sql2."(`note`.`tag` = '".$row[3]."' and `note`.`start_daytime` < '".$row[5]."' and `note`.`end_daytime` > '".$row[6]."')";
			}else{
				$sql2=$sql2." or (`note`.`tag` = '".$row[3]."' and `note`.`start_daytime` < '".$row[5]."' and `note`.`end_daytime` > '".$row[6]."')";
			}
			$i++;
		}
		//$item_num[$num][0] = $num;
		$db->send_sql($sql2);
		$num = mysql_num_rows($db->res);
		if (!$num) {
			$db->disconnect();
			unset($db);
			throw new Exception("Error. This is impossible.");
		}
		else{
			$tempres=$db->res;
			$i = 0;
			while($row = mysql_fetch_row($tempres)){
				$item_num[$i][0] = $row[2];//txt
				$item_num[$i][1] = $row[3];//posttime
				$item_num[$i][2] = $row[4];//privacy
				$item_num[$i][3] = $row[5];//delete_flag
				$item_num[$i][4] = $row[6];//dow
				$item_num[$i][5] = $row[7];//start_time
				$item_num[$i][6] = $row[8];//end_time
				$item_num[$i][7] = $row[9];//start_daytime
				$item_num[$i][8] = $row[10];//end_daytime
				$item_num[$i][9] = $row[11];//choice
				$item_num[$i][10] = $row[12];//lat
				$item_num[$i][11] = $row[13];//long
				$item_num[$i][12] = $row[14];//radius
				$item_num[$i][13] = $row[15];//tag
				$i++;
			}
			$item_num[$num][0] = $num;
		}
	}

	$db->disconnect();
	unset($db);
	return $item_num;
}
?>

