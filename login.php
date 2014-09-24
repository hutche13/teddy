<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
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


<body>
	
	<?php include 'header.php';?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
				<div class="content">
			
				<?php
					if (isset($_GET['error'])) {
						echo '<p class="error">Error Logging In!</p>';
					}
				?> 
			   
				<?php 
					if (login_check($mysqli) == true) {
    					echo '<p>Welcome!</p>
    						  <p>If you are done, please <a href="includes/logout.php">log out</a>.</p>';
					} else {
						echo '<form action="includes/process_login.php" method="post" name="login_form">                      
								Email: <input type="text" name="email" />
								Password: <input type="password" name="password" id="password"/>
			              		<input type="button" value="Login" onclick="formhash(this.form, this.form.password);" /> 
			          		  </form>
			           
					   <p>If you do not have a login, please <a href="register.php">register</a></p>';
				   }
			    ?>
			   	
				<p>You are currently logged <?php echo $logged ?>.</p>
				        
				      				        
			</div>
		</div>
	</div>
</div>
</body>

</html>