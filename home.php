
<?php
include('config.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    .btn:hover{
        background-color:black;
        border:0px;
    }
.table{
  background-color:rgba(0,0,0,0.5);
}
</style>
<link rel="stylesheet" href="./css/style.css">

    <title>Welcome Page</title>
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
    <div class="container">
    <table class="table table-dark mt-5">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Password</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <?php //error_reporting(0);
  $selectquery = "SELECT * FROM `users`";
  $result = mysqli_query($conn,$selectquery);
  if($result){
    while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $name=$row['name'];
    $password=$row['password'];
    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$name.'</td>
    <td>'.$password.'</td>
    <td>
    <button type="submit" class="btn btn-primary"name="submit" class="btn btn-primary">
    <a class="text-light" href="edit.php?editid='.$id.'"><b>Edit</b></a></button>
    <button type="submit" class="btn btn-danger" name="submit" class="btn btn-primary">
    <a class="text-light" href="delete.php?delid='.$id.'"><b>Delete</b></a></button>
    </td>
  </tr>';

    }
   
  }
  ?>
  <tbody>
    
    
  </tbody>
</table>
<div class="container">
    <button type="submit" name="user" class="btn btn-primary mt-5">
        <a href="signin.php" class="text-light"><b>Add User</b></a></button>
    </div>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>