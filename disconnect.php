<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] = false)
{
redir("index.php");
}

// la fonction de redirection ------------ 
function redir($url){ 
echo "<script language=\"javascript\">"; 
echo "window.location='$url';"; 
echo "</script>";  }

$_SESSION['logged_in'] = false;
redir("index.php"); 
?>