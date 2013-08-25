<?php
include("phptools.php")
?>

<?php
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] = false)
{
redir("index.php");
}

$_SESSION['logged_in'] = false;
redir("index.php"); 
?>
