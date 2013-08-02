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
      $goldcost      = (int) pow($levelcity, 2) * 3;
      
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
        $reqwrite = $bdd->prepare('UPDATE ressources
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
        $reqwrite = $bdd->prepare('UPDATE ressources SET stone = :stone, wood = :wood WHERE userid = :userid');
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
        $reqwrite = $bdd->prepare('UPDATE ressources SET stone = :stone, wood = :wood WHERE userid = :userid');
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
        $reqwrite = $bdd->prepare('UPDATE ressources SET iron = :iron, quartz = :quartz WHERE userid = :userid');
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
    else if (isset $_POST['button_water'])
      {
      $watercost   = (int) $levelwater * $levelwater * 8 + $levelwater * 100;
      $firecost    = (int) $watercost / 2;
      $quartzcost  = (int) $watercost  / 4;
      $ironcost    = (int) $watercost  / 8;
      if ($fire >= $firecost AND $water >= $watercost AND $iron >= $ironcost AND $quartz >= $quartzcost)
        {
        $levelwater += 1;
        $iron -= $ironcost;
        $quartz -= $quartzcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelwater = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelwater,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('UPDATE ressources SET iron = :iron, quartz = :quartz WHERE userid = :userid');
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
    //WATER FORGE END
    
    //QUARRY
    else if (isset $_POST['button_stone'])
      {
      $ironcost    = (int) ($levelquarry * $levelquarry * 10 + $levelquarry * 100) * 1.8;
      $stonecost   = (int) $ironcost / 2;
      $woodcost    = (int) $ironcost / 4;
      $quartzcost  = (int) $ironcost / 8;
      if ($iron >= $ironcost AND $stone >= $stonecost AND $wood >= $woodcost AND $quartz >= $quartzcost)
        {
        $levelquarry += 1;
        $wood   -= $woodcost;
        $stone  -= $stonecost;
        $iron   -= $ironcost;
        $quartz -= $quartzcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelquarry = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelquarry,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('
        UPDATE ressources
        SET wood = :wood, stone = :stone, iron = :iron, quartz = :quartz 
        WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'wood'   => $wood,
          'stone'  => $stone,
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
    //QUARRY END
    
    //SAWMILL
    else if (isset $_POST['button_wood'])
      {
      $stonecost   = (int) ($levelsawmill * $levelsawmill * 10 + $levelsawmill * 100) * 1.8;
      $ironcost    = (int) $stonecost / 4;
      $woodcost    = (int) $stonecost / 2;
      $quartzcost  = (int) $stonecost / 8;
      if ($iron >= $ironcost AND $stone >= $stonecost AND $wood >= $woodcost AND $quartz >= $quartzcost)
        {
        $levelsawmill += 1;
        $wood   -= $woodcost;
        $stone  -= $stonecost;
        $iron   -= $ironcost;
        $quartz -= $quartzcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelsawmill = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelsawmill,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('
        UPDATE ressources
        SET wood = :wood, stone = :stone, iron = :iron, quartz = :quartz 
        WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'wood'   => $wood,
          'stone'  => $stone,
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
    //SAWMILL END
    
    //IRON MINE
    else if (isset $_POST['button_iron'])
      {
      $quartzcost  = (int) ($leveliron * $leveliron * 10 + $leveliron * 100) * 1.8;
      $ironcost    = (int) $quartzcost / 2;
      $stonecost   = (int) $quartzcost / 8;
      $woodcost    = (int) $quartzcost / 4;
      if ($iron >= $ironcost AND $stone >= $stonecost AND $wood >= $woodcost AND $quartz >= $quartzcost)
        {
        $leveliron += 1;
        $wood   -= $woodcost;
        $stone  -= $stonecost;
        $iron   -= $ironcost;
        $quartz -= $quartzcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET leveliron = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $leveliron,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('
        UPDATE ressources
        SET wood = :wood, stone = :stone, iron = :iron, quartz = :quartz 
        WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'wood'   => $wood,
          'stone'  => $stone,
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
    //IRON MINE END
    
    //QUARTZ MINE
    else if (isset $_POST['button_quartz'])
      {
      $woodcost    = (int) ($levelquartz * $levelquartz * 10 + $levelquartz * 100) * 1.8;
      $quartzcost  = (int) $woodcost / 2;
      $ironcost    = (int) $woodcost / 8;
      $stonecost   = (int) $woodcost / 4;
      if ($iron >= $ironcost AND $stone >= $stonecost AND $wood >= $woodcost AND $quartz >= $quartzcost)
        {
        $levelquartz += 1;
        $wood   -= $woodcost;
        $stone  -= $stonecost;
        $iron   -= $ironcost;
        $quartz -= $quartzcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelquartz = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelquartz,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('
        UPDATE ressources 
        SET wood = :wood, stone = :stone, iron = :iron, quartz = :quartz 
        WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'wood'   => $wood,
          'stone'  => $stone,
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
    //QUARTZ MINE END
    
    //HOUSES
    else if (isset $_POST['button_houses'])
      {
      $woodcost    = (int) ($levelhouse * $levelhouse * 5 + $levelhouse * 80) * 1.5;
      $stonecost   = (int) $woodcost;
      $earthcost   = (int) $woodcost / 4;
      if ($earth >= $earthcost AND $stone >= $stonecost AND $wood >= $woodcost)
        {
        $levelhouse += 1;
        $wood   -= $woodcost;
        $stone  -= $stonecost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelhouse = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelhouse,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('
        UPDATE ressources 
        SET wood = :wood, stone = :stone 
        WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'wood'   => $wood,
          'stone'  => $stone,
          'userid' => $_SESSION['id']
          ));
        }
      else
        {
          redir("home_page.php");
        }
      }
    //HOUSES END
    
    //TEMPLE
    else if (isset $_POST['button_temple'])
      {
      $stonecost    = (int) ($leveltemple * $leveltemple * 5 + $leveltemple * 80) * 1.5;
      $quartzcost   = (int) $stonecost;
      $aircost      = (int) $stonecost / 4;
      if ($air >= $aircost AND $stone >= $stonecost AND $quartz >= $quartzcost)
        {
        $leveltemple += 1;
        $stone   -= $stonecost;
        $quartz  -= $quartzcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET leveltemple = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $leveltemple,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('
        UPDATE ressources 
        SET quartz = :quartz, stone = :stone 
        WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'quartz'  => $quartz,
          'stone'   => $stone,
          'userid'  => $_SESSION['id']
          ));
        }
      else
        {
          redir("home_page.php");
        }
      }
    //TEMPLE END
    
    //ARMORY
    else if (isset $_POST['button_armory'])
      {
      $ironcost    = (int) ($levelarmory * $levelarmory * 5 + $levelarmory * 80) * 1.5;
      $quartzcost  = (int) $ironcost;
      $firecost    = (int) $ironcost / 4;
      if ($fire >= $firecost AND $iron >= $ironcost AND $quartz >= $quartzcost)
        {
        $levelarmory += 1;
        $iron    -= $ironcost;
        $quartz  -= $quartzcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelarmory = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelarmory,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('
        UPDATE ressources 
        SET quartz = :quartz, iron = :iron
        WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'quartz'  => $quartz,
          'iron'    => $iron,
          'userid'  => $_SESSION['id']
          ));
        }
      else
        {
          redir("home_page.php");
        }
      }
    //ARMORY END
    
    //BATHS
    else if (isset $_POST['button_baths'])
      {
      $stonecost  = (int) ($levelbath * $levelbath * 5 + $levelbath * 80) * 1.5;
      $woodcost   = (int) $stonecost;
      $watercost  = (int) $stonecost / 4;
      if ($water >= $watercost AND $stone >= $stonecost AND $wood >= $woodcost)
        {
        $levelbath += 1;
        $stone -= $stonecost;
        $wood  -= $woodcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelbath = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelbath,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('
        UPDATE ressources 
        SET stone = :stone, wood = :wood
        WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'stone'   => $stone,
          'wood'    => $wood,
          'userid'  => $_SESSION['id']
          ));
        }
      else
        {
          redir("home_page.php");
        }
      }
    //BATHS END
    
    //MARKET
    else if (isset $_POST['button_market'])
      {
      $ressourcecost    = (int) ($levelquartz * $levelquartz * 8 + $levelquartz * 90) * 1.7;
      if ($iron >= $ressourcecost AND $stone >= $ressourcecost AND $wood >= $ressourcecost AND $quartz >= $ressourcecost)
        {
        $levelmarket += 1;
        $wood   -= $woodcost;
        $stone  -= $stonecost;
        $iron   -= $ironcost;
        $quartz -= $quartzcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelmarket = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelmarket,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('
        UPDATE ressources 
        SET wood = :wood, stone = :stone, iron = :iron, quartz = :quartz 
        WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'wood'   => $wood,
          'stone'  => $stone,
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
    //MARKET END
    
    //FORUM
    else if (isset $_POST['button_forum'])
      {
      $ressourcecost    = (int) ($levelquartz * $levelquartz * 12 + $levelquartz * 150) * 2;
      if ($iron >= $ressourcecost AND $stone >= $ressourcecost AND $wood >= $ressourcecost AND $quartz >= $ressourcecost)
        {
        $levelforum += 1;
        $wood   -= $woodcost;
        $stone  -= $stonecost;
        $iron   -= $ironcost;
        $quartz -= $quartzcost;
        
        $reqwrite = $bdd->prepare('UPDATE buildings SET levelforum = :level WHERE userid = :userid');
        $reqwrite -> execute(array
          ( 
          'level'  => $levelforum,
          'userid' => $_SESSION['id']
          ));
        $reqwrite = $bdd->prepare('
        UPDATE ressources 
        SET wood = :wood, stone = :stone, iron = :iron, quartz = :quartz 
        WHERE userid = :userid');
        $reqwrite -> execute(array
          (
          'wood'   => $wood,
          'stone'  => $stone,
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
    //FORUM END
    //END BUILDING LEVEL UP
    }
    else
      {
      redir("home_page.php");
      }
?>
