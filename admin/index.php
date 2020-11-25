<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'../inc/header.php');
?>
<?php
  // Session::checkLogin();
?>

<div class="main">
<h1>Admin Panel</h1>
<h2>Hi <?=Session::get('adminuser')?></h2>


	
</div>
<?php include 'inc/footer.php'; ?>