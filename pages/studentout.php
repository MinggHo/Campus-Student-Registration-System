<?php
session_start();

include('./config.php');
if (!isset($_SESSION['userIDD']))
    {
    header("Location:login.php");
    die();
    }

    $id=$_SESSION['userIDD'];
    $sqlm = "SELECT * FROM user where user_id='$id'";
    $resultm=mysqli_query($conn,$sqlm);
    $num_rowsm=mysqli_num_rows($resultm);
    $rowm = mysqli_fetch_assoc($resultm);
    $user_id = $_POST["userid"];
    $passw = $_POST["userid"];
    $name = $_POST["fname"];
    $tel_num = $_POST["telnum"];
    $email = $_POST["email"];
    $passw = $_POST['passw'];
    $faculty = $_POST['faculty'];
    $ic_num = $_POST['icnum'];


    $sqlu = "SELECT * FROM student WHERE user_id='$id'";
    $resultu = mysqli_query($conn,$sqlu);
    $rowu = mysqli_fetch_assoc($resultu);

     $resultk=$conn->query ("SELECT CONCAT(h.name,' ' ,r.room_id) FROM hostel h INNER JOIN house u INNER JOIN room r INNER JOIN stud_trans s ON h.hostel_ai=u.hostel_ai AND u.house_id=r.house_id AND s.room_id=r.room_id WHERE s.user_id='$id' AND s.conditions='ACTIVE'");
    $rowk=$resultk->fetch_row();



// $sqlr = "SELECT room_id FROM room r WHERE r.user_id IS NULL OR
//       r.user_id = '' LIMIT 1";
// //$sql = "SELECT RoomId FROM room WHERE room.RoomId NOT IN (SELECT roomId FROM user) LIMIT 1";
// $resultr = $conn->query($sqlr);
// if ($resultr->num_rows == 1) {
//     while($rowr = mysqli_fetch_assoc($resultr)){
//       $emptyRoom = $rowr["room_id"];
//     }
// } else {
//   echo "<script language='Javascript'>
//     alert('No empty room!');
//     location.href='studentpage.php'
//     </script>";
//       exit();

//     // echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $sqlUpdate2 = "UPDATE `room` SET `user_id`='$id' WHERE room_id='$emptyRoom'";
// $sqlUpdate = "UPDATE `user` SET `regTime`='".date('Y-m-d H:i:s',time())."' WHERE IdNum='$id'";
// //$sqlUpdate = "UPDATE `user` SET `roomId`='$emptyRoom',`regTime`='".date('Y-m-d H:i:s',time())."' WHERE IdNum='$id'";

// $conn->query($sqlUpdate);
// $conn->query($sqlUpdate2);


// header('Location: studentpage.php')


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel     ="stylesheet" href="../assets/css/bootstrap.min.css"> <!-- bootstrap -->
  <script src   ="../assets/js/jquery.min.js"></script>
  <script src   ="../assets/js/bootstrap.min.js"></script>
  <script src   ="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
  <script src="http://malsup.github.com/jquery.form.js"></script>

	<link rel="stylesheet" href="../assets/css/cssutama.css" />
  <link rel="stylesheet" href="../assets/css/checkbox.css">
  <link rel="stylesheet" href="../assets/css/sweetalert.css">
  <link rel="stylesheet" href="../assets/css/buttons.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css" /> <!--icon -->
	<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
	<title>Registration Campus</title>
</head>
<body>
	<div id="wrapper">
			<div class="overlay"></div>

			<!-- Sidebar -->
			<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
					<ul class="nav sidebar-nav">
							<li class="sidebar-brand">
									<a>
										 <strong>C S R S</strong>
                  </a>
              </li>
              <li>
                  <a href="studentpage.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Main Menu</a>
              </li>
              <li>
                  <a href="studentupdate.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Update Profile</a>
              </li>
              <li>
                  <a href="studentregistercampus.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Campus Entry List</a>
              </li>
              <li>
                  <a href="studentcomplaint.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Report</a>
              </li>
              <li>
                  <a href="#"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Campus List Out</a>
              </li>
              <li>
                  <a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a>
              </li>
          </ul>
      </nav>
			<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
  <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
    <span class="hamb-top"></span>
    <span class="hamb-middle"></span>
    <span class="hamb-bottom"></span>
  </button>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <header>
        <h1 id="fittext">Campus Out - CSRS</h1>
      </header>

      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Borang Keluar Kolej</h3>
        </div>
        <div class="panel-body">
          <p><span class="label label-success label-as-badge">1 . Please complete this form </i></span></p>

          <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Borang Keluar Asrama</div>
  <div class="panel-body">
    Please make sure you check all the box
  </div>
  <form action="somewhere.php" method="POST">
  <!-- List group -->
  <ul class="list-group">
    <li class="list-group-item">
      <div class="checkbox checkbox-primary">
          <input id="check1" class="styled" type="checkbox" checked>
          <label for="check1">
              Soal Pertama untuk awak
          </label>
      </div>
    </li>
    <li class="list-group-item">
      <div class="checkbox checkbox-primary">
          <input id="check2" class="styled" type="checkbox">
          <label for="check2">
              Soal Pertama untuk awak
          </label>
      </div>
    </li>
    <li class="list-group-item">
      <div class="checkbox checkbox-primary">
          <input id="check3" class="styled" type="checkbox">
          <label for="check3">
              Soal Pertama untuk awak
          </label>
      </div>
    </li>
    <li class="list-group-item">
      <div class="checkbox checkbox-primary">
          <input id="check4" class="styled" type="checkbox">
          <label for="check4">
              Soal Pertama untuk awak
          </label>
      </div>
    </li>
    <li class="list-group-item">
      <div class="checkbox checkbox-primary">
          <input id="check5" class="styled" type="checkbox">
          <label for="check5">
              Soal Pertama untuk awak
          </label>
      </div>
    </li>
    <li class="list-group-item">
      <p><span class="label label-success label-as-badge">2 . Submit to complete </i></span></p>
      <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
    </li>
  </ul>
</form>
</div>
</div>
</div><!--End Checkbox -->
</div><!--#column -->
</div><!-- row  -->
</div><!-- container -->
</div><!-- /#page-content-wrapper -->
</div><!-- /#wrapper -->

<script type="text/javascript">
$(document).ready(function(){
		  fitText(document.getElementById('fittext'), 1.2);
});
</script>
<script src="../assets/js/skrip.js"></script>
<script src="../assets/js/sweetalert-dev.js"></script>
<script src="../assets/js/fittext.js"></script>
</body>
</html>
