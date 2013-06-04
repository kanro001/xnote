function signupform(){
	var message = "<input type='email' name='email' class='xnote_login_input' id='xnote_login_input_email' pattern='[^ @]*@[^ @]*' placeholder='Email Address' autofocus required>"+
				"<input type='text' name='name' class='xnote_login_input' id='xnote_login_input_name' placeholder='Name' required>"+
				"<input type='text' name='uname' class='xnote_login_input' id='xnote_login_input_uname' placeholder='Username' required>"+
				"<input type='date' name='birth' class='xnote_login_input' id='xnote_login_input_birth' placeholder='05/12/1987' required>"+
				"<input type='text' name='gender' class='xnote_login_input' id='xnote_login_input_gender' placeholder='Gender' pattern='(male|female|Male|Female)' required/>"+
				"<input type='text' name='phone' class='xnote_login_input' id='xnote_login_input_phone' placeholder='xxxxxxxxxx' required>"+
				"<input type='password' name='password' class='xnote_login_input' id='xnote_login_input_password' placeholder='New Password' required>"+
				"<input type='button' value='Sign up' id='xnote_login_submit' class='xnote_login_submit' onclick='signup_ajax()'>"+
				"<p class='xnote_login_help'><a href='javascript:void(0)'>Forgot password?</a></p>";
	$('#xnote_body_login').html(message);//Jquery selector
	
	$('#xnote_header').hide();
	
	var message2 = "<a href='javascript:loginform();' class='xnote_login_submit' id='xnote_signup'>Login for Jingo</a>";
	$('#xnote_footer').html(message2);
	
}

function loginform(){
	var message ="<input type='email' name='email' class='xnote_login_input' id='xnote_login_input_email' pattern='[^ @]*@[^ @]*' placeholder='Email Address | Username' autofocus required>"+
				"<input type='password' name='password' class='xnote_login_input' id='xnote_login_input_password' placeholder='Password' required>"+
				"<input type='button' value='Log In' id='xnote_login_submit' class='xnote_login_submit' onclick='login_ajax()>'"+
				"<p class='xnote_login_help'><a href='javascript:void(0)'>Forgot password?</a></p>";
	$('#xnote_body_login').html(message);

	$('#xnote_header').show();
	
	var message2 = "<a href='javascript:signupform();' class='xnote_login_submit' id='xnote_signup'>Signup for Jingo</a>";
	$('#xnote_footer').html(message2);
}