<?php 
// include_once('inc/header.php');
include_once('class/Frontlogin.php');

// $register = new Frontlogin();
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit'])) {
// 	$result = $register->Registration($_POST);
// }
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
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">
	<form name="contact-form" action="" method="post">
		<table>
		<tr>
           <td>Name</td>
           <td><input type="text" id="name" name="name"></td>
         </tr>
		<tr>
           <td>Username</td>
           <td><input id="username" type="text"  name="username"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" id="password" name="password"></td>
         </tr>
         
         <tr>
           <td>E-mail</td>
           <td><input id="email" type="text"  name="email"></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" id="submit" name="Regsubmit" value="Signup">
           </td>
         </tr>
          <div id="register"></div>
       </table>
     </form>
     <div></div>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>