<?php
session_start();
    
    

    if (isset($_POST['submit'])) {
        // check if all fields are filled
        if (strlen($_POST['name'])<1 || strlen($_POST['subject'])<1 || strlen($_POST['email'])<1 || strlen($_POST['message'])<1) {
            $_SESSION['error'] = "All fields are necessary";
            header("Location: contactv2.php"); return;
        }
        // validate data
        // email validation
        if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Invalid email";
            header("Location: contactv2.php"); return;
        }
        // all data is fine, include contactusmailv2.php
        // require_once './mail/contactusmailv2.php';
    }
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
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css/contactv2.css">
    <link rel="stylesheet" href="css/header_footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Muli:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/kkb7kdd.css">
    <title>VBC | Contact Us</title>
</head>
<body>
	<!-- Include header and jumbotron  -->
	<?php include_once 'headerv2.php'; ?>

	<!-- Feedback/contact form -->
	<div class="container" id="formCon">
		<div class="row row-content">
			<div class="col-12 text-center mb-3">
				<h3>Got something to say? Let us know!</h3>
			</div>
            <?php 
                if (isset($_SESSION['error'])) {
                    echo '<p style="color: red">', $_SESSION['error'], '</p';
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo '<p style="color:green">', $_SESSION['success'], '</p>';
                    unset($_SESSION['success']);
                }
            ?>
			<div class="col-12 offset-md-1 col-md-8">
				<form method="post" id="feedform">
					<div class="form-group row">
                        <label for="name" class="col-md-6 col-form-label text-lg-right text-md-center">Name<span style="color: red">*</span>:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control pill" id="name" name="name" placeholder="" required>
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
					<div class="form-group row">
                        <label for="subject" class="col-md-6 col-form-label text-lg-right text-md-center">Subject<span style="color: red">*</span>:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control pill" id="subject" name="subject" placeholder="" required>
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
					<div class="form-group row">
                        <label for="email" class="col-md-6 col-form-label text-lg-right text-md-center">Email Address<span style="color: red">*</span>:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control pill" id="email" name="email" placeholder="" required>
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
					<div class="form-group row">
                        <label for="message" class="col-md-6 col-form-label text-lg-right text-md-center">Message<span style="color: red">*</span>:</label>
                        <div class="col-md-5">
                            <textarea class="form-control pill" id="message" name="message" placeholder="" rows="5" col = "15" required></textarea> 
                        </div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>                                                            						
				</form>
			</div>
			<br>
			<div class="col-12 text-center mt-3">
				<button class="btn pill" name="submit" value="submit" form="feedform">
					&nbsp;Submit&nbsp;
				</button>
			</div>

		</div>
	</div>



	<!-- Include Footer -->
	<?php include_once 'footerv2.php'; ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- To make navbar element active  -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#contact").addClass("active");
        })  
    </script>

</body>
</html>