<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=mythoracodb', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('SELECT * FROM ressources WHERE userid = ?');
$req->execute(array($_SESSION['id']));
while ($donnees = $req->fetch())
{
?>

<div id="ressource">
       <ul>
           <li><img src="terre.png" alt="Element terre" title="Terre"><b>Terre</b></li>
           <?php echo $donnees['earth']; ?>
           <li><img src="air.png" alt="Element air" title="Air"><b>Air</b></li>
           <?php echo $donnees['air']; ?>
           <li><img src="feu.png" alt="Element feu" title="Feu"><b>Feu</b></li>
           <?php echo $donnees['fire']; ?>
	   <li><img src="eau.png" alt="Element eau" title="Eau"><b>Eau</b></li>
           <?php echo $donnees['water']; ?>
       </ul>
</div>
