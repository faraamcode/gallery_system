<?php

class Db_object{

public $upload_error_array  = array(
UPLOAD_ERR_OK => "There is no error",
UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload maximum file size",
UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the upload maximum file size directive",
UPLOAD_ERR_NO_FILE => "No file uploadded",
UPLOAD_ERR_NO_TMP_DIR => "missing a temporaray folder",
UPLOAD_ERR_CANT_WRITE => "failed to write file to disk.",
UPLOAD_ERR_EXTENSION => "A PHP extenssion stopped the file upload.",  
);

protected static $db_table = "users";

public static function fetchAlluser(){

	 global $database;
	 $result = static::fetchAllQuery("SELECT * from ".static::$db_table ." ");
      return $result;
    
}

public static function fetchUserById($id){

	 global $database;
  
     $the_array = static::fetchAllQuery("SELECT * from ".static::$db_table ." where id =$id LIMIT 1");
    if(!empty($the_array)){
    	return array_shift($the_array);
    }
    else {
    	return false;
    }


    
}


	public static function fetchAllQuery($sql){
	global $database;
	$result = $database->query($sql);
	$the_object = array();

	while ($row = mysqli_fetch_array($result)) {
		$the_object[] = static::turnObject($row);
		# code...
	}
    return  $the_object;

}

public static function turnObject($the_record){
	 $calling_class = get_called_class();
	                     // this method will get array as argument and turn it to object

	                     $newClass = new $calling_class;
                         //creating object with variable in class user(le passing array result into the object)$newClass->username = $userbyId['username']; $newClass->password = $userbyId['password'];  $newClass->id = $userbyId['id'];$newClass->last_name = $userbyId['last_name'];  $newClass->first_name = $userbyId['first_name'];

                         
                         foreach ($the_record as $the_attribute => $value) {
                         	if($newClass->has_the_attribute($the_attribute)){

                              $newClass->$the_attribute=$value; 
                         	}
                         	# code...
                         }
                        
                          
                        
                         return $newClass;
}

private function has_the_attribute($the_attribute){
	$object_properties = get_object_vars($this);
	return array_key_exists($the_attribute, $object_properties);
}


protected function properties(){

	$properties = array();
	foreach(static::$db_table_fileds as $db_field){
		if(property_exists($this, $db_field)){
			$properties[$db_field] =$this->$db_field;
		}
		# code...
	}
	return $properties;
} 

protected function clean_properties(){
	global $database;
	$clean_properties = array();
	foreach ($this->properties() as $key => $value) {

		$clean_properties[$key] = $database->escape_string($value);

		# code...
	}
	return $clean_properties;
}

// data abstraction 
public function save(){

	return isset($this->id) ? $this->update() : $this->create();
}

public function create(){

	global $database;
	$properties = $this->clean_properties();

	$sql = "INSERT INTO ".static::$db_table ."(".implode(",", array_keys($properties)).") VALUES('".implode("','", array_values($properties))."')";


	if($database->query($sql)){
		$this->id = $database->the_insert_id();
		return true;
	}else{
		return false;
	}

}


public function update(){

		global $database;
		$properties = $this->clean_properties();
        $properties_pairs =array();
        foreach ($properties as $key => $value) {
        	 $properties_pairs[]= "{$key}='{$value}'";
        	# code...
        }
$sql ="UPDATE ".static::$db_table ." SET ";
$sql .=implode(", ", $properties_pairs);
$sql .=" WHERE id=".$database->escape_string($this->id);

$database->query($sql);

return (mysqli_affected_rows($database->connection)==1)? true : false;
}
public function Delete(){
	global $database;
	$sql ="DELETE FROM ".static::$db_table ." WHERE id ={$database->escape_string($this->id)}";

	$database->query($sql);
	return (mysqli_affected_rows($database->connection)) ? true : false;



}

public static function count_all(){
     global $database;
	$sql = "SELECT COUNT(*) FROM ".static::$db_table;
	$result = $database->query($sql);
	$row = mysqli_fetch_array($result);
	return array_shift($row);

}

}
?>