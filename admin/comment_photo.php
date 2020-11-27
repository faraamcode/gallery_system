<?php include("includes/header.php"); ?>
<?php if(!isset($_SESSION['user_id'])){redirect("login.php");}?>

<?php 
if (empty($_GET['id'])) {
    redirect("photo.php");
    # code...
}
 $comment = Comment :: find_this_comment($_GET['id']);


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
                            <small>Subheading</small>
                        </h1>
                        <a href="add_user.php" class="btn btn-primary">Add User</a>
                        <div class="col-sm-12">
                            <table class="table table-hover">
                                <thead>
                                   
                                    <tr>
                                        
                                        <th>Id</th>
                                        <th>author</th>
                                        <th>Body</th>
                                      
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                     <?php foreach ($comment as $comments) : ?>
                                    <tr>
                                        <td><?php echo $comments->id; ?></td>
                                      
                                        
                                        <td><?php echo $comments->author; ?>
                                        <div class="picture-link">
                                        <a href="delete_comment_photo.php?id=<?php echo $comments->id; ?>">Delete</a>
                                        </div>
                                        </td>
                                        <td><?php echo $comments->body; ?></td>
                                       
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