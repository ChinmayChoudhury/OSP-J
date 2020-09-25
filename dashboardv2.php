<?php
	
	session_start();
	// enable in production, forced login
	if (!isset($_SESSION['user'])) {
		$_SESSION['error'] = "Kindly login first.";
		header("Location: signinv2.php"); return;
	}
	//automatic logout
	if (isset($_SESSION['LAST_ACTIVITY'])) {
		if (time() - $_SESSION['LAST_ACTIVITY'] > 1800) {
			session_unset();
			session_destroy();
		}
	}
	$_SESSION['LAST_ACTIVITY'] = time();
?>


	


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- <link rel="stylesheet" href="css/profile.css"> -->
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Muli:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/kkb7kdd.css">

    <?php 
    	if(!$_REQUEST){
    		echo '<title>VBC | Dashboard</title>';
    	}
	?>

    <!-- <title>Dashboard<title> -->
</head>
<body>

	<!-- dashboard navbar -->
	<nav class="navbar sticky-top navbar-expand-md">
	<div class="container">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
			<span class="navbar-toggler-icon">
				<i class="fa fa-navicon" style="color:#333333; font-size:28px;"></i>    
			</span>
		</button>
		<div class="d-md-none header2">
			Visual Bloggers' Club &nbsp;
			<img src="img/logo.png" height="30" width="30" alt="VBC Logo">
		</div>
		<a class="navbar-brand mr-auto" href="#"></a>
		<div class="collapse navbar-collapse" id="Navbar">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item" id="blogs"><a class="nav-link <?php echo !$_REQUEST?'active': ''; ?>" href="./dashboardv2.php">Dashboard</a></li>
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Posts
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="dashboardv2.php?addpost">Add post</a>
						<a class="dropdown-item" href="dashboardv2.php?view_post">View posts</a>
					</div>
				</li>
				<?php if($_SESSION['userstatus'] > 1) {?>
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Admin roles
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="dashboardv2.php?approve_posts">Approve posts</a>
					</div>
				</li>
				
				<?php } ?>
				<li class="nav-item" id="dashboard"><a class="nav-link <?php echo isset($_REQUEST['whatsnew'])?'active': ''; ?>" href="dashboardv2.php?whatsnew">What's new</a></li>
				
				<li class="nav-item" id="dashboard"><a class="nav-link" href="blogpagev2.php">Return</a></li>
				
				<li class="nav-item" id="dashboard"><a class="nav-link" href="contactv2.php">Contact</a></li>								
			</ul>
			<span class="nav-item">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item" id="dashboard"><a class="nav-link <?php echo isset($_REQUEST['profile'])?'active': ''; ?> " href="dashboardv2.php?profile">Profile</a></li>
					<li class="nav-item" id="logout"><a class="nav-link" href="/logoutv2.php">Logout</a></li>
				</ul>
			</span>
		</div>
	</div>
	</nav>
	<?php 
		if(isset($_SESSION['success'])){
			echo "<p class='text-center' style='color:green'>".$_SESSION['success']."</p>";
			unset($_SESSION['success']);
		}
	?>

	<!-- nav end -->

	<!-- <div class="container">	 -->
		<?php if (!$_REQUEST) { ?>
		<div class="container">
		<h3 class="text-center">Welcome <?php echo (isset($_SESSION['user'])) ? $_SESSION['user'] : '***DEMO***'; ?>!!</h3>	
		</div>
		<?php } ?>

		<!-- <div id="content"> -->
			<!-- display respective content on dashboard -->
			<?php 
				if (isset($_REQUEST['addpost'])) {
					include_once 'addpost.php';
				}
				elseif (isset($_REQUEST['view_post'])) {
					include_once 'view_post.php';	
				}
				elseif (isset($_REQUEST['whatsnew'])) {
					include_once 'whatsnew.php';
				}
				elseif (isset($_REQUEST['profile'])) {
					echo '<link rel="stylesheet" href="css/profile.css">';
					include_once 'userprofilev2.php';
				}
				//admin roles
				elseif (isset($_REQUEST['approve_posts']) && $_SESSION['userstatus'] > 1) {
					include_once 'approve_posts.php' ;
				}
				elseif(isset($_REQUEST['view_all_posts']) && $_SESSION['userstatus'] > 1){
					include_once 'view_all_posts.php';
				}
				elseif(isset($_REQUEST['manage_cat']) && $_SESSION['userstatus'] > 1){
					include_once 'manage_cat.php';
				}elseif (isset($_REQUEST['edit_post'])) {
					include_once 'edit_post.php';
				}elseif (isset($_REQUEST['preview'])) {
					include_once 'preview.php';
				}elseif (isset($_REQUEST['delete'])) {
					include_once 'delete.php';
				}

				
			?>
		<!-- </div> -->
	<!-- </div> -->



    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>