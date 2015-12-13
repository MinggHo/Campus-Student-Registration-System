<?php
session_start();

include('./config.php');
if (!isset($_SESSION['userID']))
{
  header("Location:login.php");
  die();
}

$id=$_SESSION['userID'];
$sqlm = "SELECT * FROM staff where user_id='$id'";
$resultm=mysqli_query($conn,$sqlm);
$num_rowsm=mysqli_num_rows($resultm);
$rowm = mysqli_fetch_assoc($resultm);
$position=$rowm["positions"];
$admin="admin";

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CSRS</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="../assets/css/font-awesome.css" rel="stylesheet" />
  <!-- MORRIS CHART STYLES-->
  <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="../assets/css/custom.css" rel="stylesheet" />
  <!-- DATATABLES -->
  <link href="../assets/css/dataTables.bootstrap.css" rel="stylesheet" />

  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
    $('#Datatables').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
    </script>

</head>

<body>

  <div id="wrapper">

    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="staffpage.php">SCRS Admin</a> 
      </div>
      <div style="color: white;
      padding: 15px 50px 5px 50px;
      float: right;
      font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
    </nav> 
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center">
            <img src="../assets/img/find_user.png" class="user-image img-responsive"/>
          </li>                    
          <li><a class="active-menu"  href="staffpage.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a></li>
          <li><a  href="updatestaff.php"><i class="fa fa-edit fa-3x"></i> Update Staff Information</a></li>
          <li><a  href="roomchange.php"><i class="fa fa-home fa-3x"></i> Student Change Room</a></li>
          <li><a   href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a></li>
          <?php
          if ($position==$admin){

            ?>
            <li><a  href="registerstaff.php"><i class="fa fa-user fa-3x"></i> Register Staff </a></li>
            <?php
          }                           
          ?>                  
        </ul>

      </div>

    </nav>  
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
      <div id="page-inner">
        <div class="row">
          <div class="col-md-12">
            <h2>Admin Dashboard</h2>
            <!-- <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link"><?=$_SESSION['idNum']; ?></a></p> -->   
            <li class="dropdown">Welcome back, <?=$_SESSION['userID'];?></a>
              <!-- <h5> Jhon Deo , Love to see you back. </h5> -->
            </div>
          </div>              
          <!-- /. ROW  -->
          <hr />
          <div class="row">



          </div>

          <!-- /. ROW  --> 

 <div class="row">
                <div class="col-md-6">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Please select the room
                        </div>
                        <br>

                          <!--  <?php if($_GET['taken']==1){ ?>
            <div class="alert alert-danger">The room is taken. Please choose another room.</div>
            <?php } ?> -->
            <select name="block" class="block">
                <option> - </option>
            </select>
            <select name="level" class="level">
                <option> - </option>
            </select>
            <select name="houseno" class="houseno">
                <option> - </option>
            </select>

                        <div class="panel-body">
                            <div class="table-responsive">
                              <img src="../picture/room.jpg" alt="room" width="450" height="300" usemap="#Map" />
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
                <div class="col-md-6">

       
<?php
        $sql="SELECT user_id,room_id,conditions FROM stud_trans WHERE conditions = 'ACTIVE'";
        $result=mysqli_query($conn,$sql);
        if (!$result) {
            die('Invalid query: ' . mysqli_error());
        }
        if (mysqli_num_rows($result) == 0) {
            echo "No rows found, nothing to print so am exiting";
            exit;
        }else{
        ?>

                     <!--   Basic Table  -->
                    <div class="panel panel-default">
            <div class="panel-heading">
                 Advanced Tables
            </div>
                       <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Metric Number</th>
                                            <th>Room ID</th>
                                            <th>Room Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?=$row["user_id"]; ?></td>
                                            <td><?=$row["room_id"]; ?></td>
                                            <td><?=$row["conditions"]; ?></td>
                                        </tr>

                      <?php
                }
            
            ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  -->
                </div>
            </div>

            <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
    
   
</body>
</html>