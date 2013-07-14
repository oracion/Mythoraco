<?php
session_start();
if (!isset($_POST['pseudo']) || (!isset($_POST['password'])))
{
redir("index.php");
}
?>

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
//Si la connection à la database est réussie, on ouvre la table loginsdb//
$req = $bdd->prepare('SELECT * FROM logins WHERE username = ?');
$req->execute(array($_POST['pseudo']));
//Ensuite, on récupère les données unes à unes//
while ($donnees = $req->fetch())
{
	if (isset($_POST['pseudo']) && (isset($_POST['password'])))
	{
		$_SESSION['pseudo'] = $_POST['pseudo'];
		$_SESSION['password'] = $_POST['password'];
		
		if ($_SESSION['pseudo'] == $donnees['username'] && $_SESSION['password'] == $donnees['password'] 
		 || $_SESSION['pseudo'] == $donnees['email']    && $_SESSION['password'] == $donnees['password'])  //L'utilisateur peut se logger avec l'username ou l'email.
		 {
		 	$_SESSION['logged_in'] = true;
			$_SESSION['id'] = $donnees['userid'];
			redir("home_page.php"); 
		 }
		 else
		{	
			$_SESSION['logged_in'] = false;
			redir("index.php"); 
		}
	}
	else
	{
		$_SESSION['logged_in'] != true;
		redir("index.php"); 
	}
}
//Tant qu'on a des lignes, on essaie login/mdp et email/mdp. Si faux, on continue. Si vrai, on change de page.
if ($_SESSION['logged_in'] != true)
{
	redir("index.php"); 
}
//Si faux, on redir vers la page de base, et on affiche "Bad Login".//
$req->closeCursor();
//On ferme la connexion//
?>