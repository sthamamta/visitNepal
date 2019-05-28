<?php include '../partials/header.php' ?>
<body>
   <?php include '../partials/nav.php' ?>

   <?php 
   // to retrieve data from table
    $result= mysqli_query($conn, "SELECT * FROM  companies");
    
    ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
           <?php include '../partials/admin-side-menu.php' ?>
        </div>
        <div class="col-md-8">
         <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">List of companies</div>
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
              <th>ID</th>
              <th>Name</th>
               <th>Email</th>
               <th>Contact</th>
              <th>Location</th>

              <th>Action</th>
            </tr>
            <?php 
              while ($res = mysqli_fetch_assoc($result)) {?>
                <tr>
                  <td><?= $res['id']?></td>
                  <td><?= $res['name']?></td>
                  <td><?= $res['email']?></td>
                   <td><?= $res['contact']?></td>
                   <td><?= $res['location']?></td>
                
                
                 <td> <a onclick="return confirm('Are you sure to delete this item?');" href="../partials/delete.php?id=<?=$res['id']?>&table=companies" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>| <a href="../main-admin/view-companies.php?id=<?=$res['id']?>" >view</a>| </td>
                </tr>
            <?php
              }        
            ?>
          </table>
        </div>
        </div>
    </div>
</div>

<div class="panel-footer" style="text-align: center;">© Visit Nepal</div>

</body>
</html>