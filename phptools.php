<?php
//This is a file to include in other pages to reuse frequent functions.

//The redir function to redirect to another page.
function redir($url)
{
  echo "<script language=\"javascript\">";
  echo "window.location='$url';";
  echo "</script>"; 
}

//The function to read all values for a given player id in the 'ressources' database.

?>
