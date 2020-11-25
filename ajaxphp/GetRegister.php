<?php 

 $filepath = realpath(dirname(__DIR__));
include_once ($filepath.'../class/Frontlogin.php');

$Frontlogin = new Frontlogin();


  if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $userReg = $Frontlogin->Registration($_POST);
  }








?>