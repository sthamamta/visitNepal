<html>
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
 
     <?php
     
     if(isset($_GET['id'])){
             $edit_id=$_GET['id'];
             //echo $edit_id;


             $old_result=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM companies WHERE user_id=$edit_id"));
?>

<body>
   <?php include '../partials/companies-nav.php' ?>

   <?php 
   // to retrieve data from table
    $sql = "SELECT * FROM companies where user_id=".$id;
      $result= mysqli_query($conn,$sql);
                $res_fetch = mysqli_fetch_assoc($result);
                $companies_id=$res_fetch['id'];
  
  
 if (isset($_POST['submit'])) {
    $dname = $_POST['name'];
     $email = $_POST['email'];
      $contact = $_POST['contact'];
       $location = $_POST['location'];
       
    $query = "UPDATE `companies` SET `name`='$name',`email`='$email',`contact`='$contact',`location`='$location' WHERE id= $companies_id";
    // echo $query;exit;
    if(mysqli_query($conn,$query)){
      $success = 'true';
    }else{
      $error = 'true';
    }
  }
}
 

  ?>


   <body>
   


<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <?php include '../partials/side-menu.php' ?>
        </div>
        <div class="col-md-8">
            <div class="well">
            <h2>Edit Information </h2>
              <form method="POST" name="myForm" onsubmit="return validate();" action="edit-information.php?id=<?=$edit_id?>" >
           
            <div class="form-group">
            <label for="comment">Edit Information</label>
            
            <input type="text" class="form-control" rows="2" id="edit-information" value="<?=isset($_POST['submit'])?$_POST['name']:$old_result['name']?>" name="name"><br>

             <input type="text" class="form-control" rows="2" id="edit-information" value="<?=isset($_POST['submit'])?$_POST['email']:$old_result['email']?>" name="email"><br>

              <input type="text" class="form-control" rows="2" id="edit-information" value="<?=isset($_POST['submit'])?$_POST['name']:$old_result['name']?>" name="name"><br>

             <textarea class="form-control" rows="2" id="edit-information" name="description"><?=isset($_POST['submit'])?$_POST['description']:$old_result['description']?></textarea>
          </div>
          <div class="form-group">
              <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="alert alert-danger" id="error-div" style="display: none;">
              <span class="glyphicon glyphicon-exclamation-sign" id="error" aria-hidden= 'true' ></span>
            </div>
            <div class="form-group">
              <button class="btn btn-sucess pull-right" style="margin-right: 10px" type="submit" name="submit">Update</button>
            <br></div>
            <?php 
              if (isset($success)) {
                echo "<div class='alert alert-success' id='success-div'>
                    <span class='glyphicon glyphicon-exclamation-sign' id='error' aria-hidden= 'true' >  edited Successfully</span>
                    </div>";
              }
              if (isset($error)) {
                    echo "<div class='alert alert-danger'>
                    <span class='glyphicon glyphicon-exclamation-sign' aria-hidden= 'true'> ".$error."</span>
                    </div>";
                }

             ?>
          </form>
            </div>
        </div>
    </div>
</div>
<div class="panel-footer" style="text-align: center;">© visit nepal</div>
</body>
<script>
    document.getElementById("error-div").style.display = "none";
    function validate(){
        var descript = document.getElementById('edit-problems').value;
        var message='';
        if (descript=="" ) {
            message="All fields are required";
        }
         if (message!='') {
            document.getElementById("error-div").style.display = "block";
            document.getElementById('error-div').innerHTML=message;
            return false;
        }else{
            return true;
        }
      }
        </script>
</html>