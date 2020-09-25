<?php
	session_start();
	require_once 'DB/pdo.php';
	//if the user status is greater than 1 i.e. user is admin
	if ($_SESSION['userstatus']>1 && isset($_GET['post_id'])) {
		$stmt = $pdo->prepare('UPDATE posts SET post_status = 1 WHERE post_id = :postidvar');
		$stmt->execute([":postidvar"=>$_GET['post_id']]);
		$_SESSION['success'] = "Post has been approved";
		header("Location: dashboardv2.php?approve_posts"); return;
	}
	else {
		header("Location: errorv2.php?code=20005"); return;
	}

?>