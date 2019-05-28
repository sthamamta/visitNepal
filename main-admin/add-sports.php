<?php include '../partials/header.php' ?>

<?php
  //to save college
if (isset($_POST['submit'])) {
  $title= $_POST['txt_title'];
  $description = $_POST['txt_description'];
   $places= $_POST['txt_places'];
    echo "sucess";

   
  $sql_check_places ="SELECT * FROM `sports` WHERE title='$title' ";
    $result_check=mysqli_query($conn,$sql_check_places); //run the query $sql
       
    if(mysqli_num_rows($result_check)){
            $error = 'This sport is already exits';
          }else{
      $query = "INSERT INTO `sports` (`title`,`places`,`description`
    ) VALUES ('$title','$places','$description')";
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
      <h2>Add Sports</h2>
      <form method="POST" name="myForm" onsubmit="return validate();" action="add-sports.php" enctype="multipart/form-data">
     <!--    <div class="form-group">
          <label>Problem Type :</label>
          <input class="form-control" style="width:95%" type="text" name="problem_type" >

        </div> -->
         <div class="form-group">
          <label for="comment">title</label>
          <textarea class="form-control" rows="2" id="title" name="txt_title"></textarea>
        </div>

        <div class="form-group">
          <label for="comment">places</label>
          <textarea class="form-control" rows="2" id="title" name="txt_places"></textarea>
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