<?php
 $dsn="mysql:host=127.0.0.1;dbname=fserver";
$username="someone";
$password="zaqwsxcde123";
try 
{
$conn = new PDO( $dsn, $username, $password );
$conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} 
catch ( PDOException $e )
{
echo "Connection failed: " . $e-> getMessage();
}

$e=$conn->query("update fserver.request set winrar=winrar+1;");

$file="C:/Vyomadrive/Zipped/winrar.exe";
header("Pragma: public");
header("Content-Length:".filesize($file));
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0 public");
//header("Cache-Control: ");
header("Content-Description: File Transfer");
header("Content-type: application/exe");

header("Content-Disposition: attachment; filename=Winrar.exe");
ob_clean();
ob_flush();
readfile($file);
ob_end_flush();
exit;
    ?>