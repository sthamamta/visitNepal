 <?php 
   //session_start();
     // if (!isset($_SESSION['admin-login'])){
     //  // header(string:"Location:login.php");
     //  header("location:login.php");
     //  exit();
     // }else{
     //  $id= $_SESSION['admin-login'];
     // } 
     ?>

 

   <?php 
   // to retrieve data from table
    // $sql = "SELECT * FROM college where user_id=".$id;
    //   $result= mysqli_query($conn,$sql);
    //             $res_fetch = mysqli_fetch_assoc($result);
    //             $college_name=$res_fetch['name'];
  
    // $result1= mysqli_query($conn, "SELECT * FROM faq where college_id=$college_id");
    
    ?>




 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Company Admin Panel</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Admin</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><? echo '$college_name';?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../pages/pops.php?id=<?='14'?>" >Profile</i></a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../partials/logout.php"><i class="fa fa-lock" aria-hidden="true">  Logout</i></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>