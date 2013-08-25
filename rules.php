<?php
include("phptools.php")
?>

<?php
session_start();

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
<link rel="stylesheet" href="stylesheet_rules.css" />
<title>Mythoraco progresse !</title>
</head>

<body>

<?php include("online_layout.php") ?>

<section id="rules_nav">
<a href="rules.php#ch1">Chapter 1<br/>
<a href="rules.php#ch2">Chapter 2<br/>
<a href="rules.php#ch3">Chapter 3<br/>
</section>

<section id="centre">
<h1>Rules</h1>

<article><span id="ch1"></span>
<h3><em>Chapter 1 : You will not hack </em></h3>
<p>You must not hack : a game is only fun if everybody plays fair !<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></p>
</article>

<article><span id="ch2"></span>
<h3><em>Chapter 2 : You will not rage </em></h3>
<p>When you lose, do not get mad at your opponent ! It's very annoying, pathetic and useless. And even if the opponent didn't play fair, was hacking, well, just report him !<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
But don't forget never to swear at or insult someone.</p>
</article>

<article><span id="ch3"></span>
<h3><em>Chapter 3 : You will not rage </em></h3>
<p>When you lose, do not get mad at your opponent ! It's very annoying, pathetic and useless. And even if the opponent didn't play fair, was hacking, well, just report him !<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
But don't forget never to swear at or insult someone.</p>
</article>

</section>

</body>


</html>
