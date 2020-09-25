<?php 
   session_start();
   if (isset($_SESSION['user'])) {
        // already logged in page
        header("Location: errorv2.php?code=20001"); return;
   }
   else{
        require_once './DB/pdo.php';
        if (isset($_POST['submit'])) {
            if (strlen($_POST['password'])<1 || strlen($_POST['email'])<1) {
                $_SESSION['error'] = "All fields are required";
                header("Location: signinv2.php");return;
            }
            // input(email) validations
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Invalid email";
                header("Location: signinv2.php");return;   
            }
            //all data is cool, authentication
            $stmt = $pdo->prepare("SELECT * FROM user where email = :emailvar");
            $stmt->execute(array(":emailvar"=> $_POST['email']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){
                // if account is found check if it is activated or not
                if ($row['status'] == 0) {
                    // unactivated account
                    $_SESSION['error'] = "Your account hasn't been activated yet, contact technical team for support";
                    header("Location: signinv2.php");
                    return;
                }
                else{
                    //match passwords and authenticate, put user in session
                    if (password_verify($_POST['password'], $row['passwd'])) {
                        // password verified
                        //store username in session
                        $_SESSION['user'] = $row['usern'];
                        // store user status in session
                        $_SESSION['userstatus'] = $row['status'];
                        $_SESSION['userid'] = $row['id'];
                        //change the header location to blogpage
                        header("Location: blogpagev2.php"); return;
                    }
                }
                // $_SESSION['logVal'] = "Email found";
                // header("Location: signinv2.php"); return;
            }
            //email not found
            else{
                $_SESSION['error'] = "Email not found";
                header("Location: signinv2.php");return;
            }
        }
   }
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Muli:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/kkb7kdd.css">
    <title>Sign In</title>

</head>
<body>
	<?php include_once 'headerv2.php' ; ?>

    <div class="container" id="form1">
        <!-- <h1><?php// echo $err; ?></h1> -->
        <div class="row row-content">
            <div class="col-12 text-center mb-3">
                <h3>Sign In</h3>
                <?php           
                //If you are redirected from register page with a success.
                    if (isset($_SESSION['success'])) {
                        echo '<p style="color: green">', $_SESSION['success'], '</p>';
                        unset($_SESSION['success']);
                    }
                    //printing errors
                    if (isset($_SESSION['error'])) {
                        echo '<p style="color: red">', $_SESSION['error'], '</p>';
                        unset($_SESSION['error']);   
                    }

                    //debug logs prints
                    if (isset($_SESSION['logVal'])) {
                        echo '<p style="color: orange">', $_SESSION['logVal'], '</p>';
                        unset($_SESSION['logVal']);   
                    }                    
                ?>
            </div>
            <div class="col-12 col-md-8 offset-md-1">
                <form method="post" id="signinform">
                    <div class="form-group row">
                        <label for="email" class="col-md-6 col-form-label text-lg-right text-md-center">Email:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control pill" id="email" name="email" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label text-md-center text-lg-right">Password:</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control pill" id="password" name="password" placeholder="">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-12 text-center mt-3">                
                <button type="submit" form="signinform" name="submit" value="submit" class="btn pill text-white black-bg">
                    &nbsp;Submit&nbsp;
                </button>
            </div>
            <br>
        </div>
        <div class="row row-content custom1">
            <div class="col-12 text-center mt-3">
                New user?
                <a href="registerv2.php">Register here.</a>
                <br>
            </div>
        </div>
    </div>
    <?php include_once 'footerv2.php'; ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- To make navbar element active  -->
    <script type="text/javascript">
    	$(document).ready(function() {
    		$("#signin").addClass("active");
    	})	
    </script>
</body>
</html>