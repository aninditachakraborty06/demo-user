<?php
include('config.php');
if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $deletequery = "DELETE  FROM `users` WHERE `id`='$id'";
    $result = mysqli_query($conn,$deletequery);
    if($result){
        header('location:home.php');
    }
}
?>
<?php
/*include('config.php');
if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $deletequery = "DELETE FROM `contact` WHERE `id`='$id'";
    $result = mysqli_query($conn,$deletequery);
    if($result){
        header('location:display.php');
    }
}*/
?>