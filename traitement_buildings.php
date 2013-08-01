<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<?php include("javascript.php") ?>
<link rel="stylesheet" href="stylesheet.css" />
<title>Mythoraco progresse !</title>
</head>

<?php
function redir($url)
{ 
echo "<script language=\"javascript\">"; 
echo "window.location='$url';"; 
echo "</script>"; 
} 
?>

<?php
if (isset $_SESSION['id'])
  {
  //First, connect to the database.
  try 
    {
    $bdd = new PDO('mysql:host=localhost;dbname=mythoracodb', 'root', '');
    }
  catch (Exception $e)
    {
    die('Erreur : ' . $e->getMessage());
    }
    
  //THIS IS THE CODE TO RETRIEVE THE BUILDING LEVELS FROM THE 'buildings' DATABASE
  //Here, we use the $_SESSION['id'] set at login. Might not be very secure...
  $reqread = $bdd->prepare('SELECT * FROM buildings WHERE userid = :userid');
  $reqread->execute(array( 'userid' => $_SESSION['id']));
  while ($donnees = $reqread->fetch())
    {
    $levelfire = $donnees['levelfire'];
    $levelwater = $donnees['levelwater'];
    $levelair = $donnees['levelair'];
    $levelearth = $donnees['levelearth'];
    $levelquarry = $donnees['levelquarry'];
    $levelquartz = $donnees['levelquartz'];
    $levelsawmill = $donnees['levelsawmill'];
    $leveliron = $donnees['leveliron'];
    $levelhouse = $donnees['levelhouse'];
    $leveltemple = $donnees['leveltemple'];
    $levelbath = $donnees['levelbath'];
    $levelmarket = $donnees['levelmarket'];
    $levelarmory = $donnees['levelarmory'];
    $levelcity = $donnees['levelcity'];
    }
  //END OF LEVEL RETRIEVAL CODE
  
  //THIS IS THE CODE TO RETRIEVE THE RESSOURCES FROM THE 'ressources' DATABASE
  //Here, we use the $_SESSION['id'] set at login. Might not be very secure...
  $reqread2 = $bdd->prepare('SELECT * FROM ressources WHERE userid = :userid');
  $reqread2->execute(array( 'userid' => $_SESSION['id']));
  while ($donnees = $reqread2->fetch())
    {
    $fire = $donnees['fire'];
    $water = $donnees['water'];
    $air = $donnees['air'];
    $earth = $donnees['earth'];
    $stone = $donnees['stone'];
    $wood = $donnees['wood'];
    $iron = $donnees['iron'];
    $quartz = $donnees['quartz'];
    $happiness = $donnees['happiness'];
    }
  //END OF RESSOURCES RETRIEVAL CODE
  }
  //END OF DATABASE READING
  
  if (isset $_SESSION['id'])
    {
    //START OF BUILDING LEVEL UP
    
    //CITY
    if (isset $_POST['button_city'])
      {
        
      }
    //CITY END
    
    //AIR FORGE
    else if (isset $_POST['button_air'])
      {
      $aircost   = (int) $levelair * $levelair * 10 + $levelair * 100;
      $earthcost = (int) $aircost / 2;
      $stonecost = (int) $aircost / 4;
      $woodcost  = (int) $aircost / 8;
      if ($air >= $aircost AND $earth >= $earthcost AND $stone >= $stonecost AND $wood >= $woodcost)
        {
        $levelair += 1;
        $stone -= $stonecost;
        $wood -= $woodcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelair = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelair,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('UPDATE buildings SET stone = :stone, wood = :wood WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'stone'  => $stone;
          'wood'   => $wood;
          'userid' => $_SESSION['id'];
          ));
        }
      }
    //AIR FORGE END
    
    else if
      {
      //TODO : Redir to buildings page
      }
  
  //MAIN TODO : REPEAT FOR ALL BUILDINGS. Yay.
?>
