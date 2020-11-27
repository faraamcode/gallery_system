<?php
require("init.php");
if (isset($_POST['image_id'])) {

	$user = new user;

$user->ajax_code_method($_POST['image_id'],  $_POST['user_id']);

	# code...
}
if (isset($_POST['photo_id'])) {

	

 Book::user_sidebar_data($_POST['photo_id']);

	# code...
}






?>