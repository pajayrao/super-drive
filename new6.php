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

$conn->query("delete from fserver.maintable where artificial like '%a';");
