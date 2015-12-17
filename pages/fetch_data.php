<?php
if(isset($_POST['get_option']))
 {
   $host = 'localhost';
   $user = 'root';
   $pass = '';

   mysql_connect($host, $user, $pass);

   mysql_select_db('csrs');


   $state = $_POST['get_option'];
   $find=mysql_query("select house_id from house where floor_ai='$state'");
   while($row=mysql_fetch_array($find))
   {
     echo "<option>".$row['house_id']."</option>";
   }

   exit;
 }
?>
