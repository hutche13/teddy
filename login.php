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
</head>

<body>
	
	<?php include 'header.php';?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div class="content login">
			
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
							<div class="row">	
								<div class="col-xs-10 col-sm-10 col-md-8">
								Email:<br> <input type="text" name="email" />
								</div>
								<div class="col-xs-10 col-sm-10 col-md-8">
								Password:<br> <input type="password" name="password" id="password"/>
			              		<input type="button" value="Login" onclick="formhash(this.form, this.form.password);" /> 
								</div>
			          		 </div>
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