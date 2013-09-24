<?php
include("phptools.php")
?>

<?php
$bdd = getMythoracoDb();

$speciesName = $_POST['speciesName'];
$rarity = $_POST['rarity'];
$evolutionRank = $_POST['evolutionRank'];
$element = $_POST['element'];
$attack = $_POST['attack'];
$defense = $_POST['defense'];
$abilityName = $_POST['abilityName'];
$abilityStrength = $_POST['abilityStrength'];
$cardType = $_POST['cardType'];
$initiative = $_POST['initiative'];
$moveSpeed = $_POST['moveSpeed'];
$minRange = $_POST['minRange'];
$maxRange = $_POST['maxRange'];
$humanoid = $_POST['humanoid'];
$beast = $_POST['beast'];
$creature = $_POST['creature'];
$fusion = $_POST['fusion'];
$aviary = $_POST['aviary'];
$mechanical = $_POST['mechanical'];
$giant = $_POST['giant'];
$tiny = $_POST['tiny'];
$etheral = $_POST['etheral'];
$godly = $_POST['godly'];
$female = $_POST['female'];
$male = $_POST['male'];

insertLineIntoCardsDb($bdd, $speciesName, $rarity, $evolutionRank, $element, $attack, $defense, $abilityName, $abilityStrength, $cardType, $initiative, $moveSpeed, $minRange, $maxRange, $humanoid, $beast, $creature, $fusion, $aviary, $mechanical, $giant, $tiny, $etheral, $godly, $female, $male);
?>