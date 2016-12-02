<?php

$file="C:/Vyomadrive/ah.zip";



  
header("Pragma: public");
header("Content-Length:".filesize($file));
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0 public");
//header("Cache-Control: ");
header("Content-Description: File Transfer");
header("Content-type: application/zip");

header("Content-Disposition: attachment; filename=movie.zip");
header("Content-Transfer-Encoding: binary");

ob_clean();
ob_flush();
readfile($file);


ob_end_flush();
exit;