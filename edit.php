<?php
include('config.php');
$id = $_GET['editid'];  
$singleselectquery = "SELECT * FROM `users` WHERE `id`='$id'";
$result = mysqli_query($conn,$singleselectquery);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$password = $row['password'];
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $updatequery = "UPDATE `users`
                    SET `name`='$name',`password`='$password'
                    WHERE `id`='$id'";
    $sql = mysqli_query($conn,$updatequery);
    if($sql){
        header('location:home.php');
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
        <a class="nav-link" href="home.php"><b>Home</b></a>
      </li>
  </div>
</nav>
   <div class="container d-flex align-items-center justify-content-center">
    <form method="POST" >
    <div class="card">
        <!--card header-->
        <div class="card-header">
            <h3 class="text-center">Update Here</h3>
        </div>
        <!--card body-->
        <div class="card-body">
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user" style="color: #f6f7f9;"></i></span>
  <input type="text" class="form-control" placeholder="Enter username" autocomplete="off" 
  required="required" name="name" value="<?php echo $name; ?>">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock" style="color: #57d65f;"></i></i></span>
  <input type="password" class="form-control" placeholder="Enter your password" autocomplete="off"
   required="required" name="password" value="<?php echo $password; ?>">
</div>
<!--<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock" style="color: #6d23c7;"></i></i></span>
  <input type="password" class="form-control" placeholder="Confirm your password" required="required" name="confirmpassword">
</div>-->
<div class="form-group">
<input type="submit" class="btn btn-dark" name="update" value="Update">
</div>
        </div>
        <!--card footer
        <div class="card-footer text-light">Already have an account?
          <a href="login.php">Login</a>
        </div>-->
    </div>
    </form>
   </div>
</body>
</html>
