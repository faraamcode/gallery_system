<?php 

defined('DS') ? null :define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', 'C:'.DS.'xampp'.DS.'htdocs'.DS.'oop'.DS.'cms');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');
require_once("new_config.php");
require_once("database.php");
require_once("function.php");
require_once("db_object.php");
require_once("user.php");
require_once("books.php");
require_once("session.php");
require_once("comment.php");
require_once("paginate.php");
?>