<?php

class Session{
	private  $sign_in = false;
	public  $user_id;
	public $message;
	public $count;


	function __construct() {
		session_start();
		$this->check_if_signed_in(); 
		$this->check_message();
		$this->visitor_count();
	}

public function message($msg=""){
	if (!empty($msg)) {
		$_SESSION['message'] = $msg;

		# code...
	}else{
		return $this->message;
	}

}

public function visitor_count(){
   if (isset($_SESSION['count'])) {
    return $this->count = $_SESSION['count']++;


   	# code...
   }else{
      return  $_SESSION['count']=1;

   }

}

private function check_message(){
	if(isset($_SESSION['message'])){
		$this->message =$_SESSION['message'];
		unset($_SESSION['message']);
	}
}





	
	public function login($user){
		if($user){
			$this->user_id = $_SESSION['user_id'] = $user->first_name;
			return $this->sign_in = true;
		}

	}
	public function is_signed_in(){
		return $this->sign_in;
	}
	public function logout(){
		unset($_SESSION['user_id']);
		unset($this->userId);
		$this->sign_in = false;
	}
	private function check_if_signed_in(){
      if(isset($_SESSION['user_id'])){
      	$this->user_id = $_SESSION['user_id'];
      	$this->sign_in = true;
      }else{
      	unset($this->user_id);
      	$this->sign_in = false;
      }
	}
}
 $session = new Session();

 $message = $session->message();
?>