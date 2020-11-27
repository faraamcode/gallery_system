<?php include("includes/header.php"); ?>
<?php if(!isset($_SESSION['user_id'])){redirect("login.php");}?>
<?php 
 $message ="";
if (isset($_FILES['file'])) {
   $photo = new Book;
   $photo->title = $_POST['title'];
   $photo->set_files($_FILES['file']);
    if ($photo->save()) {
        $message = "file uploaded succesfully";
        # code...
    }else{
        $message = join("<br>", $photo->errors);
    }

    # code...
}

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
                            UPLOAD
                            <small></small>
                        </h1>
                        <div class="row">
                        <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <h1><?php  echo $message; ?></h1>
                            <div class="form-group">
                                <input type="text" name="title" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <input type="file" name="file">
                            </div>
                            <input type="submit" name="submit">
                            
                        </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="upload.php" class="dropzone"></form>
                            
                        </div>
                        
                    </div>

                        


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>