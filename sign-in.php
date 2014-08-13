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


<body>
	<?php
		require_once "data-access-configuration.inc.php";
		require_once "data-access-layer.inc.php";
	?>
	
	<?php
   		dalConnectToDatabase($dalConfiguration);
	?>
	
	<?php include 'header.php';?>
	
	<div class="row-fluid">
		<div class="span4 offset4">
			<div class="content">
				 <?php
         /***
            See if the user has already signed in, by looking in the
            $_SESSION array for a value we set when the sign-in form
            is submitted and checked.
         ***/
         $SignedIn = @$_SESSION["SignedIn"];
         if ($SignedIn) {
            /***
               The user has signed in. Did they just ask to be signed
               out? Look to see if we were sent a parameter named
               "SignOut".
            ***/
            if (isset($_GET['SignOut'])) {
               $SignedIn = false;
               /* Update the session to indicate the user is signed out */
               $_SESSION["SignedIn"] = false;
               /* Tell the user */
               echo '<p><strong>You are now signed out</strong></p>';
            }
         } else {
            /***
               The user has not signed in yet. Did they just submit the
               sign-in form?
            ***/
            
			   
			   
			   
			   
	           if (isset($_POST['Verify'])) {
	              /* Get form parameters */
	              @$username = $_POST['username'];
	              @$password = $_POST['password'];

	              /***
	              For DAL user commands, the default table name is "users". You can
	              change it by setting "table" in the array. It also defaults to
	              a column named "username" for the username and one called
	              "password" for the password.
	              ***/
	              $credentials = array(
	                 'table' => 'users',
	                 'username' => $username,
	                 'password' => $password
	              );
				  
			$username = @$username2;
			$password = @$password2;	  
				  
				  
			   
               if ($username == $username2 and $password == $password2) {
                  /* Sign the user in! */
                  $SignedIn = true;
                  /* Save this in the session */
                  $_SESSION['SignedIn'] = true;
                  /* Also remember the user's name */
                  $_SESSION['Username'] = $Username;
               } else {
                  echo '<p><strong>Wrong username or password</strong></p>';
               }
            }
         }
      ?>

      <?php if (! $SignedIn): ?>
         
         <!-- Not signed in yet; show the form -->
         <h1>Please sign in</h1>
         <form action="#" method="post">
            <label>
               Username: <input name="Username" size="10" type="text">
            </label><br>
            <label>
               Password: <input name="Password" size="10" type="password">
            </label><br>
            <input value="Sign in" name="SignInForm" type="submit">
         </form>

      <?php else: ?>

         <!-- The user is signed in -->
         <?php
            /* Get the user's username, so we can display it */
            $Username = $_SESSION['Username'];
         ?>
         <h1><?php echo "Welcome, $Username!" ?></h1>

         <p>
            <a href="?SignOut">Cick here to sign out.</a>
         </p>

      <?php endif; ?>
	  
				      				        
					</div>
				</div>
			</div>
	
		</body>

</html>