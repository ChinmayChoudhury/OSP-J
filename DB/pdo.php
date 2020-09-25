<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=dashboard;charset=UTF8', 'localuser', 'localuserpass');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>