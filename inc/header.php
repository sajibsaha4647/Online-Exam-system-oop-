<?php
$filepath = realpath(dirname(__DIR__));
include_once ($filepath.'../lib/Session.php');
	// Session::init();
	Session::checkSessionFront();
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
		Session::destroy();
		header("Location:index.php");
}
?>



<!doctype html>
<html>
<head>
	<title>Online Exam System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery.js"></script>
	 <!-- <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script> -->
	<script src="js/main.js"></script>
	
</head>
<body>

<div class="phpcoding">
	<section class="headeroption"></section>
		<section class="maincontent">
		<div class="menu">
		<ul>
			
			<li><a href="profile.php">Profile</a></li>
			<li><a href="exam.php">Exam</a></li>
			<?php 
				if(Session::get('adminlogin') == true){	
			?>
			<li><a href="?action=logout">Logout</a></li>
			<?php 
				}else{

			?>
			<li><a href="index.php">Login</a></li>
				<?php }
				?>
			
		</ul>
		</div>
	