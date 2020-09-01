<?php


class Session{
	
	public static function init(){
		if (version_compare(Phpversion(),'7.2.1','<')) {
			if (session_id()==' ') {

				session_start();
			}
			
		}else{
			if(session_status()==PHP_SESSION_NONE){
				session_start();
			}
		}
	}


	public static Function set($key,$val){
		$_SESSION[$key]=$val;
	}

	public static function get($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}else{
			return  false;
		}
	}


	public static function checkSession(){
		if(self::get('login')==false){
			self::destroy();
			header('location:login.php');
		}
	}

	public static function checkLogin(){
		if(self::get('login')==true){
			
			header('location:index.php');
		}
	}

  public function destroy(){
  	 session_destroy();
  	 session_unset();
  	 header('location:login.php');
  }


}
?>