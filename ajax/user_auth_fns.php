<?php
require_once 'output_fns.php';
require_once 'databaseClass.php';
//require_once("template/phpmailer/class.phpmailer.php"); 
function secure_input($input){
	return addslashes(strip_tags($input));
}
function login($email, $password){
	// check if username is unique
	$db = new database();
	$db->connect();
	//$salt=substr($password,0,2);
	//$password_en = crypt($password, $salt);		
	//$sql = "SELECT `user_id` FROM `user` WHERE `email` = '".$email."' AND `password` = '".$password_en."' LIMIT 0, 30 ";
	$sql = "SELECT `account`.`uaccount`, `account`.`uid` FROM `account`, `userprofile` WHERE (`account`.`uaccount` = '".$email."' or `userprofile`.`email` = '".$email."') and `account`.`pin` = '".$password."' and `account`.`uid` = `userprofile`.`uid` LIMIT 0, 30 ";
	$db->send_sql($sql);
	$tempres=$db->res;
	$num = mysql_num_rows($tempres);
	
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Email and password does not match.");
	}
	else{
		$tempres=$db->res;

		$user = Array();
		while($row = mysql_fetch_row($tempres)){
			$user[0] = $row[0];
			$user[1] = $row[1];
		}
	}
	$db->disconnect();
	unset($db);
	return $user;
}

function register($email, $password, $name, $uname, $birth, $gender, $phone){
	$db = new database();
	$db->connect();
	// TODO: should check if email or uaccount is unique
	/*$sql = "SELECT * FROM `user` WHERE `email` = '".$email."'";
	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	
	if ($num>0) {
		
		throw new Exception('That email has already been taken. Please try another one.');
	}*/
	//$salt=substr($password,0,2);
	//$password_en = crypt($password, $salt);
	//$sql2 = "INSERT INTO `user` (`ID_USER`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `SEX`, `BITHDAY`) VALUES (NULL, '".$password_en."', '".$firstname."', '".$lastname."', '".$email."', '".$sex."', '".$year."-".$month."-".$day."')";	
	//$sql2 = "INSERT INTO `finder`.`user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `privilege`, `active`) VALUES (NULL, '".$firstname."', '".$lastname."', '".$email."', '".$password_en."', '2', '1');";
	
	$sql = "INSERT INTO `xnote`.`account` (`uid`, `uaccount`, `pin`, `regdate`) VALUES (NULL, '".$uname."', '".$password."', CURRENT_TIMESTAMP);";
	$db->send_sql($sql);
	$sql2 = "SELECT `uid` FROM `account` WHERE `uaccount` = '".$uname."' LIMIT 0, 30 ";
	$db->send_sql($sql2);
	$tempres=$db->res;
	$num = mysql_num_rows($tempres);
	
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("This is impossible.");
	}
	else{
		$tempres=$db->res;
	
		while($row = mysql_fetch_row($tempres)){
			$uid = $row[0];
		}
	}
	$sql3 = "INSERT INTO `xnote`.`userprofile` (`upid`, `uid`, `uname`, `bday`, `email`, `phone`, `gender`) VALUES (NULL, '".$uid."', '".$name."', '".$birth."', '".$email."', '".$phone."', '".$gender."');";
	$db->send_sql($sql3);
	
	$db->disconnect();
	unset($db);
	return true;
}

function check_session(){
	if(!isset($_SESSION['valid_user'])){
		header("Location:log_form.php?title=Problem&error=You are not logged in. Please try it again.");
		exit;
	}
	return true;
}

function change_password($user_id, $oldpassword, $newpassword, $re_password){
	if($newpassword != $re_password)
		throw new Exception('Your new passwords don\'t match, please try once more time');
	$db = new database();
	$db->connect();
	$rand_number = mt_rand(6, 16);
	$salt=substr($newpassword,0,2);
	$newpassword_en = crypt($newpassword, $salt);
	$sql = "UPDATE `user` SET `PASSWORD` = '".$newpassword_en."' WHERE `user`.`id_user` = '".$user_id."'";
	$db->send_sql($sql);
	$db->disconnect();
	unset($db);
}

//valid user's authentication through verifying its first name and last name
function valid_user($email, $firstname, $lastname){
		
}

//generate a random number as new password for user
function generate_new_password($email){

	$db = new database();
	$db->connect();
	$rand_number = mt_rand(6, 16);
	$newpassword = generate_str($rand_number);
	$salt=substr($newpassword,0,2);
	$newpassword_en = crypt($newpassword, $salt);
	$sql="UPDATE `user` SET `PASSWORD` = '".$newpassword_en."' WHERE `user`.`EMAIL` = '".$email."'";
	$db->send_sql($sql);
	$db->disconnect();
	unset($db);
	return $newpassword;  // changed successfully
	
}

function generate_str($digits){
	$c= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	srand((double)microtime()*1000000);
	$rand = null;
	for($i=0; $i<$digits; $i++) {
		$rand.= $c[rand()%strlen($c)];
	}
	return $rand;
}

//send user a new password
function notify_password($email, $password){
		
		$mesg = "Your Ourbond password has been changed to ".$password."\r\n"
		."Please change it next time you log in.\r\n";
	
		sendMail("liubinzhe@gmail.com", $mesg);
}

function sendMail($to, $message) {
	$mail = new PHPMailer();

	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;

	$mail->Username = "binzhe.ourbond@gmail.com";
	$mail->Password = "asdfASDF1234";
	$mail->CharSet = "utf-8";
	$mail->Encoding = "base64";

	$mail->From = "binzhe.ourbond@gmail.com";
	$pieces = explode('@', $to);
	$mail->FromName = 'hello';
	$mail->Subject = "Retrieving Password:";
	$mail->Body = $message;

	$mail->WordWrap = 50;
	$mail->AddAddress($to, $pieces[0]);
	$mail->AddReplyTo($to, $pieces[0]);

	$mail->IsHTML(true); // send as HTML
	if ($mail->Send()) {
		return "OK";
	}
	throw new Exception($mail->ErrorInfo,104);
}
?>