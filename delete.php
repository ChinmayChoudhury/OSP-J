<?php
	if (isset($_SESSION['userid']) && isset($_REQUEST['delete']) && isset($_GET['post_id'])) {
		require_once 'DB/pdo.php';
		echo $_GET['post_id'];
		$stmt = $pdo->prepare("SELECT post_author_id FROM posts WHERE post_id= :idvar");
		$stmt->execute([":idvar"=> $_GET['post_id']]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row['post_author_id'] === $_SESSION['userid'] || isset($_REQUEST['admin'])){
			$stmt= $pdo->prepare("DELETE FROM posts WHERE post_id=:idvar");
			$stmt->execute([":idvar"=> $_GET['post_id']]);
			$_SESSION['success'] = "Post has been deleted.";
			if (isset($_REQUEST['admin'])) {
				header("Location:dashboardv2.php?view_all_posts"); return;
			}
			header("Location: dashboardv2.php?view_post"); return;
		}
		else{
			header("Location: errorv2.php?code=20005"); return;
		}
		

	}


?>