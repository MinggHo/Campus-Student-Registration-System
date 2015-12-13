<?php
session_start();
session_destroy();
print "<script>";
print "self.location='login.php';";
print "</script>";


?>