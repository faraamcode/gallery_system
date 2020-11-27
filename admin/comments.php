<?php include("includes/header.php"); ?>
<?php if(!isset($_SESSION['user_id'])){redirect("login.php");}?>

<?php 
 $comments = Comment::fetchAlluser();


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
                            All comments
                            <small></small>
                        </h1>
                        <p class="bg-success"><?php echo $message; ?></p>
                        <div class="col-sm-12">
                            <table class="table table-hover">
                                <thead>
                                   
                                    <tr>
                                        
                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                        
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                     <?php foreach ($comments as $comment) : ?>
                                    <tr>
                                        <td><?php echo $comment->id; ?></td>
                                        <td>
                                            <?php echo $comment->author; ?>
                                            <div class="picture-link">
                                                <a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
                                               

                                            </div></td>
                                        
                                        
                                        <td><?php echo $comment->body; ?></td>
                                        
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