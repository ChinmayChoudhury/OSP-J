<title>View posts</title>

<?php 
	require_once 'DB/pdo.php';
	$query = "SELECT * FROM `posts` WHERE post_id=".$_GET['post_id'];
	$stmt = $pdo->query($query);
	$stmt->execute();
	$prevDataRow = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($prevDataRow['post_author_id'] != $_SESSION['userid']) {
		$_SESSION['error'] = "That's not your post!!!";
		header("Location: dashboardv2.php?view_post"); return;
	}

	if (isset($_GET['post_id'])) {
		$id = $_GET['post_id'];
		$query = "SELECT post_content,post_date,post_title,post_author,post_author_id FROM posts WHERE post_id=:id";
		$stmt = $pdo->prepare($query);
		$stmt->execute([":id"=>$_GET['post_id']]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo "<div class = 'container'><h3 class='justify-content-center mt-4'>Preview</h3><h1 class='col-12 text-center mt-4'>" . ucwords($row['post_title']). "</h1>" . "<div class='col-12 mr-2 proflinks'>- " . date("d F y", strtotime($row['post_date']))." by <a href='blogpagev2.php?prof_id=" . $row["post_author_id"] ."'>" . $row['post_author'].
			"</a></div><br><br>" .

			htmlspecialchars_decode($row['post_content']) . 
			"</div>"; 
	}

?>