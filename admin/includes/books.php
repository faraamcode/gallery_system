<?php

class Book extends Db_object{
	protected static $db_table = "books";
	protected static $db_table_fileds = array('id','title', 'caption','description', 'filename','alternate_text', 'type','size');

	public $title;
	public $caption;
	public $id;
	public $description;
	public $alternate_text;
	public $filename;
	public $type;
	public $size;

	public $tmp_path;
	public $uploaded_directory="images";// not created yet on the files
	public $errors = array();
	public $upload_error_array  = array(
UPLOAD_ERR_OK => "There is no error",
UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload maximum file size",
UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the upload maximum file size directive",
UPLOAD_ERR_NO_FILE => "No file uploadded",
UPLOAD_ERR_NO_TMP_DIR => "missing a temporaray folder",
UPLOAD_ERR_CANT_WRITE => "failed to write file to disk.",
UPLOAD_ERR_EXTENSION => "A PHP extenssion stopped the file upload.",  
);


	public function set_files($file){

    if (empty($file) || !$file || !is_array($file)) {
	$this->errors[] = "there was no file uploaded here";
	return false;
	# code...
}
elseif($file['error']!=0){
	$this->error[] = $this->upload_error_array[$file['error']];

} else{

$this->filename = basename($file['name']);
$this->tmp_path = $file['tmp_name'];
$this->size = $file['size'];
$this->type = $file['type'];

}


}

public function image_path(){

	return $this->uploaded_directory.DS.$this->filename;
}

public function save(){
	if ($this->id) {
		$this->update();
		# code...
	}else{

	if (!empty($this->errors)) {
		return false;
		# code...
	}
	if (empty($this->filename) || empty($this->tmp_path) ) {

		$this->errors[] = "the file was not available";
		return false;

		# code...
	}
	$file_path = SITE_ROOT.DS.'admin'.DS.$this->uploaded_directory.DS.$this->filename;
	if (file_exists($file_path)) {
		$this->errors[] = "This file {$this->filename} already exist";
		return false;
		# code...
	}
	if (move_uploaded_file($this->tmp_path, $file_path)) {
		if ($this->create()) {
			unset($this->tmp_path);
			return true;
			# code...
		}
		# code...
	}else{
		$this->errors[]= "Probbly the file does not have it permission set";
		return false;
	}
	
}

}

public function delete_photo(){

	if($this->delete()){
		$target_path = SITE_ROOT.DS.'admin'.DS.$this->image_path();
		return unlink($target_path)? true : false;
	}else{
		return false;
	}
}


public static function user_sidebar_data($photo_id){
 $photo = Book::fetchUserById($photo_id);

 $result ="<a href='#' ><img width='100' src='{$photo->image_path()}'></a>";

  $result .="<p>{$photo->filename}</p>";
   $result .="<p>{$photo->type}</p>";
    $result .="<p>{$photo->size}</p>";

    echo $result;

}

}
?>