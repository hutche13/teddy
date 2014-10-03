
<!DOCTYPE html>

	
	
	<title>Teddy</title>
	
	<!--css-->
		<link rel="stylesheet" href="assets/css/isotopestuff.css">
		<link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/unit4.css">
		<link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap-responsive.min.css">
		
	<!--js-->
	    <script src="assets/js/angular.js"></script>
		<script src="assets/js/bower_components/isotope/dist/isotope.pkgd.min.js"></script>
	<!--meta-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	</head>

<body>
	<header>
		<span><a href="login.php">SIGN IN</a></span>
		
		<img src="assets/img/logo.png" alt="Charlotte Hutchens">
		
		
		<ul class="unstyled nav">
			<li><a href="index.php">HOME</a></li>
			<li><a href="teddy.php">TEDDY</a></li>
			
		
		</ul> 
	</header>

		
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
			
				<div class="content">
					<div id="container">
						<div class="item">stuff</div>
					  	<div class="item w2">bigger stuff</div>
					  	<div class="item">stuff</div>
					  
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
				<div class="content">
					<p>example content</p>
				</div>
			</div>
		</div>
	</div>
	
</body>
<script>
	
var $container = $('#container');
// init
$container.isotope({
  // options
  itemSelector: '.item',
  layoutMode: 'fitRows'
});
</script>
</html>