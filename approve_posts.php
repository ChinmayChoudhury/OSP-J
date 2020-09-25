<?php
	require_once 'DB/pdo.php';
	if (!$_SESSION['userstatus']>1) {
		header("Location: errorv2.php?code=20006");
		return;
	}
	$stmt = $pdo->query("SELECT COUNT(*) FROM posts WHERE post_status = 1 ");
	$rowcount = $stmt->fetchColumn();


?>



<title>VBC | Approve posts</title>
<div class="container">
<h3 class="justify-content-center mt-4">Approve posts</h3>
<?php
	if (isset($_SESSION['success'])) {
		echo "<p style='color: green'>".$_SESSION['success']."</p>";
		unset($_SESSION['success']);
	}
?>
<div class="row mt-5">
	<div class="col-12 mt-md-3 ">
		<table class="table thead-light">
			<tr>
				<th>Post title</th>
				<th>Date</th>
				<th>Author</th>
				<th>Action</th>
			</tr>	
			<?php
				
				$useridvar = $_SESSION['userid'];
				$res_per_page = 20;
				$page = 1;
				if (isset($_GET['page'])) {
		 			$page = htmlspecialchars($_GET['page']);
		 		}
		 		$start = ($page-1) * $res_per_page;
				//fetch posts with status 0 (not approved) and type not 1 (not a draft)
				$query = "SELECT post_id, post_title, post_status, post_author, type, post_date FROM `posts` WHERE post_status = 0 AND type != 1 ORDER BY `post_date` DESC,`post_id` DESC LIMIT $res_per_page OFFSET $start";
				$stmt = $pdo->query($query);

				// $stmt->execute([":idvar"=>"'".$_SESSION['userid']."'"]);
				                
			    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			        // $statusvar = ($row['type'])? "Draft" : (($row['post_status']) ? "<img src='https://img.icons8.com/material-sharp/24/000000/checked.png'/>" : "Not Approved") ;
			        echo "<tr class=''>"; //create new row
			        echo "<td class='w-30'>".$row['post_title']."</td><td class='w-20'>".date("d F y", strtotime($row['post_date']))."</td><td class='w-25'>".$row['post_author']."</td><td class='w-25'>
			        	<a href='approve.php?post_id=".$row['post_id']."'>Approve</a> | <a href='dashboardv2.php?preview&post_id=".$row['post_id']."'>View</td>";
			        echo "</tr>"; //close row
			    }

			?>
		</table>

	</div>
	<?php
	echo "
	<nav aria-label='Page navigation example' class='mt-5 fadeIn a1 justify-content-center '>
			<ul class='pagination justify-content-center'>
		"; //echo close

		$numpages = ceil($rowcount / 9);
		$current = 1;
		if (isset($_GET['page'])) {
			$current = htmlspecialchars(htmlentities($_GET['page']));
		}
		$minpage = $current - 2;
		$maxpage = $current + 2;

		if ($minpage < 1) {
			$maxpage += abs($minpage);
			$minpage = 1;

		}
		if ($maxpage > $numpages) {
			$maxpage = $numpages;
		}

	
		for ($num= $minpage; $num <= $maxpage; $num++) { 
			$printvar = $num;
			
			if ($num == $minpage && $minpage!=1) {
				$prev = $minpage-1;
				echo "
				<li class='page-item'>
					<a class='page-link' href='dashboardv2.php?approve_posts&page={$prev}' aria-label='Previous'>
						<span aria-hidden='true'>&laquo;</span>
						<span class='sr-only'>Previous</span>
					</a>
				</li>
				";
				// continue;
			}

			$active = ($current == $num) ? "active": "";
			echo "
				<li class='page-item'><a class='page-link {$active}' href='dashboardv2.php?approve_posts&page={$num}'>{$num}</a></li>
			";

			if ($num == $maxpage && $maxpage != $numpages) {
				$nex = $maxpage + 1;
				echo "
				<li class='page-item'>
					<a class='page-link' href='dashboardv2.php?approve_posts&page={$nex}' aria-label='Next'>
						<span aria-hidden='true'>&raquo;</span>
						<span class='sr-only'>Next</span>
					</a>
				</li>
				";
				// continue;
			}

		} //end of for loop
		echo "</ul></nav> ";
		?>
</div>
</div>

<!-- </a> | <a onClick=\"javascript: return confirm('Confirm deletion');\"  href='dashboardv2.php?delete&admin&post_id=".$row['post_id']."'>Delete</a> -->

