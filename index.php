<?php 

// include_once('inc/header.php');
include_once('class/Frontlogin.php');
$Frontlogin = new Frontlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$result = $Frontlogin->LoginFront($_POST);
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
			<li><a href="register.php">Register</a></li>
			<li><a href="index.php">Login</a></li>
		</ul>
		</div>
<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
	 <?php 
      if(isset($result)){
        echo $result;
      }
    ?>
		<table class="tbl">    
			 <tr>
			   <td>Username</td>
			   <td><input name="username" type="text"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" type="password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="submit" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	</div>


	
</div>
<?php
 include_once('inc/footer.php'); 
?>