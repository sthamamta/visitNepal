<?php 
   session_start();
     if (!isset($_SESSION['admin-login'])){
      // header(string:"Location:login.php");
      header("location:login.php");
      exit();
     }else{
      $id= $_SESSION['admin-login'];
     } 
     ?>

<?php

       include '../partials/header.php' ?>
 
<body>
   <?php include '../partials/companies-nav.php' ?>

   <?php 
   // to retrieve data from table
    $sql = "SELECT * FROM companies where user_id=".$id;
      $result= mysqli_query($conn,$sql);
                $res_fetch = mysqli_fetch_assoc($result);
                $companies_id=$res_fetch['id'];
  
    $result1= mysqli_query($conn, "SELECT * FROM package where companies_id=$companies_id");
    
    ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
           <?php include '../partials/side-menu.php' ?>
        </div>
        <div class="col-md-8">
         <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">List of Pcakages</div>
        <?php 
          if (isset($_SESSION['deleted'])) {
            echo "<div class='alert alert-success' id='success-div'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden= 'true' > Successfully deleted </span>
          </div>";
           unset($_SESSION['deleted']);
          }
         ?>

          <!-- Table -->
          <table class="table">
            <tr>
             
              <th>Name</th>
               <th>Price</th>
               <th>destinations</th>
               <th>duration</th>
                
              <th>Action</th>
            </tr>
            <?php 
              while ($res = mysqli_fetch_assoc($result1)) {?>
                <tr>
                  
                  <td><?= $res['name']?></td>
                  <td><?= $res['price']?></td>
                  <td><?= $res['destinations']?></td>
                  <td><?= $res['duration']?></td>
                 
                
               <td><a href="../company-admin/edit-package.php?id=<?=$res['id']?>" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a onclick="return confirm('Are you sure to delete this item?');" href="../partials/delete.php?id=<?=$res['id']?>&table=package" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
            <?php
              }        
            ?>
          </table>
        </div>
        </div>
    </div>
</div>

<div class="panel-footer" style="text-align: center;">© <?php echo '$college_id'; ?></div>

</body>
</html>