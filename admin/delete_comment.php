<?php include("includes/header.php"); ?>
<?php if(!isset($_SESSION['user_id'])){redirect("login.php");}?>

<?php 
if (empty($_GET['id'])) {
    redirect('comments.php');
} 
	# code...
$comment = Comment::fetchUserById($_GET['id']);
if ($comment) {
	$comment->delete();
	 $session->message("The comment by {$comment->author} has been deleted successfully");
	redirect('comments.php');
	# code...
}else{
	redirect('comments.php');
}

 ?>