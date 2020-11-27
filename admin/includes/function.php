<?php 
function classAutoload($class){
	$class = strtolower($class);
	$the_path ="includes/{$class}.php";
	if(is_file($the_path) && !class_exists($class)) {
		include $the_path;

		# code...
	}
}
	spl_autoload_register('classAutoload');

	function redirect($location){
		header("Location: {$location}");
	}
?>