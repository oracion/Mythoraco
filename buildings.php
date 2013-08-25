<?php
include("phptools.php")
?>

<?php
session_start();
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
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_city' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_air">
<p>The elementary forge of air.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_air' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_earth">
<p>The elementary forge of earth.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_earth' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_fire">
<p>The elementary forge of fire.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_fire' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_water">
<p>The elementary forge of water.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_air' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_wood">
<p>Where your heroes collect wood.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_wood' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_stone">
<p>Where your heroes collect stone.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_stone' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_iron">
<p>Where your heroes collect iron.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_iron' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_quartz">
<p>Where your heroes collect quartz.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_quartz' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_armory">
<p>This is the armory, where you summon heros, create and repair equipment.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_armory' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_houses">
<p>This is where your heroes live and rest.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_houses' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_temple">
<p>This is where your heroes pray to the gods and gain faith.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_temple' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_baths">
<p>This is where your citizens relax and gain happiness.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_baths' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_market">
<p>This is zhere your citizens exchange goods and gold.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_market' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

<section class="building_section">
<article class="building_forum">
<p>This building is where ambassadors from other cities gather to make pacts and treaties.</p>
<form action="traitement_buildings.php" method="post">
<p><input type="submit" name='button_forum' value="Upgrade !" /></p>
</form>
<aside>
</aside>
</article>
</section>

</div>
</div>
</body>

</html>
