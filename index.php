<?php

include("function.php");
if(isset($_POST["download"])&&$_POST["index"])
{  
    $artificial=$_POST["index"];
    
    download($artificial);
}
else if(isset($_POST["search"])&&isset($_POST["text"])&&$_POST['category'])
{   
$r=trim($_POST["text"]);
$r=charvalidator($r);
$e=$_POST['category'];
$q=implode("",explode('.',implode("",explode(" ",microtime()))));

if($r!=''&&($e>=1&&$e<=5))
{    
$searchinfo=firstsearch($r,0,0,'127.0.0.1','fserver','someone','zaqwsxcde123','127.0.0.1','fserver','someone','zaqwsxcde123',$q,$e);
displayer($searchinfo,1,-1,$r);
}
else
{
    displayer(NULL,0,0,NULL);
} 
}
/*
else if((isset($_POST["search"])&& isset($_POST["no"]))&&( isset($_POST["reverse"]) OR isset($_POST["forward"])))
{   $r=trim($_POST["search"]);
    $searchcount=searchcountburst($r);
    $no=abs($_POST["no"]);
    if($searchcount-($no)*10>0)
    {   
        if($_POST["reverse"]=="Back"&&$no<0   ||  !is_integer($no))
            {
   
                       $no=0;
   
             }
        $searchinfo=returninfoburst($r,$no);    
    } 
  $i=0;
  foreach($searchinfo as $e)
  {
      $i += 1;
  }
  if($i<10)  
      $backforward=-2;
   else
       $backforward=1;
       displayer($searchinfo,1,$back,$backforward,$r);        
             
   
}*/
    

 else
     {
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

$e=$conn->query("update fserver.request set main=main+1;");

  displayer(NULL,0,0,NULL);


}
