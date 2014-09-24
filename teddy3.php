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
		
		
		<div class="container">	
			<div class="row">
		
			
				<div class="col-xs-10 col-sm-5 col-md-5">		
					<div class="content">	
					<img src="assets/img/teddyday1.png">
				</div>
				
			</div>
			
			<div class="col-xs-10 col-sm-5 col-md-5 col-md-offset-1">
								<div class="content">
									<a href="#" onclick="showElement('commentform')">Show Comments</a>
									<a href="#" onclick="hideElement('commentform')">Hide Comments</a>
				
									<div id="commentform">
				  						<?php 
									if (login_check($mysqli) == true) {
									echo '	
									<div id="commentform">
				  						<form action="#insert" method="POST">

				   							<h2 id="insert">Add a Comment</h2>
				   							<label>Comment <input type=text name="comment"></label>
											<input type="submit" name="insert" value="add comment">
				   						</form>'; }
   						
				   						else { echo '<h4>You must be logged in to add a comment</h4>';}
				   						 ?>
   						
   						
   				

				   			<?php if (isset($_POST['insert'])): ?>

				      			<?php
       	  			
				         			$comment = $_POST['comment'];
         			
				         			$newcomment = array(
				            				'table'     => 'teddy3',
				            					'values'    => array(
				               					'comment' => $comment
				            					)
				         				);
         				
				         				if (isset($_POST['pubdate'])) {
				            					$newcomment['values']['pubdate'] = $_POST['pubdate'];
				         				}
         				
				         				$newid = dalAdd($newcomment);
				      			?>
			 
      			
      

				   			<?php endif; ?>
				<?php
				         			$getAllComments = array(
				            				'table' => 'teddy3'
				         			);
				         			$rows = dalRetrieveAll($getAllComments);
				         				foreach ($rows['dalAllRows'] as $row) {
				            					$body = $row['comment'];
				           					$id = $row['id'];
           
				            echo "<p>${row['id']} ${row['comment']}</p>\n";
				         				}
         
				      			?>
				      			</div>
				</div>
				
				
			</div>
		</div> 
		
				
	</body>

</html>