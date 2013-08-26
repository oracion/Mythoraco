<?php
//This is a file to store tools made using the GD library, for image a graphics manipulation.
//  /!\REQUIRES PHP GD LIBRARY/!\  \\
?>

<?php
include("phptools.php");
?>

<?php

function mergeTwoPNG($image1path, $image2path, $xdim, $ydim)
{
  //Both paths to the images, x and y dimensions of the image you're about to fuse.
  $final_img = imagecreate($xdim, $ydim);
  
  //Step 1 : create the objects from the PNGs
  $image_1 = imagecreatefrompng($image1path);
  $image_2 = imagecreatefrompng($image2path);
  
  //Step 2 : Merge the images into one.
  imagecopy($image_1, $final_img, 0, 0, 0, 0, $xdim, $ydim);
  imagecopy($image_2, $final_img, 0, 0, 0, 0, $xdim, $ydim);
  
  //Step 3 : Allow transparency.
  imagealphablending($final_img, true);
  imagesavealpha($final_img, true);
  
  //Step 4 : Return image.
  return $final_img;
}

function mergeTwoPNGAndOutputInBrowser($image1path, $image2path, $xdim, $ydim)
{
  //TEST FUNCTION
  //Both paths to the images, x and y dimensions of the image you're about to fuse.
  $final_img = imagecreate($xdim, $ydim);
  
  //Step 1 : create the objects from the PNGs
  $image_1 = imagecreatefrompng($image1path);
  $image_2 = imagecreatefrompng($image2path);
  
  //Step 2 : Merge the images into one.
  imagecopy($image_1, $final_img, 0, 0, 0, 0, $xdim, $ydim);
  imagecopy($image_2, $final_img, 0, 0, 0, 0, $xdim, $ydim);
  
  //Step 3 : Allow transparency.
  imagealphablending($final_img, true);
  imagesavealpha($final_img, true);
  
  //Step 4 : Output image to browser.
  header('Content-Type: image/png');
  imagepng($final_img);
}

function mergeTwoPNGAndOutputAsFile($image1path, $image2path, $xdim, $ydim)
{
  //TEST FUNCTION 
  //Both paths to the images, x and y dimensions of the image you're about to fuse.
  $final_img = imagecreate($xdim, $ydim);
  
  //Step 1 : create the objects from the PNGs
  $image_1 = imagecreatefrompng($image1path);
  $image_2 = imagecreatefrompng($image2path);
  
  //Step 2 : Merge the images into one.
  imagecopy($image_1, $final_img, 0, 0, 0, 0, $xdim, $ydim);
  imagecopy($image_2, $final_img, 0, 0, 0, 0, $xdim, $ydim);
  
  //Step 3 : Allow transparency.
  imagealphablending($final_img, true);
  imagesavealpha($final_img, true);
  
  //Step 4 : Output image to file.
  imagepng($final_img, 'Merged_PNGs');
}
