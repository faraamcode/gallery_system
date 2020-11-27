<?php
class user extends Db_object{
	protected static $db_table = "users";
	protected static $db_table_fileds = array('username', 'password', 'first_name', 'last_name','user_image');

	public $username;
	public $id;
	public $password;
	public $first_name;
	public $last_name;
	public $user_image;
	public $upload_dirrectory= "images";
	public $placeholder = "http://placehold.it/400x400&text=image";




public function set_files($file){

    if (empty($file) || !$file || !is_array($file)) {
	$this->errors[] = "there was no file uploaded here";
	return false;
	# code...
}
elseif($file['error']!=0){
	$this->error[] = $this->upload_error_array[$file['error']];

} else{

$this->user_image = basename($file['name']);
$this->tmp_path = $file['tmp_name'];
$this->size = $file['size'];
$this->type = $file['type'];

}


}


public function save_user_image(){


	if (!empty($this->errors)) {
		return false;
		# code...
	}
	if (empty($this->user_image) || empty($this->tmp_path) ) {

		$this->errors[] = "the file was not available";
		return false;

		# code...
	}
	$file_path = SITE_ROOT.DS.'admin'.DS.$this->upload_dirrectory.DS.$this->user_image;
	if (file_exists($file_path)) {
		$this->errors[] = "This file {$this->user_image} already exist";
		return false;
		# code...
	}
	if (move_uploaded_file($this->tmp_path, $file_path)) {
	
			unset($this->tmp_path);
			return true;
			# code...
	
		# code...
	}else{
		$this->errors[]= "Probbly the file does not have it permission set";
		return false;
	}
	

}






	public function image_placeholder(){
		return empty($this->user_image)?  $this->placeholder:  $this->upload_dirrectory.DS.$this->user_image;
	}





public static function verify_user($username, $password){
	global $database;
	


	$sql= "SELECT * from ".self::$db_table ." WHERE ";
	$sql .="username = '{$username}' ";
	$sql .="AND password = '{$password}' ";
	$sql .= "LIMIT 1";

	$the_array_result = self::fetchAllQuery($sql);

	 if(!empty($the_array_result)){
    	return array_shift($the_array_result);
    }
    else {
    	return false;
    }
    	 
  


}

public function delete_user(){

	if($this->delete()){
		$target_path = SITE_ROOT.DS.'admin'.DS.$this->image_placeholder();
		return unlink($target_path)? true : false;
	}else{
		return false;
	}
}

public function ajax_code_method($image_id,  $user_id){

	global $database;


	$this->id = $database->escape_string($user_id);
	$this->user_image =$database->escape_string($image_id);

	$sql ="UPDATE ".self::$db_table;
	$sql .= " SET user_image = '{$this->user_image}'";
	$sql .=" WHERE id = ".$this->id;

	$update_image = $database->query($sql);

	echo $this->image_placeholder();



}

public function delete_photo(){

	if($this->delete()){
		$target_path = SITE_ROOT.DS.'admin'.DS.$this->upload_dirrectory.DS.$this->user_image;
		return unlink($target_path)? true : false;
	}else{
		return false;
	}
}
  
}

?>