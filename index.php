<?php
    session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/header_footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Muli:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/kkb7kdd.css">
    <title>Covid-19 Dasboard</title>
</head>

<body>

    <nav class="navbar sticky-top navbar-expand-md">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-navicon" style="color:#333333; font-size:28px;"></i>
                    
                </span>
            </button>
            <div class="d-md-none header2">
                Covid-19 Dashboard &nbsp;
                <img src="img/logo.png" height="30" width="30" alt="Logo">
            </div>
            
            <a class="navbar-brand mr-auto" href="#"></a>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link navbar-heading" href="#">
                            <img src="img/logo.png" height="30" width="30" alt="VBC Logo">
                            &nbsp;
                            Covid-19 Dashboard
                        </a>
                    </li>
                </ul>

                <span class="nav-item">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="/blogpagev2.php">Blogs</a></li>
                        <?php if(!isset($_SESSION['user'])){?>
                        <li class="nav-item"><a class="nav-link" href="/signinv2.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="/registerv2.php">Register</a></li>
                        <?php } else{?>
                        <li class="nav-item"><a class="nav-link" href="/dashboardv2.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="/logoutv2.php">Logout</a></li>
                        <?php }?>
                    </ul>
                </span>
            </div>
        </div>
    </nav>

<div class="container">
    <h1 class="text-center">Covid 19 Dashboard</h1>
    <!-- API data will be shown here. -->

    <!-- Fetching and displaying data from the API -->
    <!-- <div class="row mt-5"> -->
    <?php
        $tdata = json_decode(file_get_contents('https://api.covid19india.org/data.json'),true);
        $data = $tdata['statewise'];
        //0 index has total values, other indexes have state/UT data
    ?>
    <!-- <div class="row"> -->
        <span><i>Last updated on: <?= $data[0]['lastupdatedtime'] ?></i></span>
        &nbsp;&nbsp;
        <a href="index.php"><i class="fa fa-refresh" aria-hidden="true"></i></a><br>
        <a href="/statewise.php">See statewise data</a>
        <div class="mt-4 mb-5">
        <div class="row">
            <div class="col-6 text-center h-25 p-3 confirmed" >
                <h3>Confirmed</h3>

                <span class="numbers"><?= $data[0]['confirmed']?></span><br>
                <span class="smallnumbers">+<?= $data[0]['deltaconfirmed']?></span>

            </div>
            <div class="col-6 text-center h-25 p-3 activec" >
                <h3>Active</h3>
                <span class="numbers"><?= $data[0]['active']?></span><br><br>

            </div>
        </div>
        <div class="row">            
            <div class="col-6 text-center h-25 p-3 recovered" >
                <h3>Recovered</h3>
                <span class="numbers"><?= $data[0]['recovered']?></span><br>
                <span class="smallnumbers">+<?= $data[0]['deltarecovered']?></span> 
            </div>
            <div class="col-6 text-center h-25 p-3 death" >
                <h3>Deaths</h3>
                <span class="numbers"><?= $data[0]['deaths']?></span><br>
                <span class="smallnumbers">+<?= $data[0]['deltadeaths']?></span> 
            </div>
        </div>
    </div>
    <!-- </div> -->
</div>

    <?php
        include_once 'footerv2.php';
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>