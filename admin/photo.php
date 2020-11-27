<?php include("includes/header.php"); ?>
<?php if(!isset($_SESSION['user_id'])){redirect("login.php");}?>

<?php 
 $photos = Book::fetchAlluser();

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
                            PHOTO
                            <small></small>
                        </h1>
                        <p class="bg-success"><?php echo $message; ?></p>
                        <div class="col-sm-12">
                            <table class="table table-hover">
                                <thead>
                                   
                                    <tr>
                                        <th>Photo</th>
                                        <th>Id</th>
                                        <th>filename</th>
                                        <th>Title</th>
                                        <th>size</th>
                                        <th>Comments</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                     <?php foreach ($photos as $photo) : ?>
                                    <tr>
                                        <td><img src="<?php echo $photo->image_path();?>" class="image_resize" >
                                            <div class="picture-link">
                                                <a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                                <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                                <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>

                                            </div></td>
                                        <td><?php echo $photo->id; ?></td>
                                        <td><?php echo $photo->filename; ?></td>
                                        <td><?php echo $photo->title; ?></td>
                                        <td><?php echo $photo->size; ?></td>
                                        <td><?php  $comment = Comment::find_this_comment($photo->id);?>


                                         <a href="comment_photo.php?id=<?php echo $photo->id;?>"> <?php echo count($comment);?></a>
                                       

                                        
                                            
                                        </td>
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