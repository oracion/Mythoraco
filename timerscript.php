<?php
include("phptools.php")
?>

<?php
//On commence la connection � la database//
try 
{
$bdd = new PDO('mysql:host=localhost;dbname=mythoracodb', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reqreadbuildings = $bdd->query('SELECT * FROM buildings');
$reqreadressources = $bdd->query('SELECT * FROM ressources');

while ($donneesbuildings = $reqreadbuildings->fetch())
{
$currentid = $donneesbuildings['userid'];
while ($donneesressources = $reqreadressources->fetch())
{
$newair    = $donneesressources['air']    + ($donneesbuildings['levelair']*$donneesbuildings['levelair']*0.5 + $donneesbuildings['levelair']*3)               / 360;
$newearth  = $donneesressources['earth']  + ($donneesbuildings['levelearth']*$donneesbuildings['levelearth']*0.5 + $donneesbuildings['levelearth']*3)         / 360;
$newfire   = $donneesressources['fire']   + ($donneesbuildings['levelfire']*$donneesbuildings['levelfire']*0.5 + $donneesbuildings['levelfire']*3)            / 360;
$newwater  = $donneesressources['water']  + ($donneesbuildings['levelwater']*$donneesbuildings['levelwater']*0.5 + $donneesbuildings['levelwater']*3)         / 360;
$newstone  = $donneesressources['stone']  + ($donneesbuildings['levelquarry']*$donneesbuildings['levelquarry']*0.25 + $donneesbuildings['levelquarry']*10)    / 360;
$newwood   = $donneesressources['wood']   + ($donneesbuildings['levelsawmill']*$donneesbuildings['levelsawmill']*0.25 + $donneesbuildings['levelsawmill']*10) / 360;
$newiron   = $donneesressources['iron']   + ($donneesbuildings['leveliron']*$donneesbuildings['leveliron']*0.25 + $donneesbuildings['leveliron']*10)          / 360;
$newquartz = $donneesressources['quartz'] + ($donneesbuildings['levelquartz']*$donneesbuildings['levelquartz']*0.25 + $donneesbuildings['levelquartz']*10)    / 360;
$newgold   = $donneesressources['gold']   + (($donneesressources['happiness']/100) * $donneesbuildings['houses']) / 360;
$reqwrite = $bdd->prepare('
UPDATE ressources 
SET air = :air, earth = :earth, fire = :fire, water = :water, stone = :stone, wood = :wood, iron = :iron, quartz = :quartz, gold = :gold
WHERE id = :id');
$reqwrite->execute(array(
 'air'     => $newair,
 'earth'   => $newearth,
 'fire'    => $newfire,
 'water'   => $newwater,
 'stone'   => $newstone,
 'wood'    => $newwood,
 'iron'    => $newiron,
 'quartz'  => $newquartz,
 'gold'    => $newgold,
 'id'      => $currentid
 ));

}
$reqreadressources->closeCursor();
}
$reqreadbuildings->closeCursor();
//On ferme la connexion//
?>
