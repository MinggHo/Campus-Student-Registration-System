<?php
session_start();
include('./config.php');
if (!isset($_SESSION['userIDD']))
    {
    header("Location:login.php");
    die();
    }

$id=$_POST['username'];

$sqlm = "SELECT * FROM student where user_id='$id'";
$resultm=mysqli_query($conn,$sqlm);
$num_rowsm=mysqli_num_rows($resultm);
$rowm = mysqli_fetch_assoc($resultm);
$flag = 0;
if ($rowm > 0){
  echo "<p style='color: #00FF0A' class='help-block'><small>Data is : " . $rowm['name'] . "<small></p>";
  echo '<script>
  $(":submit").removeAttr("disabled");
  </script>';
} else {
  echo "<p style='color: #D50000' class='help-block'><small>Data not found</small></p>";
  echo '<script>
    $(":submit").attr("disabled", true);
  </script>';
}
?>
