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

		
	
	<div class="row-fluid">
		<div class="span8 offset2">
			<div class="content">
			<p>You are currently logged <?php echo $logged ?>.</p>
			</div>
			<div class="content">
				<p>Welcome! This is a site dedicated to black and white pictures of Teddy Hutchens, Future Leader Dog and adorable puppy extraordinaire. Click through the pages to be wowed by how amazing he is.</p>
			</div>
		</div>
	</div>
	
	
</body>

</html>