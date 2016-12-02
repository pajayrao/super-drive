<?php

$dsn="mysql:host=127.0.0.1;dbname=fserver";
$username="root";
$password="VictoryHasDefeatedYou";
try 
{
$conn = new PDO( $dsn, $username, $password );
$conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} 
catch ( PDOException $e )
{
echo "Connection failed: " . $e-> getMessage();
}

$e=$conn->query("select artificial,original from fserver.maintable where catagory=5 and size>1000000000");
echo"List of deleted files are </br>";
$i=0;
foreach($e as $t)
{   $z=unlink("C:/Superdrive/Zipped/".$t["artificial"].'zip');
    
    
    
    
if($z==TRUE)
   
{
    echo '$t["artificial"]     $t["original"] </br>';
    $i++;
   $conn->query("delete from fserver.maintable where artificial='".$t["artificial"]."';");
}
}
 
echo $i;