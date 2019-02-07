<?php
session_start();
include "connection.php";
$msg="";

if (isset($_POST['btn_register'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $email_confirm = mysqli_real_escape_string($con, $_POST['email_confirm']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password)) { array_push($errors, "Email is required"); }
  if (empty($email)) { array_push($errors, "Password is required"); }
  if ($email != $email_confirm) {
	array_push($errors, "The two email do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM table_user WHERE user_name='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_name'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO table_user (user_name, email, password) 
  			  VALUES('$user_name', '$email', '$password')";
  	mysqli_query($con, $query);
  	$_SESSION['user_name'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($con, $_POST['user_name']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM table_user WHERE user_name='$username' AND password='$password'";
  	$results = mysqli_query($con, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['user_name'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}



?>
<?php
include "header.php";
?>


	<div class="row">
		<div class="container">	
			<div style="margin-top: 50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<?php echo $msg; ?>
			<div class="panel panel-info" >
			
				<div class="panel-heading">
					<div class="panel-title">Registration</div>
				</div>
					<div class="panel-body">
				
						<form id="register_register" class="form-horizontal" role="form" method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'>
							<div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Username</span>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="username">                                    
                            </div>
							<div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Password</span>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password">                                    
                            </div>
							<div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Email</span>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email">                                    
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Confrim Email</span>
                                    <input type="email" class="form-control" name="email_confirm" id="email_confirm" placeholder="email confirm">                                    
                            </div>
                                <div style="margin-top:10px" class="form-group">
                                	<div class="col-sm-12 controls">
                                      <input type="submit" id="btn_register" name="btn_register" class="btn btn-info btn-block btn-large" value="Register"></a>

                                    </div>
                                    <span id="msg"></span>
                                </div>
						</form>
					</div>
			</div>
</div>
</div>
	<?php include "footer.php";?>
	</div>
<script>
	$(document).ready(function(){
	  $("#btn_register").click(function(e){
	 	if($('#username').val()==''){
	 		$('#username').css("border-color", "#DA190B");
	 		$('#username').css("background", "#F2DEDE");
	 		e.preventDefault();
	 	}
	 	if($('#password').val()==''){
	 		$('#password').css("border-color", "#DA190B");
	 		$('#password').css("background", "#F2DEDE");
	 		e.preventDefault();
	 	}
	 	if($('#email').val()==''){
	 		$('#email').css("border-color", "#DA190B");
	 		$('#email').css("background", "#F2DEDE");
	 		e.preventDefault();
	 	}
	 	if($('#email_confirm').val()==''){
	 		$('#email_confirm').css("border-color", "#DA190B");
	 		$('#email_confirm').css("background", "#F2DEDE");
	 		e.preventDefault();
	 	}
	 	if($('#email').val() !== $('#email_confirm').val() ){
			$('#msg').html("Sorry the email you entered are not the same");
	 		e.preventDefault();
	 	}


	 	else{
	 		$('form_register').unbind('submit').submit();
	 	}
	  });

	  $("#btn_password").click(function(e){
	 	if($('#password').val()==''){
	 		$('#password').css("border-color", "#DA190B");
	 		$('#password').css("background", "#F2DEDE");
	 		e.preventDefault();
	 	}
	 	else{
	 		$('form_password').unbind('submit').submit();
	 	}
	  });

	});
</script>
</body>
</html>