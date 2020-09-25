<?php
	require_once 'DB/pdo.php';


	if(!$_REQUEST || isset($_REQUEST['page'])){
		$res_per_page = 9;
		$page = 1;
		if (isset($_GET['page'])) {
		 	$page = htmlspecialchars($_GET['page']);
		 } 
		$start = ($page-1) * $res_per_page;
		$query = 'SELECT * FROM `posts` WHERE `post_status` = 1 ORDER BY `post_id` DESC LIMIT ' . $res_per_page . ' OFFSET '. $start ; 
		$stmt = $pdo->prepare($query);
		$stmt->execute();
		// $res = $stmt->fetch(PDO::FETCH_ASSOC);
		$row_arr = array();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			    		// print_r($row);
			array_push($row_arr, $row);
		}
		$stmt = $pdo->query("SELECT COUNT(*) FROM posts WHERE post_status = 1 ");
		// $stmt->execute();
		// $rowvar = $stmt->fetch(PDO::FETCH_ASSOC);
		$rowcount = $stmt->fetchColumn();
		// print_r(array_keys($row_arr[0]));	 
		echo " 
		<div class='row fadeIn a1 mt-5'>
			<div class='col-10 offset-1 col-md-8 offset-md-2'>

				<div class='card-columns'>

					<div class='card'>
						<a href='blogpagev2.php?postid=",$row_arr[0]['post_id'],"' class='nodecorat'>
							<img class='card-img-top' src='",$row_arr[0]['post_img'],"' alt=''>
							<div class='card-body'>
								<h5 class='card-title'>",ucwords($row_arr[0]['post_title']),"</h5>
								<p class='card-text'>",html_entity_decode(trim($row_arr[0]['post_incerpt'])),"</p>
						</a>
							<footer class='blockquote-footer text-right mb-1 mr-1'>
								On ",date("d F y", strtotime($row_arr[0]['post_date']))," by <cite title='Source Title'>",$row_arr[0]['post_author'],"</cite>
							</footer>
						</div>
					</div>

					<div class='card'>
						<a href='blogpagev2.php?postid=",$row_arr[3]['post_id'],"' class='nodecorat'>
						<img class='card-img-top' src='",$row_arr[3]['post_img'],"' alt=''>
						<div class='card-body'>
							<h5 class='card-title'>",ucwords($row_arr[3]['post_title']),"</h5>
							<p class='card-text'>",html_entity_decode(trim($row_arr[3]['post_incerpt'])),"</p>
						</a>
							<footer class='blockquote-footer text-right mb-1 mr-1'>
								On ",date("d F y", strtotime($row_arr[3]['post_date']))," by <cite title='Source Title'>",$row_arr[3]['post_author'],"</cite>
							</footer>
						</div>
					</div>

					<div class='card'>
						<a href='blogpagev2.php?postid=",$row_arr[6]['post_id'],"' class='nodecorat'>
						<img class='card-img-top' src='",$row_arr[6]['post_img'],"' alt=''>
						<div class='card-body'>
							<h5 class='card-title'>",ucwords($row_arr[6]['post_title']),"</h5>
							<p class='card-text'>",html_entity_decode(trim($row_arr[6]['post_incerpt'])),"</p>
						</a>
							<footer class='blockquote-footer text-right mb-1 mr-1'>
								On ",date("d F y", strtotime($row_arr[6]['post_date']))," by <cite title='Source Title'>",$row_arr[6]['post_author'],"</cite>
							</footer>
						</div>
					</div>

					<div class='card'>
						<a href='blogpagev2.php?postid=",$row_arr[1]['post_id'],"' class='nodecorat'>
						<img class='card-img-top' src='",$row_arr[1]['post_img'],"' alt=''>
						<div class='card-body'>
							<h5 class='card-title'>",ucwords($row_arr[1]['post_title']),"</h5>
							<p class='card-text'>",html_entity_decode(trim($row_arr[1]['post_incerpt'])),"</p>
						</a>
							<footer class='blockquote-footer text-right mb-1 mr-1'>
								On ",date("d F y", strtotime($row_arr[1]['post_date']))," by <cite title='Source Title'>",$row_arr[1]['post_author'],"</cite>
							</footer>
						</div>
					</div>

					<div class='card'>
						<a href='blogpagev2.php?postid=",$row_arr[4]['post_id'],"' class='nodecorat'>
						<img class='card-img-top' src='",$row_arr[4]['post_img'],"' alt=''>
						<div class='card-body'>
							<h5 class='card-title'>",ucwords($row_arr[4]['post_title']),"</h5>
							<p class='card-text'>",html_entity_decode(trim($row_arr[4]['post_incerpt'])),"</p>
						</a>
							<footer class='blockquote-footer text-right mb-1 mr-1'>
								On ",date("d F y", strtotime($row_arr[4]['post_date']))," by <cite title='Source Title'>",$row_arr[4]['post_author'],"</cite>
							</footer>
						</div>
					</div>
					
					<div class='card'>
						<a href='blogpagev2.php?postid=",$row_arr[7]['post_id'],"' class='nodecorat'>
						<img class='card-img-top' src='",$row_arr[7]['post_img'],"' alt=''>
						<div class='card-body'>
							<h5 class='card-title'>",ucwords($row_arr[7]['post_title']),"</h5>
							<p class='card-text'>",html_entity_decode(trim($row_arr[7]['post_incerpt'])),"</p>
						</a>
							<footer class='blockquote-footer text-right mb-1 mr-1'>
								On ",date("d F y", strtotime($row_arr[7]['post_date']))," by <cite title='Source Title'>",$row_arr[7]['post_author'],"</cite>
							</footer>
						</div>
					</div>

					<div class='card'>
						<a href='blogpagev2.php?postid=",$row_arr[2]['post_id'],"' class='nodecorat'>
						<img class='card-img-top' src='",$row_arr[2]['post_img'],"' alt=''>
						<div class='card-body'>
							<h5 class='card-title'>",ucwords($row_arr[2]['post_title']),"</h5>
							<p class='card-text'>",html_entity_decode(trim($row_arr[2]['post_incerpt'])),"</p>
						</a>
							<footer class='blockquote-footer text-right mb-1 mr-1'>
								On ",date("d F y", strtotime($row_arr[2]['post_date']))," by <cite title='Source Title'>",$row_arr[2]['post_author'],"</cite>
							</footer>
						</div>
					</div>

					<div class='card'>
						<a href='blogpagev2.php?postid=",$row_arr[5]['post_id'],"' class='nodecorat'>
						<img class='card-img-top' src='",$row_arr[5]['post_img'],"' alt=''>
						<div class='card-body'>
							<h5 class='card-title'>",ucwords($row_arr[5]['post_title']),"</h5>
							<p class='card-text'>",html_entity_decode(trim($row_arr[5]['post_incerpt'])),"</p>
						</a>
							<footer class='blockquote-footer text-right mb-1 mr-1'>
								On ",date("d F y", strtotime($row_arr[5]['post_date']))," by <cite title='Source Title'>",$row_arr[5]['post_author'],"</cite>
							</footer>
						</div>
					</div>

					<div class='card'>
						<a href='blogpagev2.php?postid=",$row_arr[8]['post_id'],"' class='nodecorat'>
						<img class='card-img-top' src='",$row_arr[8]['post_img'],"' alt=''>
						<div class='card-body'>
							<h5 class='card-title'>",ucwords($row_arr[8]['post_title']),"</h5>
							<p class='card-text'>",html_entity_decode(trim($row_arr[8]['post_incerpt'])),"</p>
						</a>
							<footer class='blockquote-footer text-right mb-1 mr-1'>
								On ",date("d F y", strtotime($row_arr[8]['post_date']))," by <cite title='Source Title'>",$row_arr[8]['post_author'],"</cite>
							</footer>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<nav aria-label='Page navigation example' class='mt-5 fadeIn a1  '>
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
					<a class='page-link' href='blogpagev2.php?page={$prev}' aria-label='Previous'>
						<span aria-hidden='true'>&laquo;</span>
						<span class='sr-only'>Previous</span>
					</a>
				</li>
				";
				// continue;
			}

			$active = ($current == $num) ? "active": "";
			echo "
				<li class='page-item'><a class='page-link {$active}' href='blogpagev2.php?page={$num}'>{$num}</a></li>
			";

			if ($num == $maxpage && $maxpage != $numpages) {
				$nex = $maxpage + 1;
				echo "
				<li class='page-item'>
					<a class='page-link' href='blogpagev2.php?page={$nex}' aria-label='Next'>
						<span aria-hidden='true'>&raquo;</span>
						<span class='sr-only'>Next</span>
					</a>
				</li>
				";
				// continue;
			}

		} //end of for loop
		echo "</ul></nav> "; //end of pagination nav tag
				
	} //if at line 5 ends. to show blogs according to page num

	//to show blog
	if (isset($_GET['postid'])) {
		// echo '<h1>' . $_GET['postid'] . '</h1>' ;
		$stmt = $pdo->prepare('SELECT * FROM posts WHERE post_id = :postidvar');
		$stmt->execute(array(":postidvar"=>$_GET['postid']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		// echo "<style>
		// 		img{
	 //    			max-width: 100%;
	 //    			height: auto;
	 //    			}
  //   		</style>	
		// ";
		echo "<div class = 'container'><h1 class='col-12 text-center mt-4' id='blogtitle'>" . ucwords($row['post_title']). "</h1>" . "<div class='col-12 mr-2 proflinks'>- " . date("d F y", strtotime($row['post_date']))." by " . $row['post_author'].
			"</div><br><br>" .

			htmlspecialchars_decode($row['post_content']) . 
			"</div>"; 
	}
	
?>
<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src='https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js'></script>
<script src='node_modules/jquery/dist/jquery.slim.min.js'></script>
<script src='node_modules/popper.js/dist/umd/popper.min.js'></script>
<script src='node_modules/bootstrap/dist/js/bootstrap.min.js'></script>


