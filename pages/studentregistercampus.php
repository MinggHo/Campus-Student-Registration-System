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

	<link rel="stylesheet" href="../assets/css/cssutama.css" />
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
                      <h1 id="fittext">Campus Registration - CSRS</h1>
                    </header>

                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Please make your selection</h3>
                    </div>
                    <div class="panel-body">
                      <button id="showIndividu" class="button button--itzel button--text-thick"><i class="button__icon fa fa-user"></i>
                        <span>Individual Entry</span>
                      </button>
                      <button id="showKumpulan" class="button button--itzel button--text-thick"><i class="button__icon fa fa-group"></i>
                        <span>Group Entry</span>
                      </button>
                    </div>
                  </div>

                  <div id="daftarIndividu" style="display:none">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                        <h3 class="panel-title">Individual Entry</h3>
                      </div>
                      <div class="panel-body">
                        <h4>--Click submit to confirm and register for room--</h4>
                        
                        <form method="post" action="#">
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
                     <input class="form-control" id="email" name="email" disabled value="<?=$rowu['email']?>"  type="text"/>
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
                     <input class="form-control" id="password" name="password" disabled value="<?=$rowm['passw']?>"  type="password"/>
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
                     <input class="form-control" id="telnum" name="telnum" disabled value="<?=$rowu['tel_num']?>"  type="text"/>
                    </div>
                   </div>
                       <div class="form-group">
                        <div>
                         <button class="btn btn-primary" name="submit" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
                          Submit
                         </button>
                        </div>
                       </div>
                      </form>
                      </div>
                    </div>
                  </div>

                  <div id="daftarKumpulan" style="display:none">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                        <h3 class="panel-title">Group Entry</h3>
                        <br>
                        <strong>Info:</strong> Please insert other student metric number. 
                      </div>
                      <div class="panel-body">
                        <form name="myform">
<table>
<tr><td>Number of Students </td><td><select name="numDep" id="dropdown">
    <option value="">Please Select</option>
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option></select></td>
</tr>

<tr id="textboxDiv"></tr>
</table>
<br>
<button id="submitted" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Submit</button>
</form>
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
          </div>
      </div><!-- /#page-content-wrapper -->
  </div>
</div><!-- /#wrapper -->


<script type="text/javascript">

$(document).ready(function(){
		  fitText(document.getElementById('fittext'), 1.2);

			swal({
				title: "Register here!",
				text: "Please register your room",
				type: "success",
				confirmButtonText: "OK" });

      $("#showIndividu").click(function(){
        if($("#daftarKumpulan").is(":visible")){
          $("#daftarKumpulan").toggle('clip',0,800);
          $("#daftarIndividu").toggle('clip',0,800);
        } else
        $("#daftarIndividu").toggle('clip',0,800);
      });

      $("#showKumpulan").click(function(){
        if($("#daftarIndividu").is(":visible")){
          $("#daftarIndividu").toggle('clip',0,800);
          $("#daftarKumpulan").toggle('clip',0,800);
        } else
        $("#daftarKumpulan").toggle('clip',0,800);
      });

});

$(document).ready(function() {
    $("#dropdown").change(function() {
        var selVal = $(this).val();
        $("#textboxDiv").html('');
        if(selVal > 0) {
            for(var i = 1; i<= selVal; i++) {
                $("#textboxDiv").append('<br><input type="text" name="textVal[]" value="" /><br>');
            }
        }
    });
});


</script>
<script src="../assets/js/skrip.js"></script>
<script src="../assets/js/sweetalert-dev.js"></script>
<script src="../assets/js/fittext.js"></script>
</body>
</html>
