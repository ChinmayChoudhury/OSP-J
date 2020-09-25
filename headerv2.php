<?php 
 

if (isset($_SESSION['LAST_ACTIVITY'])) {
	if (time() - $_SESSION['LAST_ACTIVITY'] > 1800) {
			session_unset();
			session_destroy();
		}
}
$_SESSION['LAST_ACTIVITY'] = time();
?>


		<nav class="navbar sticky-top navbar-expand-md">
				<div class="container">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
								<span class="navbar-toggler-icon">
										<i class="fa fa-navicon" style="color:#333333; font-size:28px;"></i>    
								</span>
						</button>
						<div class="d-md-none header2">
								Covid-19 Dashboard &nbsp;
								<!-- <img src="img/logo.png" height="30" width="30" alt="VBC Logo"> -->
						</div>
						<a class="navbar-brand mr-auto" href="#"></a>
						<div class="collapse navbar-collapse" id="Navbar">
								<ul class="navbar-nav mr-auto">
										<li class="nav-item" id="home"><a class="nav-link" href="/"><span class="fa fa-home fa-lg"></span></a></li>
										<li class="nav-item" id="blogs"><a class="nav-link" href="./blogpagev2.php">Blogs</a></li>

										<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Categories
												</a>
												<div class="dropdown-menu" aria-labelledby="navbarDropdown">
													<a class="dropdown-item" href="#">By Doctors</a>
													<a class="dropdown-item" href="#">By Astrologer</a>
													<a class="dropdown-item" href="#">Personal Experiences</a>
													<a class="dropdown-item" href="#">By Frontliners</a>                
												</div>
										</li>

										<!-- <li class="nav-item dropdown" id="Events">
												<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Events
												</a>
												<div class="dropdown-menu" aria-labelledby="navbarDropdown">
													<a class="dropdown-item" href="#">Riviera</a>
													<a class="dropdown-item" href="#">GraVITas</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="#">Weekly</a>
												</div>
										</li> -->
										<li class="nav-item" id="contact"><a class="nav-link" href="./contactv2.php">Contact</a></li>
										<li class="nav-item" id="about"><a class="nav-link" href="./aboutusv2.php">About Us</a></li>
								</ul>
								<span class="nav-item">
									<?php if(!isset($_SESSION['user'])){ 
										echo '
										<ul class="navbar-nav mr-auto">
												<li class="nav-item" id="signin"><a class="nav-link" href="./signinv2.php">Login</a></li>
												<li class="nav-item" id="register"><a class="nav-link" href="/registerv2.php">Register</a></li>
										</ul> ';
									  }
												else{ 
													echo '
										<ul class="navbar-nav mr-auto">
												<li class="nav-item" id="dashboard"><a class="nav-link" href="./dashboardv2.php">Dashboard</a></li>
												<li class="nav-item" id="logout"><a class="nav-link" href="/logoutv2.php">Logout</a></li>
										</ul>' ;
									 } ?>
								</span>
						</div>
				</div>
		</nav>

