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
    //$position=$rowm["positions"];
    //$student="student";

    $sqlu = "SELECT * FROM student WHERE user_id='$id'";
    $resultu = mysqli_query($conn,$sqlu);
    $rowu = mysqli_fetch_assoc($resultu);
    $room_id = $_POST["roomid"];
    $conditions = $_POST["conditions"];
  




// DATE
date_default_timezone_set("Asia/Kuala_Lumpur");

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

  <title>Complaint Page</title>
</head>
<body>
  <div id="wrapper">
      <div class="overlay"></div>

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
          <ul class="nav sidebar-nav">
              <li class="sidebar-brand">
                  <a href="#">
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
                  <a href="logout.php" onclick="myfunction()"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a>
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
                      <h1 id="fittext">Complaint - CSRS</h1>
                    </header>
                  </div>

          <div class="col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Complaint Information</h3>
              </div>
            <div class="panel-body">

                <?php
        $sqlu="SELECT * FROM stud_report WHERE user_id='$id' AND conditions != 'CLOSED'";
        $resultu=mysqli_query($conn,$sqlu);
        if (!$resultu) {
            die('Invalid query: ' . mysqli_error());
        }
        if (mysqli_num_rows($resultu  ) == 0) {
            echo "No rows found, nothing to print so am exiting";
            exit;
        }else{
        ?>

              <table class="table table-striped table-condensed">
                <thead>
                  <tr>
                    <th>
                      Student ID
                    </th>
                  <th>
                      Complaint content
                  </th>
                  <th>
                      Date
                  </th>
                  <th>
                      Status
                  </th>
                        </tr>
                      </thead>
                      <tbody>
  <?php
        $rowu = mysqli_fetch_assoc($resultu);
        
            ?>

                        <td><?=$rowu["user_id"]; ?></td>
                        <td><?=$rowu["detail"]; ?></td>
                        <td><?=$rowu["date"]; ?></td>
                        <td><?=$rowu["conditions"]; ?></td>
                        </tr>
                      </tbody>
               
                    </table>
                  <div class="panel-footer">
                  </div>
                      </div>
                  </div>
            </div>

            <div class="col-md-6">
                <div class="widget-area no-padding blank">
                    <div class="status-upload">
                      <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <textarea required placeholder="Please fill here for your report" name="detail"></textarea>
                        <label data-toggle="tooltip" title="Upload picture" class="btn btn-primary">
                                    <input type="file" style="display:none;" name="fileToUpload" id="fileToUpload">
                                    <i class="glyphicon glyphicon-picture"></i> Picture
                                    </label>
                        <button type="submit" class="btn btn-success green" name="submit"><i class="glyphicon glyphicon-floppy-save"></i> Report</button>
                                
                        </div><!-- Status Upload  -->
                
                    <div class="form-group">
                          <!-- <label>Student ID :</label> -->
                          <input type="text" class="form-control" placeholder="User Id" id="userid" style="display:none;" value="<?=$rowu['user_id']?>" name="userid" required/>
                      </div>
                      <div class="form-group">
                          <!-- <label>Room ID :</label> -->
                          <input type="text" class="form-control" placeholder="Staff ID" id="roomid" style="display:none;" value="<?=$rowu['room_id']?>" name="roomid" required/>
                      </div>
                      <div class="form-group">
                          <!-- <label>Conditions :</label> -->
                          <input type="text" class="form-control" placeholder="conditions" id="conditions" style="display:none;" value="<?=$rowu['conditions']?>" name="conditions" required/>
                      </div>
                      <div class="form-group">
                        <!-- <label>Date :</label> -->
                          <input type="text" class="form-control" placeholder="date" id="date" style="display:none;" value=<?php echo date('Y/m/d');?> name="date" required/>
                      </div>
                              </form>   
                </div>
                </div><!-- Widget Area -->
                           <?php
                
            }
            ?>

           


<script type="text/javascript">

$('[data-toggle="tooltip"]').tooltip();

$(document).ready(function(){
      fitText(document.getElementById('fittext'), 1.2);

      swal({
        //title: "Congrats!",
        //text: "Message alert paling keren udah berjaya installasi",
        //type: "success",
        //confirmButtonText: "Keren" });
});

      
function myFunction() {
    var x;
    if (confirm("Press a button!") == true) {
        header('Location: ./login.php');

    } else {
        x = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = x;
}

</script>
<script src="../assets/js/skrip.js"></script>
<script src="../assets/js/sweetalert-dev.js"></script>
<script src="../assets/js/fittext.js"></script>
</body>
</html>
