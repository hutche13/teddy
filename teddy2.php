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
		
		
		<div class="row-fluid">
		
			
			<div class="span4 offset1">		
				<div class="content">	
					<img src="assets/img/teddysleepwork.png">
				</div>
				
			</div>
			
			<div class="span4">
				<div class="content">
				
				
     	 			<a href="#" onclick="showElement('commentform')">Show Comments Form</a>
				<div id="commentform">
  				 <form action="#insert" method="POST">
  				 
   					<a href="#" onclick="hideElement('commentform')">Hide Comments Form</a>
   					
   					<h2 id="insert">Add</h2>
   					
      					<label>Comment <input type=text name="comment"></label>

      					<input type="submit" name="insert" value="insert">
   				</form>

   			<?php if (isset($_POST['insert'])): ?>

      			<h2>Results</h2>
      			<?php
       	  			
         			$title = $_POST['title'];
         			$body = $_POST['body'];
         			
         			$newcomment = array(
            				'table'     => 'comments2',
            					'values'    => array(
               						
               						'title'     => $title,
               						'body' => $body
            					)
         				);
         				
         				if (isset($_POST['pubdate'])) {
            					$newcomment['values']['pubdate'] = $_POST['pubdate'];
         				}
         				
         				$newid = dalAdd($newcomment);
      			?>
<p>Inserted <i><?php echo $title ?></i><br/><?php echo $body ?>.</p>
			 
      			
      

   			<?php endif; ?>
<?php
         			$getAllComments = array(
            				'table' => 'comments2'
         			);
         			$rows = dalRetrieveAll($getAllComments);
         				foreach ($rows['dalAllRows'] as $row) {
            					$title = $row['title'];
            					$body = $row['body'];
           					$id = $row['id'];
           
            echo "<p>${row['id']} <i>${row['title']}</i><br/>${row['body']}</p>\n";
         				}
         
      			?>
      			</div>
				</div>
				
				
			</div>
		</div> 
		
				
	</body>

</html>