<?php
//This is a file to store tools made using the GD library, for image a graphics manipulation.
//  /!\REQUIRES PHP GD LIBRARY/!\  \\
?>
<?php
include("phptools.php");
?>
<?php
function mergeTwoPNGAndReturn($image1path, $image2path, $xdim, $ydim)
{
  //Both paths to the images, x and y dimensions of the image you're about to fuse.
  $final_img = imagecreate($xdim, $ydim);
  
  //Step 1 : Create the objects from the PNGs
  $image_1 = imagecreatefrompng($image1path);
  $image_2 = imagecreatefrompng($image2path);
  
  //Step 1.2 : Allow transparency of bases.
  imagealphablending($image_1, true);
  imagesavealpha($image_1, true);
  imagealphablending($image_2, true);
  imagesavealpha($image_2, true);
  
  //Step 2 : Merge the images into one.
  imagecopy($image_1, $image_2, 0, 0, 0, 0, $xdim, $ydim);
  imagecopy($final_img, $image_1, 0, 0, 0, 0, $xdim, $ydim);
  
  //Step 3 : Allow transparency of final image.
  imagealphablending($final_img, true);
  imagesavealpha($final_img, true);
  
  //Step 4 : Return image.
  return $image_1;
}

function mergeTwoPNGAndOutputInBrowser($image1path, $image2path, $xdim, $ydim)
{
  //TEST FUNCTION
  //Both paths to the images, x and y dimensions of the image you're about to fuse.
  $final_img = imagecreate($xdim, $ydim);
  
  //Step 1 : Create the objects from the PNGs
  $image_1 = imagecreatefrompng($image1path);
  $image_2 = imagecreatefrompng($image2path);
  
  //Step 1.2 : Allow transparency of bases.
  imagealphablending($image_1, true);
  imagesavealpha($image_1, true);
  imagealphablending($image_2, true);
  imagesavealpha($image_2, true);
  
  //Step 2 : Merge the images into one.
  imagecopy($image_1, $image_2, 0, 0, 0, 0, $xdim, $ydim);
  imagecopy($final_img, $image_1, 0, 0, 0, 0, $xdim, $ydim);
  
  //Step 3 : Allow transparency of final image.
  imagealphablending($final_img, true);
  imagesavealpha($final_img, true);
  
  //Step 4 : Output image to browser.
  //header('Content-Type: image/png;');
  //imagepng($image_1);
  outputPNGImage($image_1);
  }

function mergeTwoPNGAndOutputAsFile($image1path, $image2path, $xdim, $ydim)
{
  //TEST FUNCTION 
  //Both paths to the images, x and y dimensions of the image you're about to fuse.
  $final_img = imagecreate($xdim, $ydim);
  
  //Step 1 : Create the objects from the PNGs
  $image_1 = imagecreatefrompng($image1path);
  $image_2 = imagecreatefrompng($image2path);
  
  //Step 1.2 : Allow transparency of bases.
  imagealphablending($image_1, true);
  imagesavealpha($image_1, true);
  imagealphablending($image_2, true);
  imagesavealpha($image_2, true);
  
  //Step 2 : Merge the images into one.
  imagecopy($image_1, $image_2, 0, 0, 0, 0, $xdim, $ydim);
  imagecopy($final_img, $image_1, 0, 0, 0, 0, $xdim, $ydim);
  
  //Step 3 : Allow transparency of final image.
  imagealphablending($final_img, true);
  imagesavealpha($final_img, true);
  
  //Step 4 : Output image to file.
  imagepng($image_1, 'Merged_PNGs.png');
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

function outputPNGImage($image)
{
  ob_start(); 
  imagepng($image);
  $image_data = ob_get_contents (); 
  ob_end_clean (); 

  $image_data_base64 = base64_encode($image_data);
  echo '<img src="data:image/png;base64,' . $image_data_base64 . '" />';
}
?>