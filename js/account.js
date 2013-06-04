function signup_ajax(){
	//body_signup_submit
	//alert("begin----------");
	var email = $('#xnote_login_input_email').val();
	alert(email);
	var password = $('#xnote_login_input_password').val();
	alert(password);
	var name = $('#xnote_login_input_name').val();
	var uname = $('#xnote_login_input_uname').val();
	var birth = $('#xnote_login_input_birth').val();
	var gender = $('#xnote_login_input_gender').val();
	var phone =$('#xnote_login_input_phone').val();
	//alert(phone);
	$.post("ajax/login.php?action=signup",
	{
		"signup_email":email,
		"signup_password":password,
		"signup_name":name,
		"signup_uname":uname,
		"signup_birth":birth,
		"signup_gender":gender,
		"signup_phone":phone
	},
	function(data,status){
		//alert("----------");
		//alert("Data: " + data.user + "\nMsg:" + data.msg + "\nStatus: " + status);
		
		location.assign("home.php");
	},
	"json").fail(function() {
		//alert("signup ajax error...");
		location.assign("index.html");
	});
	
	//alert("end------");
}

function login_ajax(){
	//alert("begin----------");
	var email = $("#xnote_login_input_email").val();
	var password = $("#xnote_login_input_password").val();
	
	//alert(email);
	//alert(password);
	$.post("ajax/login.php?action=login",
	{
		"login_email":email,
		"login_password":password
	},
	function(data,status){
		//alert("success");
		//alert("Data: " + data.user + "\nMsg:" + data.msg + "\nStatus: " + status);
		
		//loginheader(data.user);
		location.assign("home.php");
	},
	"json").fail(function() {
		alert("Please re-enter your email or user name and password.");
		location.assign("index.html");
	});
	
	//alert("end------");
}


