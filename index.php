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

	<head><?php include 'head.php';?></head>

<body>
	<?php include 'header.php';?>

		
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
			
				<div class="content">
					<p>Welcome! This is a site dedicated to black and white pictures of Teddy Hutchens, Future Leader Dog and adorable puppy extraordinaire. Click through the pages to be wowed by how amazing he is.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
				<div class="content">
					<p>You are currently logged <?php echo $logged ?>.</p>
				</div>
			</div>
		</div>
	</div>
	
</body>

</html>