<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<head>
	<?php include 'head.php';?>
    <script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script>
</head>
<script type="text/javascript">
function hideElement(id) {
         var elem = document.getElementById(id);
         elem.style.display = "none";
         return false;
      }
      function showElement(id) {
         var elem = document.getElementById(id);
         elem.style.display = "block";
         return false;
      }

</script>


</style>
<body>
 <?php
		
		require_once "data-access-configuration.inc.php";
		require_once "data-access-layer.inc.php";
	    
	?>
	<?php
         dalConnectToDatabase($dalConfiguration);
	?>
	<?php include 'header.php';?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-4">
				<div class="content">
				 
						   <!-- Registration form to be output if the POST variables are not
						           set or if the registration script caused an error. -->
						           <h1>Register with Teddy</h1>
						           <?php
						           if (!empty($error_msg)) {
						               echo $error_msg;
						           }
						           ?>
						           <ul class="register">
						               <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
						               <li>Emails must have a valid email format</li>
						               <li>Passwords must be at least 6 characters long</li>
						               <li>Passwords must contain
						                   <ul>
						                       <li>At least one upper case letter (A..Z)</li>
						                       <li>At least one lower case letter (a..z)</li>
						                       <li>At least one number (0..9)</li>
						                   </ul>
						               </li>
						               <li>Your password and confirmation must match exactly</li>
						           </ul>
						           <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
						                   method="post" 
						                   name="registration_form">
									  
									  <p>Username:</p> <input type='text' name='username' id='username' /><br>
									  <p>Email:</p> <input type="text" name="email" id="email" /><br>
									  <p>Password:</p> <input type="password" name="password" id="password"/><br>
									  <p>Confirm password:</p> <input type="password" name="confirmpwd" id="confirmpwd" /><br>
						              
									  <input type="button" 
									  	value="Register" 
									  	onclick="return regformhash(this.form,
																	this.form.username,
																	this.form.email,
																	this.form.password,
																	this.form.confirmpwd);" /> 
								</form>
								<p>Return to the <a href="login.php">login page</a>.</p>
			</div>
		</div>
	</div>
</div>
	
	
</body>

</html>