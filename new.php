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
  $i=0;
  $handle=opendir("C:/Superdrive/Book");
  while($f=readdir($handle))
  {
      if(!($f==='.'||$f==='..'))
  {
    $za = new ZipArchive();
    $time= microtime();
    $time=implode("",explode('.',implode("",explode(" ",$time))));
    $za->open("C:/Superdrive/Zipped/".$time.".zip",ZipArchive::CREATE);
    $za->addFile("C:/Superdrive/book/$f","/superdrive/$f");
    $za->close();
    $f=implode("",explode("'",implode("",explode('"',$f))));
    $y=filesize("C:/Superdrive/Zipped/".$time.".zip");
    
    
    $sql="insert into fserver.maintable values('$time','$f',$y,3,0);";
    echo $sql."           $i".'</br>';
    $i++;
    $conn->query($sql);
    flush();
    ob_flush();
  }
  }
  
    
    
  
    
    
  
