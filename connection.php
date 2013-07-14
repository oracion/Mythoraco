<section id="connection">
<h4>Connexion</h4>
<form method="post" action="traitement.php">
<p><input type="text"name="pseudo" id="pseudo" placeholder="Username" size="12" required /></p>
<p><input type="password" name="password" id="password" placeholder="Password" size="16" required /></p>
<p><input type="submit" value="Login" id="button" /></p>
<p><a href="register.php"> Sign up</a><br/>
<a href="recovery.php">Forgot your password?</a><br/>

<?php
if (isset($_SESSION['logged_in']))
{
	if ($_SESSION['logged_in']==false)
	{	
		echo 'Bad Login/Password :('; 
	}
}
?>
</p></form></section> 