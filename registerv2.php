 <?php
session_start();
    //if already signed in and tries to access register, ask to logout or DIE
    if (isset($_SESSION['user'])) {
        header("Location: errorv2.php?code=20002");
        return;
    }

    if (isset($_POST['register'])) {
        require_once './DB/pdo.php' ;
        // check if all fields are filled, this is also checked through frontend
        $flag = false;
        if (strlen($_POST['username'])<1 || strlen($_POST['phnum'])<1 || strlen($_POST['email'])<1 || strlen($_POST['password'])<1 or strlen($_POST['repassword'])<1 || strlen($_POST['dob'])<1 || strlen($_POST['fname'])<1 || strlen($_POST['lname'])<1) {
            $_SESSION['unfillErr'] = "<p>All fields are necessary</p>";
            header("Location: registerv2.php"); return;
        }
        // input validations
        // register number validation
        if (!preg_match("/^([6789]{1}[0-9]{9})$/", $_POST['phnum'])) {
            $_SESSION['regErr'] = "<p>Invalid register number. Eg: 18BIT0100(case sensitive)</p>"; $flag = true;
        }
        // email validation
        if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr'] = "<p>Invalid email</p>"; $flag = true;
        }

        // password validation
        $alpha = preg_match("/[a-zA-z]{1,}/", $_POST['password']);
        $num = preg_match("/[0-9]{1,}/", $_POST['password']);
        if (!$alpha || !$num || strlen($_POST['password'])<8) {
            $_SESSION['passErr'] = "<p>Password doesn't meet requirements</p>"; $flag = true;
        }
        if ($_POST['password'] != $_POST['repassword']) {
            $_SESSION['unmatchedErr'] = "<p>Passwords don't match</p>"; $flag = true;
        }
        
        if ($flag == false) {
            // $_SESSION['succ'] = "<p>Successfull entries</p>";
            // header("Location: registerv2.php"); return;
            //All data validated
            //check if username already exists
            $stmt = $pdo->prepare("SELECT usern FROM user where usern = :uservar");
            $stmt->execute(array(":uservar"=> $_POST['username']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){
                $_SESSION['userFound'] = "Username already taken";
                header("Location: registerv2.php"); return;
            }
            //check if email already exists
            $stmt = $pdo->prepare("SELECT email FROM user where email = :emailvar");
            $stmt->execute(array(":emailvar"=> $_POST['email']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){
                $_SESSION['emailFound'] = "Email already exists";
                header("Location: registerv2.php"); return;
            }
            //check if phnum already exists
            $stmt = $pdo->prepare("SELECT phnum FROM user where phnum = :phvar");
            $stmt->execute(array(":phvar"=> $_POST['phnum']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){
                $_SESSION['phFound'] = "Phone number already exists";
                header("Location: registerv2.php"); return;
            }
            //if all is good, insert the values into table
            
            // hash password, by default it uses bcrypt(5) AND generate token to be used for acc activation

            $passhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $tokenhash = md5(uniqid(rand(), true));

            $stmt = $pdo->prepare('INSERT INTO user(usern, phnum, email, passwd, dob, token, ts, status,fname,lname) VALUES (:user, :ph, :em, :pass, :db, :tokhash, NOW(), :statvar, :fnvar,:lnvar)');
            $stmt->execute(array(
                ':user'=>$_POST['username'],
                ':ph'=>$_POST['phnum'],
                ':em'=>$_POST['email'],
                ':pass'=>$passhash,
                ':db'=>$_POST['dob'],
                ':tokhash' => $tokenhash,
                'statvar' => "1",
                ':fnvar' => $_POST['fname'],
                ':lnvar' => $_POST['lname']
            ));

            $_SESSION['success'] = "Account has been created";
            header("Location: signinv2.php"); return;
            
        }
        else{
            header("Location: registerv2.php"); return;
        }

    }
?>

<!-- VIEW -->


<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Muli:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/kkb7kdd.css">
    <title>Register</title>
	

</head>
<body>
	<!-- include header file -->
	<?php include_once 'headerv2.php';  ?>

	<!-- Form -->
	<div class="container" id="formCon">
		<div class="row row-content">
			<div class="col-12 text-center mb-3">
				<h3>Register</h3>
			</div>
            <div class="col-12 text-center mb-3" id="errorfield">
                <?php 
                    // DATA VALIDATION ERROR PRINTS
                    if(isset($_SESSION['unfillErr'])){
                        echo $_SESSION['unfillErr'];
                        unset($_SESSION['unfillErr']);
                    }
                    if (isset($_SESSION['regErr'])) {
                        echo $_SESSION['regErr'];
                        unset($_SESSION['regErr']);
                    }
                    if (isset($_SESSION['emailErr'])) {
                        echo $_SESSION['emailErr'];
                        unset($_SESSION['emailErr']);
                    }
                    if (isset($_SESSION['passErr'])) {
                        echo $_SESSION['passErr'];
                        unset($_SESSION['passErr']);
                    }
                    if (isset($_SESSION['unmatchedErr'])) {
                        echo $_SESSION['unmatchedErr'];
                        unset($_SESSION['unmatchedErr']);
                    }
                    if (isset($_SESSION['userFound'])) {
                        echo $_SESSION['userFound']; unset($_SESSION['userFound']);
                    }
                    if (isset($_SESSION['emailFound'])) {
                        echo $_SESSION['emailFound']; unset($_SESSION['emailFound']);
                    }
                    if (isset($_SESSION['phFound'])) {
                        echo $_SESSION['phFound']; unset($_SESSION['phFound']);
                    }
                    if (isset($_SESSION['succ'])) {
                        echo $_SESSION['succ']; unset($_SESSION['succ']);
                    }
                ?>
            </div>
			<div class="col-12 offset-md-1 col-md-8">
				<form method="post" id="regform">
					<div class="form-group row">
                        <label for="username" class="col-md-6 col-form-label text-lg-right text-md-center">Username:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control pill" id="username" name="username" placeholder="" >
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-md-6 col-form-label text-lg-right text-md-center">Firstname:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control pill" id="fname" name="fname" placeholder="" >
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-md-6 col-form-label text-lg-right text-md-center">Lastname:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control pill" id="lname" name="lname" placeholder="" >
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
					<div class="form-group row">
                        <label for="phnum" class="col-md-6 col-form-label text-lg-right text-md-center">Phone Number:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control pill" id="phnum" name="phnum" placeholder="" >
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
					<div class="form-group row">
                        <label for="email" class="col-md-6 col-form-label text-lg-right text-md-center">Email:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control pill" id="email" name="email" placeholder="" >
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
					<div class="form-group row">
                        <label for="password" class="col-md-6 col-form-label text-lg-right text-md-center">Password:</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control pill" id="password" name="password" placeholder="" >
                            <div class="row-small text-center">Password must be longer than 8 characters & contain at least one alphabet and one number.</div>
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
					<div class="form-group row">
                        <label for="repassword" class="col-md-6 col-form-label text-lg-right text-md-center">Re-type Password:</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control pill" id="repassword" name="repassword" placeholder="" >
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
					<div class="form-group row">
                        <label for="dob" class="col-md-6 col-form-label text-lg-right text-md-center">DoB:</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control pill" id="dob" name="dob" >
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    
                        <!-- <input type="submit" name="submit" class="btn pill" value="Submit"> -->
                    
				</form>

			</div>
			<br>
			<div class="col-12 text-center mt-3">
				<button class="btn pill" name="register" value="submit" form="regform">
					&nbsp;Submit&nbsp;
				</button>
			</div>
		</div>
			<div class="row row-content custom1">
				<div class="col-12 text-center mt-3">
					Already a user?<a href="#"> Sign in</a>
				</div>
			</div>		
	</div>



	<!-- Footer -->
	<?php include_once 'footerv2.php'; ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- To make navbar element active  -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#register").addClass("active");
        })  
    </script>
</body>
</html>

