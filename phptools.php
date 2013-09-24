<?php
//This is a file to include in other pages to reuse frequent functions.

//The redir function to redirect to another page.
function redir($url)
{
  echo "<script language=\"javascript\">";
  echo "window.location='$url';";
  echo "</script>"; 
}

//General function to connect to the DB and get the object
function getMythoracoDb()
{
try 
	{
	$bdd = new PDO('mysql:host=localhost;dbname=mythoracodb', 'root', '');
	}
catch (Exception $e)
	{
    die('Erreur : ' . $e->getMessage());
	}
return $bdd;
}

//Function to get a specific value from the cards DB.
//Args: DB object, string
function getValueFromCardsDb($bdd, $value)
{
$req = $bdd->prepare('SELECT * FROM cardsdb WHERE userid = ?');
$req->execute(array($_SESSION['id']));
while ($donnees = $req->fetch())
	{
	return $donnees[$value];
	}
return 0;
}

//Function to get a specific value from the unique cards table.
//Args: DB object, string
function getValueFromCardsTable($bdd, $value)
{
$req = $bdd->prepare('SELECT * FROM cards WHERE userid = ?');
$req->execute(array($_SESSION['id']));
while ($donnees = $req->fetch())
	{
	return $donnees[$value];
	}
return 0;
}

//Function to insert a line into the unique cards table (used in loick_register.php)
//Args: DB Object, stats
function insertLineIntoCardsDb($bdd, $speciesName, $rarity, $evolutionRank, $element, $attack, $defense, $abilityName, $abilityStrength, $cardType, $initiative, $moveSpeed, $minRange, $maxRange, $humanoid, $beast, $creature, $fusion, $aviary, $mechanical, $giant, $tiny, $etheral, $godly, $female, $male)
{
$req = $bdd->prepare('INSERT INTO cardsdb
(speciesName, rarity, evolutionRank, element, attack, defense, abilityName, abilityStrength, cardType, initiative, moveSpeed, minRange, maxRange, humanoid, beast, creature, fusion, aviary, mechanical, giant, tiny, etheral, godly, female, male) 
VALUES (:speciesName, :rarity, :evolutionRank, :element, :attack, :defense, :abilityName, :abilityStrength, :cardType, :initiative, :moveSpeed, :minRange, :maxRange, :humanoid, :beast, :creature, :fusion, :aviary, :mechanical, :giant, :tiny, :etheral, :godly, :female, :male)');
$req->execute(array(
 'speciesName' => $speciesName,
 'rarity' => $rarity,
 'evolutionRank' => $evolutionRank,
 'element' => $element,
 'attack' => $attack,
 'defense' => $defense,
 'abilityName' => $abilityName,
 'abilityStrength' => $abilityStrength,
 'cardType' => $cardType,
 'initiative' => $initiative,
 'moveSpeed' => $moveSpeed,
 'minRange' => $minRange,
 'maxRange' => $maxRange,
 'humanoid' => $humanoid,
 'beast' => $beast,
 'creature' => $creature,
 'fusion' => $fusion,
 'aviary' => $aviary,
 'mechanical' => $mechanical,
 'giant' => $giant,
 'tiny' => $tiny,
 'etheral' => $etheral,
 'godly' => $godly, 
 'female' => $female, 
 'male' => $male
 ));
 }
 
?>
