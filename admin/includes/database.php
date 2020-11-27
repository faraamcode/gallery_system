<?php

require_once("new_config.php");
class Database{



public $connection;


function __construct(){
   $this->open_db_connection();

}

public function open_db_connection(){

$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {

die(" your connection failed".mysqli_error()); 

	

}
// function of constructor will always execute at any instace which will connect our database automatically.
}
 public function Query($sql){
  $result = $this->connection->query($sql);

 
  	  return $result;

 }


 private function confirmQuery(){

 	 if(!$result){
  	die("Query Failed".$this->connection->error);

  	  }
   
 }

 public function escape_string($string){
    $escape_string = $this->connection->real_escape_string($string);

    return $escape_string;
 }


 public function the_insert_id(){
 	return mysqli_insert_id($this->connection);
 }

}

$database = new Database();


?>

