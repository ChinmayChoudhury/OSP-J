<title>View posts</title>
<div class="container">
<h3 class="justify-content-center mt-4">View your posts</h3>
<?php
	if (isset($_SESSION['error'])) {
		echo "<p style='color:red'>".$_SESSION['error']."</p>";
		unset($_SESSION['error']);
	}
?>
<div class="row mt-5">
	<div class="col-12 mt-md-3 ">
		<table class="table thead-light">
			<tr>
				<th>Post title</th>
				<th>Date</th>
				<th>Status</th>
				<th>Action</th>
			</tr>	
			<?php
				require_once 'DB/pdo.php';
				$useridvar = $_SESSION['userid'];
				$query = "SELECT post_id, post_title, post_status, type, post_date FROM `posts` WHERE post_author_id= $useridvar ORDER BY `post_date` DESC,`post_id` DESC";
				$stmt = $pdo->query($query);

				// $stmt->execute([":idvar"=>"'".$_SESSION['userid']."'"]);
				                
			    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			        $statusvar = ($row['type'])? "Draft" : (($row['post_status']) ? "Approved" : "Not Approved") ;
			        echo "<tr>"; //create new row
			        echo "<td>".$row['post_title']."</td><td>".date("d F y", strtotime($row['post_date']))."</td><td>".$statusvar."</td><td>
			        	<a href='dashboardv2.php?edit_post&post_id=".$row['post_id']."'>Edit</a> | <a href='dashboardv2.php?preview&post_id=".$row['post_id']."'>View</a> | <a onClick=\"javascript: return confirm('Confirm deletion');\"  href='dashboardv2.php?delete&post_id=".$row['post_id']."'>Delete</a></td>";
			        echo "</tr>"; //close row
			    }

				
			?>
		</table>
	</div>
</div>
</div>

