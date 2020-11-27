<?php include("includes/header.php");

$page = !empty($_GET['page'])? (int)$_GET['page'] : 1;

$max_page_num = 4;

$total_num_count = Book::count_all();

$paginate = new Paginate($page, $max_page_num, $total_num_count);

$sql = "SELECT * FROM books ";
$sql .="LIMIT {$max_page_num} ";
$sql .="OFFSET {$paginate->offset()}";



 $photo = Book::fetchAllQuery($sql);

 ?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                
                <div class="thumbnails row">
                    <?php  foreach ($photo as $photos) : ?>
                    <div class="col-xs-6 col-md-3">
                        <a href="photo.php?id=<?php echo $photos->id; ?>" class="thumbnail">
                            <img class="image_resize img-responsive" src="<?php  echo "admin/".$photos->image_path(); ?>" alt="">
                            
                        </a>
                        
                    </div>
                   <?php  endforeach; ?> 
                </div>
                <div class="row">
                    <ul class="pager"><?php
                            

                            for($i=1; $i<=$paginate->page_total(); $i++){
                             

                               if ($i==$page) {
                                   echo "<li class='active'><a href='index.php?page=$i'>$i</a></li>";  
                                    # code...
                                } else{
                                     echo "<li><a href='index.php?page=$i'>$i</a></li>";
                                } 
                            }

                          
                        if($paginate->page_total()>1){

                            if ($paginate->has_next()) {


                                echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
                                # code...
                            }
                            if ($paginate->has_previous()) {
                                echo "<li class='previous'><a class='' href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                            }

                    }

                    ?>
                        
                       
                        
                    </ul>
                    
                </div>

    
            
          
         

            </div>




           
           </div> <!-- Blog Sidebar Widgets Column -->

            
               


        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
