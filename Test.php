<?php
include 'phpGDtools.php';
$image1path = 'monstercard.png';
$image2path = 'monsterimage.png';
$xdim = 220;
$ydim = 301;
//$image = mergeTwoPNGAndReturn($image1path, $image2path, $xdim, $ydim);
mergeTwoPNGAndOutputInBrowser($image1path, $image2path, $xdim, $ydim);
echo('Hello !');
?>