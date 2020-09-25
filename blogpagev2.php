<?php

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags always come first -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/header_footer.css">
    <link rel="stylesheet" type="text/css" href="css/blogs.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Muli:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/kkb7kdd.css">
    <title>Blogs</title>
</head>
<body>

	<?php require_once 'headerv2.php'; ?>

	
    <?php 
        if (!$_REQUEST || isset($_REQUEST['page']) || isset($_REQUEST['postid'])) {
            require_once 'blogsv2.php'; 
        }
        // if (isset($_REQUEST['pid']))
    ?>

	<?php require_once 'footerv2.php'; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#blogs").addClass("active");
        })  
    </script>

</body>
</html>