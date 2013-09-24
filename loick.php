<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<title>TRAVAILLE ESCLAVE</title>
</head>

<body>
<div id="global_container">
<div id="mid_container">

<form method="post" action="traitement_loick.php">
<p><input type="text"name="speciesName" id="speciesName" placeholder="Espece de la carte" size="17" required /></p>
<p><input type="int" name="rarity" id="rarity" placeholder="Rarete" size="10" required /></p>
<p><input type="int" name="evolutionRank" id="evolutionRank" placeholder="Rang d'evolution" size="18" required /></p>
<p><input type="text" name="element" id="element" placeholder="Element" size="7" required /></p>
<p><input type="int" name="attack" id="attack" placeholder="Attaque" size="11" required /></p>
<p><input type="int" name="defense" id="defense" placeholder="Defense" size="11" required /></p>
<p><input type="text" name="abilityName" id="abilityName" placeholder="Nom de l'abilite" size="22" required /></p>
<p><input type="int" name="abilityStrength" id="abilityStrength" placeholder="Puissance de l'abilite" size="22" required /></p>
<p><input type="text" name="cardType" id="cardType" placeholder="Type de la carte" size="15" required /></p>
<p><input type="int" name="initiative" id="initiative" placeholder="Initiative" size="11" required /></p>
<p><input type="int" name="moveSpeed" id="moveSpeed" placeholder="Vitesse de mouvement" size="25" required /></p>
<p><input type="int" name="minRange" id="minRange" placeholder="Portee minimale" size="15" required /></p>
<p><input type="int" name="maxRange" id="maxRange" placeholder="Portee maximale" size="15" required /></p>
<p><input type="checkbox" name="humanoid" id="humanoid"/>Humanoide
<input type="checkbox" name="beast" id="beast"/>Bete
<input type="checkbox" name="creature" id="creature"/>Creature
<input type="checkbox" name="fusion" id="fusion"/> Fusion
<input type="checkbox" name="aviary" id="aviary"/> Aviaire</p>
<p><input type="checkbox" name="mechanical" id="mechanical"/>Mechanique
<input type="checkbox" name="giant" id="giant"/>Geant
<input type="checkbox" name="tiny" id="tiny"/>Petit
<input type="checkbox" name="etheral" id="etheral"/>Etheral
<input type="checkbox" name="female" id="female"/>Femelle
<input type="checkbox" name="male" id="male"/>Male
<input type="checkbox" name="godly" id="godly"/>Dieu</p>

<p><input type="submit" value="modify" id="button" /></p>

</div>
</div>

