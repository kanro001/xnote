<?php
	require_once ('finder_fns.php');
	//pretend they are not empty
	//extract($_POST);
	$action = $_GET['action'];
	if ($action == 'login') {
		$email = stripslashes(trim($_POST['login_email']));
		$password = stripslashes(trim($_POST['login_password']));

		//$md5pass = md5($password); 
		$arr['success'] = 1;
		try{
			$user = login($email, $password);
				
			$lifeTime = 24 * 3600;
			session_set_cookie_params($lifeTime);
			session_start();
			$_SESSION["valid_user"]=$user[1];
			$_SESSION["username"] = $user[0];
			
			$arr['success'] = 1;
			$arr['msg'] = 'Success';
			$arr['user'] = $_SESSION['username'];
			$arr['uid'] = $_SESSION['valid_user'];
				
		}
		catch(Exception $e){
			$arr['success'] = 0;
			$arr['msg'] = 'Dismatch';
		}
		//echo "success";
		echo json_encode($arr);
	}
	elseif ($action == 'logout') {
		unset($_SESSION);
		session_start();
		session_destroy();
		echo '1';
	}
	else if($action == 'signup'){
		$email = stripslashes(trim($_POST['signup_email']));
		$password = stripslashes(trim($_POST['signup_password']));
		$name = stripslashes(trim($_POST['signup_name']));
		$uname = stripslashes(trim($_POST['signup_uname']));
		$birth = stripslashes(trim($_POST['signup_birth']));
		$gender = stripslashes(trim($_POST['signup_gender']));
		$phone = stripslashes(trim($_POST['signup_phone']));
		//$repassword = stripslashes(trim($_POST['signup_repassword']));
		
		
		try{
			$user_id = register($email, $password, $name, $uname, $birth, $gender, $phone);
				
			$lifeTime = 24 * 3600;
			session_set_cookie_params($lifeTime);
			session_start();
			$_SESSION["valid_user"]=$user_id;
			$_SESSION["username"] = $uname;
				
			$arr['success'] = 1;
			$arr['msg'] = 'Success';
			$arr['user'] = $_SESSION['username'];
		
		}
		catch(Exception $e){
			$arr['success'] = 0;
			$arr['msg'] = 'Dismatch';
		}
		//echo "success";
		echo json_encode($arr);
	}
?>