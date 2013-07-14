<?php
session_start();

// la fonction de redirection ------------ 
function redir($url){ 
echo "<script language=\"javascript\">"; 
echo "window.location='$url';"; 
echo "</script>"; 
} 

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] = false)
{
redir("index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<?php include("javascript.php") ?>
<link rel="stylesheet" href="stylesheet.css" />
<title>Mythoraco progresse !</title>
</head>






<body>


<?php include("online_layout.php") ?>

<section id="centre">
<article>
<p>Voici la liste des villes que vous pouvez visiter ou rejoindre. Choisissez bien, car cela changera complètement votre manière de jouer !<br/></p>
</article>

<aside>
<table class="guild_table">
	<tr>
		<th>Ville</th>
		<th>Empereur</th>
		<th>Résidents</th>
	</tr>
	<tr>
		<td class="title"><a href="/clan/1">Athènes</a></td>
		<td>Ninichat</td>
		<td>1000</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/2">Thessaloniki</a></td>
		<td>Oracion</td>
		<td>1000</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/3">Sparte</a></td>
		<td>Leonidas</td>
		<td>300</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	
	<tr>
		<td class="title"><a href="/clan/4">Patras</a></td>
		<td>Pirée</td>
		<td>800</td>
	</tr>
	</table>
</aside>
<p>Alors, qui allez-vous rejoindre ?<br/><br/><br/><br/><br/><br/><br/><br/><br/><br /><br/><br /><br/><br /><br/><br /><br/><br /><br/><br /><br/></p>
</table>

<br/><br/><br/><br/><br/><br/>

</div>
</section>


</body>


</html>