<?php
require_once("admin/includes/init.php");

if (empty($_GET['id'])) {
    redirect("index.php");

    # code...
}

$photo = Book::fetchUserById($_GET['id']);



if (isset($_POST['submit'])) {
$author = $_POST['author'];
$body = $_POST['body'];

$comment = Comment::create_comment($photo->id, $author, $body);
if ($comment && $comment->save() ) {

 
 redirect("photo.php?id={$photo->id}");

    # code...
}else{

    $message = "there was problem saving the comment";
}
    # code...

}else{
    $author = "";
    $body ="";
}

$comments = Comment::find_this_comment($photo->id);

?>


<?php include("includes/header.php"); ?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Agbede</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->image_path(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption; ?></p>
                <p><?php echo $photo->description; ?></p>
                

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <label for="author">AUTHOR</label>
                            <input type="text" name="author" class="form-control"><br>
                            <textarea class="form-control" name="body" rows="3" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
               <?php  foreach ($comments as $comment) : ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        <?php echo $comment->body; ?>
                    </div>
                </div>
            <?php  endforeach;  ?>
    
               

    
            
          
         

            </div>




            <!-- Blog Sidebar Widgets Column -->
             <!-- <div class="col-md-4">

            
                 <?php //include("includes/sidebar.php"); ?>



        </div> -->
        <!-- /.row -->
  </div>
        <?php include("includes/footer.php"); ?>

