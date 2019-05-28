<?php include '../partials/header.php' ?>
<body>
   <?php include '../partials/nav.php' ?>

   <?php 
   // to retrieve data from table
    $result= mysqli_query($conn, "SELECT * FROM college where status='1'");
    ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
           <?php include '../partials/admin-side-menu.php' ?>
        </div>
        <div class="col-md-8">
         <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">List of college</div>
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
              <th>college name</th>
              <th>college location</th>
              
            </tr>
            <?php 
              while  ($res = mysqli_fetch_assoc($result)) {?>
                <tr>
                  <td><?= $res['id']?></td>
                  <td><?= $res['name']?></td>
                  <td><?= $res['location']?></td>
                  <td><a onclick="return confirm('Are you sure to delete this item?');" href="../partials/delete.php?id=<?=$res['id']?>&table=user" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>|<a href="../main-admin/view-college.php?id=<?=$res['id']?>" title="Edit">view</i></a> 
                </tr>
            <?php
              }        
            ?>
          </table>
        </div>
        </div>
    </div>
</div>
<div class="panel-footer" style="text-align: center;">© Kathford International</div>

</body>
</html>