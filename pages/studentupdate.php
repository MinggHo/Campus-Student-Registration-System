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


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel     ="stylesheet" href="../assets/css/bootstrap.min.css"> <!-- bootstrap -->
  <script src   ="../assets/js/jquery.min.js"></script>
  <script src   ="../assets/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="../assets/css/cssutama.css" />
  <link rel="stylesheet" href="../assets/css/sweetalert.css">



	<title>Update Page</title>
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
											<h1 id="fittext">Update Profile </br>
                        <small>
                          Update your personal information
                        </small>
                      </h1>
										</header>
					<fieldset class="for-panel">
          <legend>Student Information</legend>
          <div class="row">
          <label class="col-xs-5 control-label" align="right" >Student Name:</label>
                  <p><?php echo $rowu['name']; ?></p>
            <div class="col-sm-6">
              <div class="form-horizontal">
                  <label class="col-xs-5 control-label">Phone Number: </label>
                  <p class="form-control-static"><?php echo $rowu['tel_num']; ?></p>
                    <label class="col-xs-5 control-label">E-mail: </label>
                    <p class="form-control-static"><?php echo $rowu['email']; ?></p>
                    <label class="col-xs-5 control-label">Faculty: </label>
                    <p class="form-control-static"><?php echo $rowu['faculty']; ?></p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-horizontal">
                  <label class="col-xs-6 control-label">Metric No: </label>
                  <p class="form-control-static"><?php echo $rowu['user_id']; ?></p>
                  <label class="col-xs-6 control-label">I/C: </label>
                  <p class="form-control-static"><?php echo $rowu['ic_num']; ?></p>
                  <label class="col-xs-6 control-label">Campus: </label>
                  <p class="form-control-static"><?php echo $rowk[0]; ?></p>
              </div>
            </div>
          </div>
        </fieldset>

										<form method="post" action="studentupdate.php">

                      <?php if ((isset($_POST["MM_update"]))) {
                           $passw=md5($_POST['passw']);
                          $sqlp="UPDATE student SET email = '$email',tel_num = '$tel_num' WHERE user_id='$id'";
                          $resultp = mysqli_query($conn,$sqlp);
                          // $sqlq="UPDATE user SET passw = '$passw' WHERE user_id='$id'";
                          // $resultq = mysqli_query($conn,$sqlq);
                          echo "<script language='Javascript'>
                          alert('Data has been updated');
                          location.href='studentpage.php'
                          </script>";
                            exit();
                                       }
                                    ?>

                   <div class="form-group ">
                    <label class="control-label " for="fname">
                     Full Name :
                    </label>
                    <div class="input-group">
                     <div class="input-group-addon">
                      <i class="glyphicon glyphicon-pencil">
                      </i>
                     </div>
                     <input class="form-control" id="fname" name="fname" disabled value="<?=$rowu['name']?>"  type="text"/>
                    </div>
                   </div>
                   <div class="form-group ">
                    <label class="control-label requiredField" for="email">
                     Email :
                     <span class="asteriskField">
                      *
                     </span>
                    </label>
                    <div class="input-group">
                     <div class="input-group-addon">
                      <i class="glyphicon glyphicon-envelope">
                      </i>
                     </div>
                     <input class="form-control" id="email" name="email" value="<?=$rowu['email']?>"  type="text"/>
                    </div>
                    <span class="help-block">
                     Please put your email so that the system can send its
              			 <a data-toggle="tooltip" data-placement="right" title="We will send QR Code to your email"><strong>code</strong></a>
                    </span>
                   </div>

              		 <div class="form-group ">
              			<label class="control-label " for="password">
              			 Password :
              			</label>
              			<div class="input-group">
              			 <div class="input-group-addon">
              				<i class="glyphicon glyphicon-lock">
              				</i>
              			 </div>
              			 <input class="form-control" id="password" name="password" disabled="" value="<?=$rowm['passw']?>"  type="password"/>
              			</div>
              		 </div>

                   <div class="form-group ">
                    <label class="control-label " for="identification Number">
                     Identification Number :
                    </label>
                    <div class="input-group">
                     <div class="input-group-addon">
                      <i class="glyphicon glyphicon-flag">
                      </i>
                     </div>
                     <input class="form-control" id="icnum" name="icnum" disabled value="<?=$rowu['ic_num']?>"  type="text"/>
                    </div>
                   </div>
                   <div class="form-group ">
                    <label class="control-label " for="userid">
                     Student ID :
                    </label>
                    <div class="input-group">
                     <div class="input-group-addon">
                      <i class="glyphicon glyphicon-credit-card">
                      </i>
                     </div>
                     <input class="form-control" id="userid" name="userid" disabled value="<?=$rowu['user_id']?>" type="text"/>
                    </div>
                   </div>
                   <div class="form-group ">
                    <label class="control-label " for="name2">
                     Contact Number :
                    </label>
                    <div class="input-group">
                     <div class="input-group-addon">
                      <i class="glyphicon glyphicon-earphone">
                      </i>
                     </div>
                     <input class="form-control" id="telnum" name="telnum" value="<?=$rowu['tel_num']?>"  type="text"/>
                    </div>
                   </div>
                   <div class="form-group">
                    <div>
                     <button class="btn btn-primary" name="MM_update" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
                      Update
                     </button>
                    </div>
                   </div>
                  </form>
									</div>
              </div>
					</div>
			</div><!-- /#page-content-wrapper -->
	</div>
</div><!-- /#wrapper -->


<script type="text/javascript">

$(document).ready(function(){

      $('[data-toggle="tooltip"]').tooltip();

		  fitText(document.getElementById('fittext'), 1.2);

			swal({
				//title: "Congrats!",
				//text: "Message alert paling keren udah berjaya installasi",
				//type: "success",
				//confirmButtonText: "Keren" });
});

</script>
<script src="../assets/js/skrip.js"></script>
<script src="../assets/js/sweetalert-dev.js"></script>
<script src="../assets/js/fittext.js"></script>
</body>
</html>
