<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/visitAdmin/assets/database/dbconfig.php');
 //session_start();
if( isset($_POST['password']) and isset($_POST['Username']) and isset($_POST['email']) and isset($_POST['usertype'])and isset($_POST['address'])) {
    $username= $_POST['Username'];
    $password= $_POST['password'];
    $user_type= $_POST['user_type'];
     $email= $_POST['email'];
     $address= $_POST['address'];
	// to check if the email is already associated with another account
	$sql_check_email="SELECT * FROM user WHERE email='$email'";
    $result_check=mysqli_query($conn,$sql_check_email); //run the query $sql
       
    if(mysqli_num_rows($result_check)){
         //count rows that matches email and password
            $error = 'This email is already registered';
    }else{
    	/*for image*/
    	if ($_FILES["fileToUpload"]["name"]!="") {
    		$temp = explode(".",$_FILES["fileToUpload"]["name"]);
    		$filename = "image_".round(microtime(true)).'.'. end($temp);
    		$target_dir = "../image-upload/";
			$target_file = $target_dir . basename($filename);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
    	}else{
		    $uploadOk = 0;
		    $filename  = "default.jpg";
    	}
    	
		/*End for image*/
		$sql="INSERT INTO users (email,username,password,address,user_type,image)  VALUES('$email','$username','$password','$address','$usertype','$filename') ";

		if( mysqli_query($conn,$sql)){
			$success = 'true';
		}
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Register</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="register.php" method="post">
					<input class="text" type="text" name="Username" placeholder="Username" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text address" type="address" name="address" placeholder="Address" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" required="">
					<input type="radio" name="usertype" value="mainadmin"> Main Admin<br>
  <input type="radio" name="usertype" value="admin"> Admin<br>
  <input type="radio" name="usertype" value="general"> General user
					<div class="wthree-text">
						
						<div class="clear"> </div>
					</div>
					 <div class="text">
          <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
					<input type="submit" value="SIGNUP">
				</form>
				<p>Already  have an Account? <a href="login.php"> Login Now!</a></p>
			</div>
		</div>
		<!-- copyright -->
		
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>