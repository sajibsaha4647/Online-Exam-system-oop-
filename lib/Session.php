<?php
class Session{
	 public static function init(){
	 	session_start();
	 }
	 
	 public static function set($key, $val){
	 	$_SESSION[$key] = $val;
	 }

	 public static function get($key){
	 	if (isset($_SESSION[$key])) {
	 		return $_SESSION[$key];
	 	} else {
	 		return false;
	 	}
	 }

	 public static function checkSession(){
		//  echo 'kaj kore';
	 	self::init();
	 	if (self::get("adminlogin") == false) {
	 		self::destroy();
	 		header("Location:login.php");
	 	}
	 }
	 public static function checkSessionFront(){
		//  echo 'kaj kore';
	 	self::init();
	 	if (self::get("adminlogin") == false) {
	 		self::destroy();
	 		header("Location:index.php");
	 	}
	 }

	

	 

	 public static function removesessionkey($key){
			unset($_SESSION[$key]);
	 }

	 public static function checkLogin(){
	 	self::init();
	 	if (self::get("adminlogin") == true) {
	 		header("Location:index.php");
	 	}
	 }

	 public static function destroy(){
		 // session_destroy();
		 session_destroy();
		 
	 	
	 }
}

?>