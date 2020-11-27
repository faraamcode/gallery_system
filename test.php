<?php 

$dbuser="root";
$dbpass="";
$host="localhost";
$dbname = "srms";
$dbh = mysqli_connect($host, $dbuser, $dbpass, $dbname);



 class Check{
     
  public  function rediect($string){
      
      if($string==='new'){
          
         header("Location:class9.php"); 
      
          
          
      }
      
           
     }
     
     public function selectUser(){
         
        global $dbh;
        $query = "SELECT * from tblstudents where admission='ris/12/100'";
        $result = mysqli_query($dbh, $query);
        $count = mysqli_num_row($row);
        $row= mysqli_fetch_array($result);
        if ($count >0) {
          echo "result found";
          # code...
        }
       
     }
     
     
 }
 
 
 $test = new Check;
 $test->selectUser();
 

?>