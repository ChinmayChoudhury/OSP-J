<?php
	if (isset($_GET['code'])) {
		if ($_GET['code'] == "20001") {
			$error = "You are already logged in!!! What more do you want from your life? huh?";
		}
		elseif ($_GET['code'] == "20002") {
			$error = "Logout before signing up. There should have been an easter egg here, don't you think?";
		}
		elseif ($_GET['code'] == "20003") {
			$error = "You have come far from home. :)";
		}
		elseif ($_GET['code'] == "20004") {
			$error = "Invalid token, redirected.";
		}
		elseif ($_GET['code'] =="20005") {
			$error = "You can't delete that post LOL. Anyway nice try.";
		}elseif ($_GET['code'] =="20006") {
			$error = "You are not priviledged enough yet to perform that action.";
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
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css/error.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Muli:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/kkb7kdd.css">
    <title>Sign In</title>
</head>
<body>
	<div class="container">
		<div class="row row-content text-center" id="error_text">
			<?= $error ?>
		</div>
		<div class="row row-content text-center mt-5" id="redir">
			<div class="col-12 text-center">
				<a href="index.html" class="text-center">Click here, let's take you back to homepage</a>
			</div>
		</div>
	</div>


</body>
</html>