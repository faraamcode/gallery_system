<?php include("includes/header.php"); ?>
<?php if(!isset($_SESSION['user_id'])){redirect("login.php");}?>

<?php
$user = new user;

if (isset($_POST['create'])) {
  echo $user->username = $_POST['username'];
$user->first_name = $_POST['first_name'];
$user->last_name = $_POST['last_name'];
$user->password = $_POST['password'];

$user->set_files($_FILES['user_image']);
$message = $session->message("User {$user->username} has just been added successfully");
$user->save_user_image();
$user->save();
redirect('users.php');


  # code...
}

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
                            Add user
                            <small>Subheading</small>
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-sm-6 col-sm-offset-3">

                          <div class="form-group">
                        
                            <input type="file" name="user_image">
                               
                           </div>
                           <div class="form-group">
                           <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" >
                               
                           </div>
                          
                           <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" >
                               
                           </div>
                           <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" >
                               
                           </div>
                           <div class="form-group">
                            <label for="password">Password</label>
                          
                                <input type="text" name="password" class="form-control" >
                           </div>
                           <div class="form-group">
                          
                                <input type="submit" name="create" class="btn btn-success" >
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