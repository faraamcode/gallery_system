<?php include("includes/header.php"); ?>
<?php if(!isset($_SESSION['user_id'])){redirect("login.php");}?>

<?php 
if (empty($_GET['id'])) {
    redirect('users.php');
} 
	# code...
$user = user::fetchUserById($_GET['id']);
if ($user) {
	$user->delete_photo();
    $session->message("user {$user->username} has been deleted successfully");

	redirect('users.php');
	# code...
}else{
	redirect('users.php');
}

 ?>