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
                  <a href="studentout.php"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Campus List Out</a>
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
      <p><span class="label label-success label-as-badge">1 . Click submit to confirm and register for room <i style="color:#FAFF00">[Please note your room is random]</i></span></p>

      <form id="myform" method="get" action="studentregistercampus.php">
        <div class="form-group ">
          <label class="control-label " for="fname">
            Full Name :
          </label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-pencil"></i>
            </div>
            <input class="form-control" id="fname" name="fname" disabled value="<?=$rowu['name']?>"  type="text"/>
          </div>

          <div>
            <div class="form-group ">
              <label class="control-label " for="userid">
                Student ID :
              </label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="glyphicon glyphicon-credit-card"></i>
                </div>
                <input class="form-control" id="userid" name="userid" disabled value="<?=$rowu['user_id']?>" type="text"/>
              </div>
            </div>

            <div class="form-group">
              <div>
                <p><span class="label label-success label-as-badge">2 . You'll be given a QR Code through e-mail <i style="color:#FAFF00">[Please open your email after submit]</i></span></p>

                <button id="submitted" class="btn btn-primary" name="submit" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
                  Submit
                </button>
              </div>
            </div>
          </form><!-- End of form -->
        </div>
      </div>
    </div>
  </div>
</div><!-- daftar individu div -->

<div id="daftarKumpulan" style="display:none">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Group Entry</h3>
    </div>

<div class="panel-body">
  <p><span class="label label-success label-as-badge">1 . Please select how many house members <i style="color:#FAFF00">[Please note your room is random]</i></span></p>

    <div class="form-group input-group input-group-sm">
      <label for="sel1">Number of Students</label>
      <select class="form-control" name="numDep" id="dropdown">
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
    </div>

    <form id="form2">
      <table>
        <tr id="textboxDiv"></tr>
      </table>
      <p><span class="label label-success label-as-badge">2 . You'll be given a QR Code through e-mail <i style="color:#FAFF00">[Please open your email after submit]</i></span></p>

      <button id="submitted" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
    </form>
  </div>

</div><!-- End of panel -->
</div><!--Daftar Kumpulan div -->
</div><!-- end column -->
</div><!-- row  -->
</div><!-- container -->
</div><!-- /#page-content-wrapper -->
</div><!-- /#wrapper -->


<script type="text/javascript">

$(document).ready(function(){
		  fitText(document.getElementById('fittext'), 1.2);

      // wait for the DOM to be loaded
      // bind 'myForm' and provide a simple callback function
      $('#myform').submit(function(event) {
        var str = $('#myform').attr('action'),
        method = $("#myform").attr('method'),
        name = $("#fname").val();

        console.log(str + " " + method + " " + name);

        event.preventDefault();
        swal({
          title:"Success!",
          text: "You'll be given a QR Code on Email",
          type: "success",
          confirmButtonText: "OK",
          closeOnConfirm: false
        },
        function(isConfirm){
          window.location.href = str;
        });
      });

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

      $("#dropdown").change(function(){
        var selVal = $(this).val();
          $("#textboxDiv").html('');
              if(selVal > 0) {

                var i = 1;

                $("#textboxDiv").append(
                    '<div class="form-group has-success">'
                       + '<div class="input-group input-group-sm">'
                       + '<span class="input-group-addon" id="sizing-addon3">' + i + '</span>'
                       + '<input type="text" id="student'+ i +'" name="textVal[]" value ="<?=$rowu['user_id']?>" maxlength="10" class="form-control" placeholder="Student matric number" aria-describedby="sizing-addon3" disabled>'
                    + '</div></div>');

                for(var i = 2; i<= selVal; i++){
                    $("#textboxDiv").append(
                      '<div id="labelform'+ i +'" class="form-group has-warning">'
                         + '<div class="input-group input-group-sm">'
                         + '<span class="input-group-addon" id="sizing-addon3">' + i + '</span>'
                         + '<input type="text" id="student'+ i +'" name ="textVal[]" value ="" maxlength="10" pattern=".{10,}" title="Error : Invalid Data - Length must be 10" class="form-control" placeholder="Student matric number" aria-describedby="sizing-addon3" required>'
                      + '</div><div id="help'+ i +'"></div></div>'
                      // '<p>Please insert student ' + i + ' matrix number : <input type="text" name="textVal[]" value="" /></p><br>'
                    );
                  }
                }
        });
});
</script>
<script src="../assets/js/aja.js"></script>
<script src="../assets/js/skrip.js"></script>
<script src="../assets/js/sweetalert-dev.js"></script>
<script src="../assets/js/fittext.js"></script>
</body>
</html>
