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
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />


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
                <a class="navbar-brand" href="index.html">SCRS Admin</a> 
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
                    <li><a  href="roomchange.php"><i class="fa fa-qrcode fa-3x"></i> Student Change Room</a></li>
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
                     <h2>New Staff Registration</h2>
                     <!-- <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link"><?=$_SESSION['idNum']; ?></a></p> -->   
                     <li class="dropdown">Welcome back, <?=$_SESSION['userID']; ?></li>
                        <!-- <h5> Jhon Deo , Love to see you back. </h5> -->
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
             </div>
           
                 <!-- /. ROW  --> 
 <div class="panel panel-default">
                        <div class="panel-heading">
                            Registration Form
                        </div>
                        <div class="panel-body">
                            <div class="row">


<?php if ((isset($_POST["MM_insert"]))) {

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

   switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

   $insertSQL = sprintf("INSERT INTO user (user_id,passw,role) VALUES (%s,%s,%s)",
                       GetSQLValueString($_POST['userid'], "text"),
                        GetSQLValueString(md5($_POST['userid']), "text"),
                        GetSQLValueString($_POST['optionsRadios3'], "text"));

  // ($database_cpsystem, $cpsystem);
  $Result1 = mysqli_query($conn, $insertSQL) or die(mysql_error());

   $insertSQL2 = sprintf ("INSERT INTO `staff` (name,user_id,tel_num,email,positions) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['fname'], "text"),
                       GetSQLValueString($_POST['userid'], "text"),
                       GetSQLValueString($_POST['telnum'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                        GetSQLValueString($_POST['optionsRadios'], "text"));

  // ($database_cpsystem, $cpsystem);
  $Result2 = mysqli_query($conn, $insertSQL2) or die(mysql_error());
  echo "<script language='javascript'>alert('Data successfully insert');</script> 
<script language='javascript'>window.location.href='staffpage.php'</script>";

}?>

                                <form method="post" action="registerstaff.php">
                                <div class="col-md-6">
                                    <!-- <form role="form"> -->
                                        <div class="form-group">
                                            <label>Staff Name :</label>
                                            <input type="text" class="form-control" placeholder="Full name" id="fname" name="fname" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Staff ID :</label>
                                            <input type="text" class="form-control" placeholder="Staff ID" id="userid" name="userid" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number :</label>
                                            <input type="text" class="form-control" placeholder="Contact number" id="telnum" name="telnum" required/>
                                        </div>
                                        <div class="form-group">
                                        	<label>Email :</label>
                                            <input type="email" class="form-control" placeholder="example@email.com" id="email" name="email" required/>
                                        </div>
                                        <div class="form-group">
                                        <div class="radio" style="display: none;">
                                                <label>
                                                    <input type="radio" name="optionsRadios3" id="optionsRadios3" value="STAFF" checked />STAFF
                                                </label>
                                            </div>
                                        </div>
                                         



                   <!--                      <div class="form-group">
									        <div class="row">
									            <label class="col-sm-2 col-sm-2 control-label">Upload Picture :</label>
									                <div class="col-sm-3">
											<form action="/file-upload" class="dropzone" id="my-awesome-dropzone">
									      	</form>
									     	<button dz-remove class="btn btn-danger delete">Cancel
									        <i class="glyphicon glyphicon-trash"></i></button> 
									<img src="../picture/cancel.png" width="50px" height="50px" alt="Click me to remove the file." data-dz-remove />
									</div>
									</div>

									</div> -->

                                        <div class="form-group">
                                        	<label>Position :</label>
                                        <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios" value="Admin" checked />Administrator
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios" value="Staff"/>Staff
                                                </label>
                                            </div>
                                        </div>
                                        	<div>
                                            <button type="submit" name="MM_insert" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-default"><a href="staffpage.php">Cancel</a></button>
                                        	</div>
                                    </form>
                                </div>
                               <!--  </form> -->
                            </div>
                        </div>
</div>
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
         <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>


  <script>
   function previewFile(){
       var preview = document.querySelector('img'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }

  previewFile();  //calls the function named previewFile()
  </script>


          

  </body>
  </html>