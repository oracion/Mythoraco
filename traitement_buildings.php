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
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] = false)
{
redir("index.php");
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
    $gold = $donnees['gold'];
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
      $ressourcecost = (int) ($levelcity * $levelcity * 10 + $levelcity * 100) * 1.8;
      $goldcost      = (int) $ressourcecost / 2;
      
      if ($wood >= $ressourcecost AND $iron >= $ressourcecost AND $stone >= $ressourcecost AND $quartz >= $ressourcecost AND $gold >= $goldcost)
        {
        $levelcity += 1;
        $stone  -= $ressourcecost;
        $wood   -= $ressourcecost;
        $iron   -= $ressourcecost;
        $quartz -= $ressourcecost;
        $gold   -= $goldcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelcity = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelcity,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('UPDATE buildings 
                                   SET stone = :stone, wood = :wood, iron = :iron, quartz = :quartz, gold = :gold 
                                   WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'stone'  => $stone,
          'wood'   => $wood,
          'iron'   => $iron,
          'quartz' => $quartz,
          'gold'   => $gold,
          'userid' => $_SESSION['id']
          ));
        }
      else
        {
          redir("home_page.php");
        }
      }
    //CITY END
    
    //AIR FORGE
    else if (isset $_POST['button_air'])
      {
      $aircost   = (int) $levelair * $levelair * 8 + $levelair * 100;
      $earthcost = (int) $aircost / 2;
      $woodcost  = (int) $aircost / 4;
      $stonecost = (int) $aircost / 8;
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
          'stone'  => $stone,
          'wood'   => $wood,
          'userid' => $_SESSION['id']
          ));
        }
      else
        {
          redir("home_page.php");
        }
      }
    //AIR FORGE END
    
    //EARTH FORGE
    else if (isset $_POST['button_earth'])
      {
      $earthcost = (int) $levelearth * $levelearth * 8 + $levelearth * 100;
      $aircost   = (int) $earthcost / 2;
      $stonecost = (int) $earthcost / 4;
      $woodcost  = (int) $earthcost / 8;
      if ($earth >= $earthcost AND $air >= $aircost AND $stone >= $stonecost AND $wood >= $woodcost)
        {
        $levelearth += 1;
        $stone -= $stonecost;
        $wood -= $woodcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelearth = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelearth,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('UPDATE buildings SET stone = :stone, wood = :wood WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'stone'  => $stone,
          'wood'   => $wood,
          'userid' => $_SESSION['id']
          ));
        }
      else
        {
          redir("home_page.php");
        }
      }
    //EARTH FORGE END
    
    //FIRE FORGE
    else if (isset $_POST['button_fire'])
      {
      $firecost    = (int) $levelfire * $levelfire * 8 + $levelfire * 100;
      $watercost   = (int) $firecost / 2;
      $ironcost    = (int) $firecost / 4;
      $quartzcost  = (int) $firecost / 8;
      if ($fire >= $firecost AND $water >= $watercost AND $iron >= $ironcost AND $quartz >= $quartzcost)
        {
        $levelfire += 1;
        $iron -= $ironcost;
        $quartz -= $quartzcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelfire = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelfire,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('UPDATE buildings SET iron = :iron, quartz = :quartz WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'iron'   => $iron,
          'quartz' => $quartz,
          'userid' => $_SESSION['id']
          ));
        }
      else
        {
          redir("home_page.php");
        }
      }
    //FIRE FORGE END
    
    //WATER FORGE
    //WATER FORGE END
    
    //QUARRY
    //QUARRY END
    
    //SAWMILL
    //SAWMILL END
    
    //IRON MINE
    //IRON MINE END
    
    //QUARTZ MINE
    //QUARTZ MINE END
    
    //HOUSES
    //HOUSES END
    
    //TEMPLE
    //TEMPLE END
    
    //BATHS
    //BATHS END
    
    //MARKET
    //MARKET END
    
    //FORUM
    //FORUM END
    
    }
    else
      {
      redir("home_page.php");
      }
  
  /* ==================MAIN TODO : REPEAT FOR ALL BUILDINGS. Yay.======================*/
?>
