<?php include("includes/header.php"); ?>
<?php if(!isset($_SESSION['user_id'])){redirect("login.php");}?>

<?php 
 $users = user::fetchAlluser();


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
                            user
                            <small></small>
                        </h1>
                        <p class="bg-success"><?php echo $message; ?></p>
                        <a href="add_user.php" class="btn btn-primary">Add User</a>
                        <div class="col-sm-12">
                            <table class="table table-hover">
                                <thead>
                                   
                                    <tr>
                                        
                                        <th>Id</th>
                                        <th>Photo</th>
                                        <th>username</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                     <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?php echo $user->id; ?></td>
                                        <td><img src="<?php echo $user->image_placeholder();?>" class=" user_image" >
                                            <div class="picture-link">
                                                <a class="delete_link" href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                                <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                                                <a href="">View</a>

                                            </div></td>
                                        
                                        <td><?php echo $user->username; ?></td>
                                        <td><?php echo $user->first_name; ?></td>
                                        <td><?php echo $user->last_name; ?></td>
                                        <?php endforeach; ?>

                                    </tr>
                                </tbody>
                                
                            </table>
                            
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>