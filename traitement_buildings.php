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
if (isset $_POST['building_air'])
  {
  //THIS IS THE CODE TO RETRIEVE THE LEVEL FROM THE DATABASE
  try 
    {
    $bdd = new PDO('mysql:host=localhost;dbname=mythoracodb', 'root', '');
    }
  catch (Exception $e)
    {
    die('Erreur : ' . $e->getMessage());
    }
  //Read the id of the created user
  $reqread = $bdd->prepare('SELECT levelair FROM buildings WHERE userid = :userid');
  $reqread->execute(array( 'userid' => $_SESSION['userid']));
  while ($donnees = $reqread->fetch())
    {
    $level = $donnees['levelair'];
    }
  //END OF LEVEL RETRIEVAL CODE
  //TODO : Retrieve all the ressources from the player 
  if ()//TODO : Check if ressources are sufficent
  {
    //TODO : Level up building, remove ressources and write to database new values.
  }
else
  {
    //TODO : Redir to buildings page
  }
  
  //MAIN TODO : REPEAT FOR ALL BUILDINGS. Yay.
?>
