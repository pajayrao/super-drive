<?php
$handle=opendir("C:/");
while($f=readdir($handle))
  {
    // if($f!='.'||$f!='..')
  {
   echo $f."</br>";
  }
  }