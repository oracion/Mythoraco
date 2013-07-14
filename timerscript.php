<?php
// la fonction de redirection ------------ 
function redir($url){ 
echo "<script language=\"javascript\">"; 
echo "window.location='$url';"; 
echo "</script>";  }

//On commence la connection à la database//
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
$newstone = $donneesressources['stone']+($donneesbuildings['levelquarry']*$donneesbuildings['levelquarry']*0.25 + $donneesbuildings['levelquarry']*10);
$newwood = $donneesressources['wood']+($donneesbuildings['levelsawmill']*$donneesbuildings['levelsawmill']*0.25 + $donneesbuildings['levelsawmill']*10);
$newiron = $donneesressources['iron']+($donneesbuildings['leveliron']*$donneesbuildings['leveliron']*0.25 + $donneesbuildings['leveliron']*10);
$newquartz = $donneesressources['quartz']+($donneesbuildings['levelquartz']*$donneesbuildings['levelquartz']*0.25 + $donneesbuildings['levelquartz']*10);
$reqwrite = $bdd->prepare('UPDATE ressources SET 
stone = :stone, wood = :wood, iron = :iron, quartz = :quartz 
WHERE id = :id');
$reqwrite->execute(array(
 'stone' => $newstone,
 'wood' => $newwood,
 'iron' => $newiron,
 'quartz' => $newquartz,
 'id' => $currentid
 ));

}
$reqreadressources->closeCursor();
}
$reqreadbuildings->closeCursor();
//On ferme la connexion//
?>
