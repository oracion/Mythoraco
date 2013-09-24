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
<p><input type="hidden" value="0" name="humanoid" /><input type="checkbox" name="humanoid" value=1 id="humanoid"/>Humanoide
<input type="hidden" value="0" name="beast" /><input type="checkbox" name="beast" value="1" id="beast"/>Bete
<input type="hidden" value="0" name="creature" /><input type="checkbox" name="creature" value="1" id="creature"/>Creature
<input type="hidden" value="0" name="fusion" /><input type="checkbox" name="fusion" value="1" id="fusion"/> Fusion
<input type="hidden" value="0" name="aviary" /><input type="checkbox" name="aviary" value="1" id="aviary"/> Aviaire</p>
<p><input type="hidden" value="0" name="mechanical" /><input type="checkbox" name="mechanical" value="1" id="mechanical"/>Mechanique
<input type="hidden" value="0" name="giant" /><input type="checkbox" name="giant" value="1" id="giant"/>Geant
<input type="hidden" value="0" name="tiny" /><input type="checkbox" name="tiny" value="1" id="tiny"/>Petit
<input type="hidden" value="0" name="etheral" /><input type="checkbox" name="etheral" value="1" id="etheral"/>Etheral
<input type="hidden" value="0" name="female" /><input type="checkbox" name="female" value="1" id="female"/>Femelle
<input type="hidden" value="0" name="male" /><input type="checkbox" name="male" value="1" id="male"/>Male
<input type="hidden" value="0" name="godly" /><input type="checkbox" name="godly" value="1" id="godly"/>Dieu</p>

<p><input type="submit" value="Create" id="button" /><input type="reset" value="Reset" name="reset_button" id="reset_button"/></p>

</div>
</div>

