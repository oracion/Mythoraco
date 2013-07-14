<?php
session_start();
// la fonction de redirection ------------ 
function redir($url){ 
echo "<script language=\"javascript\">"; 
echo "window.location='$url';"; 
echo "</script>"; 
} 
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] = false)
{
redir("index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<?php include("javascript.php") ?>
<link rel="stylesheet" href="stylesheet.css" />
<title>Mythoraco progresse !</title>
</head>

<body>
<div id="global_container">
<?php include("online_layout.php") ?>
<div id="mid_container">

<section class="building_section">
<article class="building">
<p>Ce bâtiment est cool.</p>
<p><input type="submit" value="Upgrade !" id="button" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building">
<p>Ce bâtiment est fun.</p>
<p><input type="submit" value="Upgrade !" id="button" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building">
<p>Ce bâtiment est amusant.</p>
<p><input type="submit" value="Upgrade !" id="button" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building">
<p>Ce bâtiment est puissant.</p>
<p><input type="submit" value="Upgrade !" id="button" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building">
<p>Ce bâtiment est op.</p>
<p><input type="submit" value="Upgrade !" id="button" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building">
<p>Ce bâtiment ne sert à rien, mais il coûte cher.</p>
<p><input type="submit" value="Upgrade !" id="button" /></p>
<aside>
</aside>
</article>
</section>

</div>
</div>
</body>

</html>