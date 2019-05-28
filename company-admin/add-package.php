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
         $sql = "SELECT * FROM companies where user_id=".$id;
      $result= mysqli_query($conn,$sql);
                $res_fetch = mysqli_fetch_assoc($result);
                $companies_id=$res_fetch['id'];
    ?>

<?php
  if (isset($_POST['submit'])) {
       $name = $_POST['txt_name'];
       $duration = $_POST['txt_duration'];
       $price= $_POST['txt_price'];
       $destinations= $_POST['txt_destinations'];
       $inclusions= $_POST['txt_inclusions'];
      $conn= mysqli_connect('localhost','root','','visitnepal') or die("Error in connection");

       $check=mysqli_query($conn,"select * from package where name='$name' and companies_id='$companies_id'");
    $checkrows=mysqli_num_rows($check);
       // $sql_check_information="SELECT * FROM `package` WHERE name='$name' and companies_id=' $companies_id ";
       // $result_check=mysqli_query($conn,$sql_check_information); //run the query $sql
       
    if($checkrows>0){
            $error = 'This package already exists';
          }else{
  
            $que = "INSERT INTO `package`(name,duration, price,destinations,inclusions,companies_id) VALUES ('$name','$duration','$price',' $destinations',' $inclusions','$companies_id') ";
            $result = mysqli_query($conn, $que) or die('Error querying database.');

      mysqli_close($conn);
            
             echo "package Added";
               }
          }
    
    
  // else{
  //   //header("location:collegedashboard.php");
  //   echo 'error';
  // }
?>

   <body>
   <?php include '../partials/companies-nav.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <?php include '../partials/side-menu.php' ?>
        </div>
        <div class="col-md-8">
            <div class="well">
            <h2>Add programs</h2>
              <form method="POST" name="myForm"  onsubmit="return validate();" action="add-package.php?id=<?php echo($companies_id)?>" enctype="multipart/form-data">
              <div class="form-group">
            <label for="comment">Package Name</label>
            <textarea class="form-control" rows="2" id="title" name="txt_name"></textarea>
          </div>


          <div class="form-group">
            <label for="comment">Duration</label>
            <textarea class="form-control" rows="2" id="title" name="txt_duration"></textarea>
          </div>
         


             <div class="form-group">
            <label for="comment">price</label>
            <textarea class="form-control" rows="5" id="description" name="txt_price"></textarea>
          </div>

          <div class="form-group">
            <label for="comment">destinations</label>
            <textarea class="form-control" rows="2" id="title" name="txt_destinations"></textarea>
          </div>

          <div class="form-group">
            <label for="comment">inclusions</label>
            <textarea class="form-control" rows="2" id="title" name="txt_inclusions"></textarea>
          </div>

         <div class="form-group">
          <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
      </div>
            <div class="alert alert-danger" id="error-div" style="display: none;">
              <span class="glyphicon glyphicon-exclamation-sign" id="error" aria-hidden= 'true' >your account is not register</span>
            </div>
            <div class="form-group">
              <button class="btn btn-sucess pull-right" style="margin-right: 10px" type="submit" name="submit">save</button>
            <br></div>
            <?php 
              if (isset($success)) {
                echo "<div class='alert alert-success' id='success-div'>
                    <span class='glyphicon glyphicon-exclamation-sign' aria-hidden= 'true' > Added Successfully </span>
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

<div class="panel-footer" style="text-align: center;"> <?php  echo $res_fetch['name']; ?></div>
</body>
    <script>
    document.getElementById("error-div").style.display = "none";
    function validate(){
        var descript = document.getElementById('description').value;
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