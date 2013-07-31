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
<article class="building_city">
<p>The overall size and strength of your city.</p>
<p><input type="submit" value="Upgrade !" id="button_city" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_air">
<p>The elementary forge of air.</p>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
<p><input type="submit" value="Upgrade !" id="button_air" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_earth">
<p>The elementary forge of earth.</p>
<p><input type="submit" value="Upgrade !" id="button_earth" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_fire">
<p>The elementary forge of fire.</p>
<p><input type="submit" value="Upgrade !" id="button_fire" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_water">
<p>The elementary forge of water.</p>
<p><input type="submit" value="Upgrade !" id="button_water" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_wood">
<p>Where your heroes collect wood.</p>
<p><input type="submit" value="Upgrade !" id="button_wood" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_stone">
<p>Where your heroes collect stone.</p>
<p><input type="submit" value="Upgrade !" id="button_stone" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_iron">
<p>Where your heroes collect iron.</p>
<p><input type="submit" value="Upgrade !" id="button_iron" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_quartz">
<p>Where your heroes collect quartz.</p>
<p><input type="submit" value="Upgrade !" id="button_quartz" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_armory">
<p>This is the armory, where you summon heros, create and repair equipment.</p>
<p><input type="submit" value="Upgrade !" id="button_armory" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_houses">
<p>This is where your heroes live and rest.</p>
<p><input type="submit" value="Upgrade !" id="button_houses" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_temple">
<p>This is where your heroes pray to the gods and gain faith.</p>
<p><input type="submit" value="Upgrade !" id="button_temple" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_baths">
<p>This is where your citizens relax and gain happiness.</p>
<p><input type="submit" value="Upgrade !" id="button_baths" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_market">
<p>This is zhere your citizens exchange goods and gold.</p>
<p><input type="submit" value="Upgrade !" id="button_market" /></p>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_forum">
<p>This building is where ambassadors from other cities gather to make pacts and treaties.</p>
<p><input type="submit" value="Upgrade !" id="button_forum" /></p>
<aside>
</aside>
</article>
</section>

</div>
</div>
</body>

</html>
