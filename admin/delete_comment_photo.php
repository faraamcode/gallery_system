<?php include("includes/header.php"); ?>
<?php if(!isset($_SESSION['user_id'])){redirect("login.php");}?>

<?php 
if (empty($_GET['id'])) {
    redirect("comment_photo.php?id={$comment->photo_id}");
} 
	# code...
$comment = Comment::fetchUserById($_GET['id']);
if ($comment) {
	$comment->delete();
	redirect("comment_photo.php?id={$comment->photo_id}");
	# code...
}else{
	redirect("comment_photo.php?id={$comment->photo_id}");
}

 ?>