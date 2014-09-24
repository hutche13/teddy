<?php session_start(); /* Create or resume the user's session */ ?>

<!DOCTYPE html>
<head>
	<?php include 'head.php';?>
	
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
			<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
				<div class="content">
				 
        				   <a href="sign-in.php">Already Have an Account?</a>

				     <form action="" method="post">
         					<p>
            						<label>Username:
               							<input type="text" name="username">
            						</label><br>
            						<label>Password:
               							<input type="password" name="password">
            						</label>
            						<label>Repeat password:
               							<input type="password" name="password2">
            						</label><br>
            						<input type="submit" name="Add" value="Add user">
         					</p>
				     	</form>
				     	
			 		<?php
      						if (isset($_POST['Add'])) {
            					/* Get form parameters */
            					@$username = $_POST['username'];
           	 				@$password = $_POST['password'];
            					@$password2 = $_POST['password2'];

            					/* Make sure they were all OK */
            					if (empty($username)) {
            					   echo "<b>Please provide a username</b>";
            					} else if (empty($password)) {
            					   echo "<b>Please provide a password</b>";
            					} else if ($password != $password2) {
            					   echo "<b>Passwords do not match</b>";
            					} else {
               					/* Let's try to add the user */

               /***
               For dalAddUser, the default table name is "users". You can
               change it by setting "table" in the array. It also defaults to
               a column named "username" for the username and one called
               "password" for the password.
               ***/
               					$userInfo = array(
               				   	'table' => 'users',
                  				'username' => $username,
                  				'password' => $password
               					);
              		 			$id = dalAddUser($userInfo);
              	 				if ($id) {
                  					echo "<p>Added $username as user number $id</p>";
               					} else {
                  					echo "<p>Could not add user $username</p>";
               						}
           			 		}
         					}
      					?>    
			</div>
		</div>
	</div>
</div>
	
	
</body>

</html>