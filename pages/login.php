<?php
session_start();
ob_start();

if(isset($_POST['submit'])){
$userID = $_POST['username'];
$passw = $_POST['passw'];
// Include database connection settings
include('./config.php');


 $a = set_time_limit(25);

// Retrieve username and password from database according to user's input

 
$sql = "SELECT * FROM user WHERE (user_id = '" . mysqli_real_escape_string($conn,$_POST['username']) . "') and (passw = '" .(md5($_POST['passw'])) . "')";
$result=mysqli_query($conn,$sql);
$num_rows=mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$role=$row["role"];
$staff="STAFF";
$student="STUDENT";



if (mysql_error($sql))
{
echo "<script language='javascript'>alert('No Record');</script> 
<script language='javascript'>window.location.href='index.html'</script>";
}
// Check username and password match

if ($num_rows == 1) 
            {
                if($role==$staff)
                    {
                        session_start();
                        // Set username session variable
                         $_SESSION['userID'] = $userID;
                        // Jump to staffhome page as staff
                        header('Location: ./staffpage.php');     
                        exit();
                    }
                elseif($role==$student)
                    {      
                        session_start();
                        // Set username session variable
                        $_SESSION['userIDD'] = $userID;
                        // Jump to adminhome page as Admin
                        //header('Location: ./studentpage.php');
                        echo "<script language='javascript'>alert('Login Success!')</script>
                        <script language='javascript'>window.location.href='studentpage.php'</script>";        
                        
                        exit();

                    }    
            }
else        {
                echo "<script language='javascript'>alert('Login Error');</script> 
                <script language='javascript'>window.location.href='login.php'</script>";
            }
}

?>

<!DOCTYPE html>
<html>
  <head>

    <script type="text/javascript">

     function myFunction() {
       document.getElementById("login_form").reset();
     }

     function validateForm()
        {
            var x=document.forms["login"]["username"].value;
            if (x==null || x=="")
         {
            alert("Please Insert Your Username");
            return false;
         }
            var x=document.forms["login"]["passw"].value;
            if (x==null || x=="")
                {
                    alert("Please Insert Your Password");
                    return false;
                }  
        }

   </script>

    <meta charset="utf-8">
    <title>CSRS Login</title>

<link rel="stylesheet" type="text/css" href="../assets/css/loginbox3.css">

    <script type="text/javascript" src="../assets/js/jquery-1.10.2"></script>
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/vegas.min.js"></script>
    <script type="text/javascript" src="../assets/js/vegas.js"></script>

    <link rel="stylesheet" href="../assets/css/vegas.min.css">
  </head>

  <body>
    <script>
        $("#example, body").vegas({
            slides: [
              { src: '../picture/metU.jpg', fade:4000, cover:true },
              { src: '../picture/aljazari.jpg', fade:4000 },
              { src: '../picture/utem.jpg', fade:4000 }
            ],
            overlay: '../Login/js/vegas/overlays/07.png'
        });
    </script>

<div class="logo"></div>
    <div class="login-block">
      <h1><center><small>Pendaftaran Kolej Kediaman</small><br/> UNIVERSITI TEKNIKAL MALAYSIA MELAKA</center></h1>
        <form action="./login.php" method="POST">
          <input type="text" value="" placeholder="Username" id="username" name="username" required/>
          <input type="password" value="" placeholder="Password" id="passw" name="passw" required/>
          <button type="submit" id="submit" name="submit">Sign In</button>
          <br></br>
          <button type="reset" id="reset" name="reset" onClick="myFunction()">Reset</button>
      </form>
    </div>


<script src="../assets/js/fittext.js"></script>
  </body>
</html>
