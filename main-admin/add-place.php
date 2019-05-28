<?php include '../partials/header.php' ?>

<?php
  //to save college
if (isset($_POST['submit'])) {
  $location = $_POST['txt_location'];
  $name = $_POST['txt_name'];
  $description = $_POST['txt_description'];
    echo "sucess";

   
  $sql_check_places ="SELECT * FROM `places` WHERE name='$name' and location='$location'";
    $result_check=mysqli_query($conn,$sql_check_places); //run the query $sql
       
    if(mysqli_num_rows($result_check)){
            $error = 'This place is already exits';
          }else{
      $query = "INSERT INTO `places` (`name`,`location`,`description`+
    ) VALUES ('$name','$location','$description')";
    }



  
  if(mysqli_query($conn,$query)){
    $success = 'true';
  }else{
    $error = 'true';
  }
$q=mysqli_query($conn,$query);
if(!$q){
  die(mysqli_error($conn));
}
}



?>

<body>
<?php include '../partials/nav.php' ?>
 <div class="container-fluid">
  <div class="col-md-4">
    <?php include '../partials/admin-side-menu.php' ?>
  </div>
  <div class="col-md-8">
    <div class="well">
      <h2>Add Places</h2>
      <form method="POST" name="myForm" onsubmit="return validate();" action="add-place.php" enctype="multipart/form-data">
     <!--    <div class="form-group">
          <label>Problem Type :</label>
          <input class="form-control" style="width:95%" type="text" name="problem_type" >

        </div> -->
         <div class="form-group">
          <label for="comment">name</label>
          <textarea class="form-control" rows="2" id="title" name="txt_name"></textarea>
        </div>

        <div class="form-group">
          <label for="comment">location</label>
          <textarea class="form-control" rows="2" id="title" name="txt_location"></textarea>
        </div>
         <div class="form-group">
          <label for="comment">description</label>
          <textarea class="form-control" rows="5" id="title" name="txt_description"></textarea>
        </div>
        
       
        <div class="alert alert-danger" id="error-div" style="display: none;">
          <span class="glyphicon glyphicon-exclamation-sign" id="error" aria-hidden= 'true' ></span>
        </div>
        <div class="form-group">
          <button class="btn btn-sucess pull-right" style="margin-right: 10px" type="submit" name="submit">Save</button>
          <br></div>
          <?php 
          if(isset($success)) {
            echo "<div class='alert alert-success' id='success-div'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden= 'true' > Successfully Added</span>
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

<div class="panel-footer" style="text-align: center;">© Visit Nepal</div>
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