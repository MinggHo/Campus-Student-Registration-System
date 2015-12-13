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
	<title>Main Menu</title>
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
											<h1 id="fittext">Main Menu</h1>
										</header>
									</div>
							</div>
					</div>
			</div><!-- /#page-content-wrapper -->
	</div>
</div><!-- /#wrapper -->


<main>
		<section class="cd-section index cd-selected">
			<div class="cd-content">
				<p>
					<div class ="container">

					<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
//echo "The time is " . date("h:i:sa",time());
//echo time();
//echo "Today is " . date("Y/m/d") . "<br>";
?>	
						<div class="alert alert-success" role="alert"><?echo "Current time is : " . date("h:i a",time());?></div>

			<div class="alert alert-info">
        <a href="#" class="btn btn-xs btn-primary pull-right">Cool pop alert</a>
        <strong>Info:</strong> you should do an action.
    	</div>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">Student Information</h2>
				</div>
				<div class="panel-body">
					<?php
        $sql="SELECT user_id,name FROM student WHERE user_id='$id'";
        $result=mysqli_query($conn,$sql);
        //var_dump($result);
        if (!$result) {
            die('Invalid query: ' . mysqli_error());
        }
        if (mysqli_num_rows($result) == 0) {
            echo "No rows found, nothing to print so am exiting";
            exit;
        }else{
        ?>
					<table class="table">
						<thead>
							<tr>
							<th>Metric Number</th>
							<th>Name</th>
							<!-- <th>Action</th> -->
							</tr>
						</thead>
						<tbody>
						<?php
						while ($row = mysqli_fetch_assoc($result)) {
							?>
							<tr>
								 <td><?=$row["user_id"]; ?></td>
                				<td><?=$row["name"]; ?></td>
								<!-- <td><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</button></td> -->
							</tr>
									<?php
                													}
            }
            						?>
						</tbody>
  				</table>
				</div>
			</div>
					</p>
					
					<!-- <div class="container"> -->
						<div class="alert alert-info">

							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								x
							</button> <strong>Alerting student!</strong>
							<div>
								<strong>Warning!</strong> Click below button to confirm your email.<!--  <a href="#" class="alert-link">alert link</a> -->
							</div>
						</div>
						
						<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Click here</button>
					  <p id="demo" class="collapse">
					    <label>Your email :</label>
                    	<input type="text" class="form-control" id="email" name="email" placeholder="example@email.com" required/>
                    	<br>
                    	<button type="submit" name="MM_submit" class="btn btn-primary">Submit</button>
               		  </p>
               		 
					<p>

					</p>
					<!-- </div> -->

						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">
									Student Room History
								</h3>
							</div>
							<div class="panel-body">
			    				
								<?php
        $sqlh="SELECT user_id,room_id,date,conditions FROM stud_trans WHERE user_id='$id'";
        $resulth=mysqli_query($conn,$sqlh);
        if (!$resulth) {
        //var_dump($resulth);
            die('Invalid query: ' . mysqli_error());
        }
        if (mysqli_num_rows($resulth) == 0) {
            echo "No rows found, nothing to print so am exiting";
            exit;
        }else{
        ?>			
			  <table class="table table-striped table-condensed">
			    				<thead>
			    					<tr>
			    						<th>Metric Number</th>
			    						<th>Previous Room</th>
			    						<th>Date Register</th>
			    						<th>Status</th>
			    					</tr>
			    				</thead>
			    				<tbody>
			    				<?php
						while ($rowh = mysqli_fetch_assoc($resulth)) {
							?>
			    					<tr>
			    						<td><?=$rowh["user_id"]; ?></td>
			    						<td><?=$rowh["room_id"]; ?></td>
			    						<td><?=$rowh["date"]; ?></td>
			    						<td><?=$rowh["conditions"]; ?></td>
			    					</tr>
		
			    					<?php
                					}
           							 }
            						?>
			    				</tbody>
			    			</table>
							</div>
							<div class="panel-footer">
							</div>
						</div>
			<!-- 		</div>
				</div>
			</div>
					</div>
					</div>
				</div>
			</div> -->
		</section> <!-- .cd-section -->
	</main>


<script type="text/javascript">

$(document).ready(function(){
		  fitText(document.getElementById('fittext'), 1.2);

			swal({
				//title: "Welcome!",
				//text: "You have successfully login",
				//type: "success",
				//confirmButtonText: "OK" });
});

</script>
<script src="../assets/js/skrip.js"></script>
<script src="../assets/js/sweetalert-dev.js"></script>
<script src="../assets/js/fittext.js"></script>
</body>
</html>
