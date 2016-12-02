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
        "Connection failed: " . $e-> getMessage();
        
  }
  
  $w=$conn->query("select count(*) as 'artificial'  from fserver.maintable  ;");
  foreach($w as $r)
      echo $r['artificial'];