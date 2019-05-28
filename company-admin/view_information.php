<?php 
   session_start();
     if (!isset($_SESSION['admin-login'])){
      // header(string:"Location:login.php");
      header("location:view_information.php");
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
       $sql = "SELECT * FROM companies where user_id=".$id;
      $result= mysqli_query($conn,$sql);
                $res_fetch = mysqli_fetch_assoc($result);
                $companies_id=$res_fetch['id'];
  
   
  
    
  
   

  ?>


  


<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <?php include '../partials/side-menu.php' ?>
        </div>
        <div class="col-md-8">
            <div class="well">
            <h2>View Information </h2>
             
              <h3>name </h3>
             <form> 
             <input type="text" class="form-control" rows="7" id="name" value="<?=$res_fetch['name'];?>" name="name">
            <br>   
          </form>
           <h3>contact </h3>
             <form> 
             <input type="text" class="form-control" rows="7" id="contact" value="<?= $res_fetch['contact']?>" name="contact">
            <br>   
          </form>
           <h3>email </h3>
             <form> 
             <input type="text" class="form-control" rows="7" id="email" value="<?= $res_fetch['email']?>" name="email">
            <br>   
          </form>
          <h3>location </h3>
             <form> 
             <input type="text" class="form-control" rows="7" id="location" value="<?= $res_fetch['location']?>" name="location">
            <br>   
          </form>

          <h3>description</h3>
             <form> 
             <input type="text" class="form-control" rows="7" id="description" value="<?= $res_fetch['description']?>" name="location">
            <br>   
          </form>
          <form>
          <!-- <a href="../college-admin/edit-contact.php?id=<?=$college_id?>" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
          <br>
          <form>

            </div>
        </div>
    </div>
</div>
<div class="panel-footer" style="text-align: center;">© Kathford International</div>
</body>

</html> 