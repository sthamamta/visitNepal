<?php

  require_once($_SERVER['DOCUMENT_ROOT'] . '/visitAdmin/assets/database/dbconfig.php');




if(isset($_GET['duration']) && isset($_GET['destinations']) && isset($_GET['price']))	{
	$duration=$_GET['duration'];
	$destinations=$_GET['destinations'];
	$price_low=$_GET['price_low'];
  $price_high=$_GET['price_high'];

   if($duration=='' &&  $destinations=='' && $price_low=='' &&  $price_high==''){
    $sql = "SELECT name,price FROM package";
    $result= mysqli_query($conn,$sql);
     
       if($result){
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
               $rows[] = $r;
               }
            header('Content-Type: application/json');
               echo json_encode($rows);
            
             
    	   
    	 
    }
}
    

    else{


     $conditions = array();

  
// adding condition to array for every parameter <> 0
     if ( $duration != '') $conditions[] = "duration LIKE '$duration%'";
     if ($destinations != '') $conditions[] = "destinations LIKE '$destinations%'";
     if ($fee != '') $conditions[] = "price BETWEEN '$price_low'AND '$price_high';";

// all we need now is to concatenate array elements with " AND " glue
       $sql_cond = join(" AND ", $conditions);
        
         if ($sql_cond != ''){ 
         	$sql = "SELECT name,price FROM package WHERE $sql_cond";
            $result= mysqli_query($conn,$sql);
      
            if($result){
              $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
               $rows[] = $r;
               }
            header('Content-Type: application/json');
               echo json_encode($rows);
            
             
    }
}
        
    }
}
?>