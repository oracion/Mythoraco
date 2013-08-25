<?php
include("phptools.php")
?>

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
<div id="player_xp">
       <ul>
           <li><b>Level : 
		   <?php
		   echo $donnees['playerlevel'];
		   ?>
		   </b></li>
           <li><b>XP : 
		   <?php
		   echo $donnees['playerxp'];
		   ?>
		   /
		   <?php
		   echo 2*$donnees['playerlevel']*$donnees['playerlevel']+4*$donnees['playerlevel'];
		   ?>
		   </b></li>
       </ul>
</div>
<?php
}
$req->closeCursor();
?>
