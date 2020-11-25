<?php 
    // $filepath = realpath(dirname(__FILE__));
	// require_once($filepath.'/inc/loginheader.php');
	include_once("../lib/Session.php");
	include_once('../class/admin.php');
// Session::init();
	Session::checkLogin();
	$kadmin = new Admin();

?>

<?php   

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$Admindata = $kadmin->getadmindata($_POST);


	}

?>
<!doctype html>
<html>
<head>
	<title>Admin</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="phpcoding">
	<section class="headeroption"></section>
		<section class="maincontent">
		<div class="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="users.php">Manage user</a></li>
			<li><a href="quesadd.php">Add Ques</a></li>
			<li><a href="queslist.php">Ques List</a></li>
			<li><a href="?action=logout">Logout</a></li>
		</ul>
	 </div>
<div class="main">
<h1>Admin Login</h1>
<div class="adminlogin">
	<form action="" method="post" enctype="multipart/form-data">
		<?php 
			if(isset($Admindata)){
				echo $Admindata ;
			}
		?>
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Login"/></td>
			</tr>
		</table>
	</from>
</div>
</div>
</section>
<section class="footeroption">
		<h2><?php echo "www.trainingwithliveproject.com"; ?></h2>
	</section>
</div>
</body>
</html>