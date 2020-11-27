


<?php include("includes/header.php"); ?>
<?php include("includes/user_modal.php"); ?>
<?php if(!isset($_SESSION['user_id'])){redirect("login.php");}?>

<?php


if (empty($_GET['id'])) {
  redirect('users.php');
  # code...
}else{

$user = user::fetchUserById($_GET['id']);

if (isset($_POST['update'])) {

  if ($user) {
    # code...
$user->username = $_POST['username'];
$user->first_name = $_POST['first_name'];
$user->last_name = $_POST['last_name'];
$user->password = $_POST['password'];

if (empty($_FILES['user_image'])) {
  $user->save();
$session->message("user has been updated successfully");
redirect("users.php"); 

  //redirect("edit_user.php?id={$user->id}"); 
  # code...
}else{
$user-> set_files($_FILES['user_image']);

$user->save_user_image();
$user->save();
redirect("users.php"); 
$session->message("user has been updated successfully");
//redirect("edit_user.php?id={$user->id}");       
    }

  }

}

}
  # code...


/**
if (empty($_GET['id'])) {
    redirect('photo.php');

     # code...
 }else{
   $photo = Book::fetchUserById($_GET['id']);

    if (isset($_POST['update'])) {

    if ($photo) {
      $photo->title = $_POST['title'];
       $photo->caption = $_POST['caption'];
         $photo->alternate_text = $_POST['alternate_text'];
       $photo->description =$_POST['description'];
        # code...
       $photo->save();
    }
    # code...
}
 
 }**/


 ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->

   <?php include("includes/top_nav.php"); ?>




            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

    <?php include("includes/side_nav.php"); ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit user
                            <small>Subheading</small>
                        </h1>

                        <div class="col-sm-6 user_image_holder">
                         <a href="#" data-toggle="modal" data-target="#photo-modal"> <img class="img-responsive" src="<?php echo $user->image_placeholder(); ?>"></a>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-sm-6">

                          <div class="form-group">
                        
                            <input type="file" name="user_image">
                               
                           </div>
                           <div class="form-group">
                           <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" >
                               
                           </div>
                          
                           <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>" >
                               
                           </div>
                           <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                               
                           </div>
                           <div class="form-group">
                            <label for="password">Password</label>
                          
                                <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>">
                           </div>
                           <div class="form-group">
                            <a  id="user_id" class="btn btn-danger" href="delete_user.php?id=<?php echo $user->id; ?>"> Delete</a>
                          
                                <input type="submit" name="update" class="btn btn-success"  value="Update">
                           </div>
                        </div>


                    </form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>