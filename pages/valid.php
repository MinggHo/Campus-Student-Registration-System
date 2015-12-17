<?php
session_start();
include('./config.php');
if (!isset($_SESSION['userIDD']))
    {
    header("Location:login.php");
    die();
    }

$id=$_POST['value'];


$sqlm = "SELECT * FROM student where user_id='$id'";
$resultm=mysqli_query($conn,$sqlm);
$num_rowsm=mysqli_num_rows($resultm);
$rowm = mysqli_fetch_assoc($resultm);

$popster = 10;

if ($rowm > 0){
  $popster = 0;
  echo $popster;
} else {
  $popster = 1;
  echo $popster;
}
?>
