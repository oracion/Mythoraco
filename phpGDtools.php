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

function addTextToImage($final_image, $x, $y, $text)
{
  // Allocate A Color And Font For The Text
  $white = imagecolorallocate($final_image, 255, 255, 255);
  $font_path = 'font.TTF';
  
  // Print Text On Image
  // Args : Image, font size, angle (degrees), x-coord of bottom-left corner, y-coord of bottom-left corner, color, font, text.
  imagettftext($final_image, 25, 0, $x, $y, $white, $font_path, $text);

  // Return image
  return $final_image;
}

function addTextToPNGFromPathAndPrint($imagepath, $x, $y, $text)
{
  //TEST FUNCTION
  // Create Image From Existing File
  $final_image = imagecreatefrompng($imagepath);

  // Allocate A Color And Font For The Text
  $white = imagecolorallocate($final_image, 255, 255, 255);
  $font_path = 'font.TTF';
  
  // Print Text On Image
  // Args : Image, font size, angle (degrees), x-coord of bottom-left corner, y-coord of bottom-left corner, color, font, text.
  imagettftext($final_image, 25, 0, $x, $y, $white, $font_path, $text);

  // Send Image to Browser
  header('Content-type: image/jpeg');
  imagepng($final_image);
}

?>
