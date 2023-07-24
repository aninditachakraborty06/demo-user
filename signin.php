<?php
$user = 0;
$success = 0;
$invalidpass = 0;
if(isset($_POST['register'])){
  include('config.php');
  $name = $_POST['name'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  $select = "SELECT * FROM `users` WHERE `name`='$name' AND `password`='$password'";           
  $result = mysqli_query($conn,$select);
  if($result){
    $num = mysqli_num_rows($result); //checking the no of rows($result)
    if($num == 1){
      //echo "user already exists";
      $user = 1;
    }
    else{
      if($password===$confirmpassword){
      $insert = "INSERT INTO `users` (`name`,`password`)
      VALUES('$name','$password')";
      $result = mysqli_query($conn,$insert);
      if($result){
        //echo "signup successful";
        $success = 1;
         header('location:login.php');
      }
    }else{
      $invalidpass = 1;
    }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!--Bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- font awesome link (for icons)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style sheet -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="signin.php"><b>Sign Up </b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php"><b>Login</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="home.php"><b>Users</b></a>
      </li>

  </div>
</nav>
<?php
if($user){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Alert!</strong> User already exists!.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
<?php
if($success){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account has been registered!.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
<?php
if($invalidpass){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Password did not matched !.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>



  

   <div class="container d-flex align-items-center justify-content-center">
    <form action="signin.php" method="post">
    <div class="card">
        <!--card header-->
        <div class="card-header">
            <h3 class="text-center">Sign Up</h3>
        </div>
        <!--card body-->
        <div class="card-body">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user" style="color: #f6f7f9;"></i></span>
  <input type="text" class="form-control" placeholder="Enter username" autocomplete="off" required="required" name="name">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock" style="color: #57d65f;"></i></i></span>
  <input type="password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="password">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock" style="color: #6d23c7;"></i></i></span>
  <input type="password" class="form-control" placeholder="Confirm your password" required="required" name="confirmpassword">
</div>
<div class="form-group">
<input type="submit" class="btn btn-dark" name="register" value="Sign Up">
</div>
        </div>
        <!--card footer-->
        <div class="card-footer text-light">Already have an account?
          <a href="login.php">Login</a>
        </div>
    </div>
    </form>
   </div>
</body>
</html>