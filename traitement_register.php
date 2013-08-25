<?php
include("phptools.php")
?>

<?php
session_start();
if (!isset($_POST['pseudo']) || (!isset($_POST['password']))|| (!isset($_POST['password_retype']))|| (!isset($_POST['email'])))
{
redir("register.php");
}
if ($_POST['password'] != $_POST['password_retype'])
{
redir("register.php");
} 
else {
try 
{
$bdd = new PDO('mysql:host=localhost;dbname=mythoracodb', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$username = $_POST['pseudo'];
//Creates entry in "logins" table
$req = $bdd->prepare('INSERT INTO logins(username, password, email, subscriptiondate) VALUES (:username,:password,:email, :subscriptiondate)');
$req->execute(array(
 'username' => $username,
 'password' => $_POST['password'],
 'email' => $_POST['email'], 
 'subscriptiondate' => date("Y-m-d H:i:s")
 ));
//Read the id of the created user
$reqread = $bdd->prepare('SELECT userid FROM logins WHERE username = :username');
$reqread->execute(array(
 'username' => $username
 ));
while ($donnees = $reqread->fetch())
{
$userid = $donnees['userid'];
}
//Creates entry in "buildings" table
$req = $bdd->prepare('INSERT INTO buildings
(userid, levelfire, levelwater, levelair, levelearth, levelquarry, levelquartz, levelsawmill, leveliron, levelhouse, leveltemple, levelbath, levelmarket, levelarmory, levelcity, levelforum) 
VALUES (:userid, :one, :one, :one, :one, :one, :one, :one, :one, :one, :one, :one, :one, :one, :one, :one)');
$req->execute(array(
 'userid' => $userid,
 'one' => 1
 ));
//Creates entry in "ressources" table
$req = $bdd->prepare('INSERT INTO ressources
(userid, playerxp, playerlevel, fire, water, air, earth, stone, wood, iron, quartz, gold, happiness, favor)
VALUES (:userid, :zero, :one, :zero, :zero, :zero, :zero, :zero, :zero, :zero, :zero, :zero, :hundred, :zero)');
$req->execute(array(
 'userid' => $userid,
 'one' => 1,
 'zero' => 0,
 'hundred' => 100
 ));
 
 echo "Enregistrement termin�.";
 echo "Redirecting...";
 redir("index.php");
}
?>
