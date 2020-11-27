<?php include("includes/header.php"); ?>
<?php if(!isset($_SESSION['user_id'])){redirect("login.php");}?>

<?php 
if (empty($_GET['id'])) {
    redirect('photo.php');
} 
	# code...
$photo = Book::fetchUserById($_GET['id']);
if ($photo) {
	 $session->message("The photo {$photo->filename} has been deleted successfully");
	$photo->delete_photo();
	redirect('photo.php');
	# code...
}else{
	redirect('photo.php');
}

 ?>