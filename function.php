
<?php
function download($artificial)
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

$e=$conn->query("select artificial from fserver.maintable where artificial=$artificial");
$i=0;
foreach($e as $q)
{
    if(isset($q['artificial']))
    {
        $i++;
        
    }
}
if($i===1)
{
$conn->query("update fserver.maintable set download=download+1 where artificial='$artificial';");  
$file="C:/Superdrive/Zipped/".$artificial.'.zip';

header("Pragma: public");
header("Content-Length:".filesize($file));
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0 public");
//header("Cache-Control: ");
header("Content-Description: File Transfer");
header("Content-type: application/zip");
//$artificial=implode("",explode(" ",$artificial));
header("Content-Disposition: attachment; filename=$artificial.zip");
header("Content-Transfer-Encoding: binary");
ob_clean();
ob_flush();
readfile($file);
ob_end_flush();
exit;

}
else
{
    exit;
}
    
  
}

function searchtable($value,$limit1,$limit2,$type)
{
   
$dsn="mysql:host=localhost;dbname=data";
$username="root";
$password="123456";
try 
{
$conn = new PDO( $dsn, $username, $password );
$conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} 
catch ( PDOException $e )
{
echo "Connection failed: " . $e-> getMessage();
}
if($type==1)
{
$sql="select * from info where original like '".$value."%';";
}
else if($type==2)
{
$sql="select * from info where original like '%".$value."%';";  
}



        
    
try {
$rows = $conn->query( $sql );

}
 catch ( PDOException $e ) {
echo "Query failed: ". $e->getMessage();

}
return $rows;
}


//NOt used for now
/*
function countsearch($value,$type)
{
$dsn="mysql:host=localhost;dbname=data";
$username="root";
$password="123456";
try 
{
$conn = new PDO( $dsn, $username, $password );
$conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} 
catch ( PDOException $e )
{
echo "Connection failed: " . $e-> getMessage();
}

if($type==1)
{
$sql="select SQL_CALC_FOUND_ROWS from  where original like '".$value."%';";
}
else if($type==2)
{
$sql="select SQL_CALC_FOUND_ROWS from  where original like '%".$value."%';";
}



try {
$rows = $conn->query( $sql );

}
 catch ( PDOException $e ) {
echo "Query failed: ". $e->getMessage();
 }
 
return $rows;

}
*/
/*
function searchcountburst($value)
{ 
  $burst=explode(" ",$value);
  $dsn="mysql:host=localhost;dbname=data";
  $username="root";
  $password="123456";
  try 
    {
      $conn = new PDO( $dsn, $username, $password );
      $conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } 
  catch ( PDOException $e )
   {
        "Connection failed: " . $e-> getMessage();
  }

  
  $sql='select SQL_CALC_FOUND_ROWS * from info where original like \'%'.$value.'%\';';
  
 
  
          try {
              $info= $conn->query($sql);
          
          }
 catch ( PDOException $e ) 
          {
             echo "Query failed: ". $e->getMessage();
             }
   print_r($info);        
  if(isset($count)) 
  return $count;
  else return 0;

}
*/
 
function returninfoburst($value,$limit)
{ 
     
  $burst=explode(" ",$value);
  $dsn="mysql:host=localhost;dbname=data";
  $username="root";
  $password="123456";
  try 
    {
      $conn = new PDO( $dsn, $username, $password );
      $conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } 
   
  catch ( PDOException $e )
   {
        "Connection failed: " . $e-> getMessage();
        
  }
 /* foreach($burst as $smallsearch)
  {   if($smallsearch!=" ") 
      {
  
      $sql="select SQL_CALC_FOUND_ROWS from  where original like '".$smallsearch."%';";
      try {
              $count += $conn->query( $sql );
          }
    */
  
  $sql='select artificial,original from info  where original like \'%'.$value.'%\';';
  
  
 
  
  
          try {
              $info = $conn->query( $sql );
               
          }
 catch ( PDOException $e ) 
          {
             echo "Query failed: ". $e->getMessage();
             }
             
   
  return $info;
}


//****************************************************************************************************************************

function displayer($field,$below_number=0,$backforward,$search)
{
    ?>
      <html><head>
              <title>
                  Superdrive
              </title>
    <link rel="stylesheet" type="text/css" href="style.css.txt">
    </head>
    <body><table><tr><td>
        <form action="upload.php"  methord="get">
            <input type="submit" value="Upload A File" id="uploadphp"> 
        </form>
                </td><td>           
        <form action="downloadwinrar.php"  methord="get">
            <input type="submit" value="Get Winrar Here" id="downloadwinrar"> 
        </form>
                </td></tr></table>
       <img src="asdf.png" id="mainimage">   
    <form action="index.php" method="post">
        <table><tr>
                <td>
        <INPUT type="Text" Size = 100  Name = "text" Maxlength="15" id="textarea"/>
                </td><td>
<select name="category" id="dropdown">
<option value="1" class="dropdown1">Mechanical</option>
<option value="2" class="dropdown1">Electronics</option>
<option value="3" class="dropdown1">Computer Science</option>
<option value="4" class="dropdown1">Chemical</option>
<option value="5" class="dropdown1">Others</option>
</select>  
      </td>
      <td>
        <input type="submit"  name="search" value="Search" id="search" />
        </td></tr>
        </table>
    </form>  
       
    <?php
    if($field!==NULL)
        {
    
           foreach($field as $row)
                {
                      echo' <tr><td>';
                      echo'<form action="index.php" method="post">';
                      echo '<input type="hidden" name="index" value="'.$row["artificial"].'"/>';
                      echo' <input type="submit" name="download" value="'.$row["original"].'"/>';
                      echo '</form>';
                      echo'</td></tr>';
                      
                      echo '</table>';
                }
        }
        
       
    
    if($below_number!==0)
    {
    echo'<form action="index.php" methord="post">';
    echo '<input type="hidden" name="search2" value="'.$search .'"/>';
    echo '<input type="hidden" name="no" value="'.$below_number .'"/>';
    if(!$backforward==-1)
    {  
    echo'<input type="submit" name="reverse" value="'."Back" .'"/>';
    }
    else if(!$backforward==-2)
    {
    echo'<input type="submit" name="forward" value="'."More" .'"/></from>';
    }
    }      
    
    
}




//*******************************************************************************************************************

function charvalidator($value)
{
    $notneeded=array('!','@','#','$','%','%','^','&','*','(',')','-','+','=','{','}','[',']',';',':','"','\'','\\','|',',','.','?','*','`','~');
    foreach($notneeded as $check)
    {
        $value=implode("",explode($check,$value));
    }
    
    $value=implode(" ",explode('_',$value));
    
   
    
    return trim($value);
    
}


//****************************************************************************************************************************


function firstsearch($value,$limit1,$limit2,$datahost,$dataname,$datauser,$datapassword,$searchhost,$searchdname,$searchuser,$searchpassword,$searchtime,$section)
{   $burst=explode(" ",$value);
  $dsn="mysql:host=$searchhost;dbname=$searchdname";
  $username="$searchuser";
  $password="$searchpassword";
  try 
    {
      $conn = new PDO( $dsn, $username, $password );
      $conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } 
   
  catch ( PDOException $e )
   {
        "Connection failed: " . $e-> getMessage();
        
  }
   
  $search=$conn->query("select count(*) as \"total\" from fserver.maintable where catagory=$section and original like '$value%';");
  foreach($search as $e)
        $search1=$e['total'];
  unset($e);
  $search=$conn->query("select count(*) as \"total\" from fserver.maintable where catagory=$section and original like '%$value%' and original not like '$value%';");
   foreach($search as $e)
        $search2=$e['total'];
    $search3=0;
    if(count($burst)!=1)
    {  
        foreach($burst as $d)
       {
        $search=$conn->query("select count(*) as \"total\" from fserver.maintable where catagory=$section and original like '%$d%' and original not like '%$value%';");
    
        foreach($search as $e)
             $search3+=$e['total'];
             unset($e); 
       }
       unset ($d);
       
    }
      
   $conn->query("insert into fserver.searchtable values('$value','$searchtime','$section','$search1','$search2','$search3');");
   
   
   if($limit1===$limit2)
   {
     $dsn="mysql:host=$datahost;dbname=$dataname";
     $username="$datauser";
     $password="$datapassword";
  try 
    {
      $conn = new PDO( $dsn, $username, $password );
      $conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } 
   
  catch ( PDOException $e )
     {
        "Connection failed: " . $e-> getMessage();
        
      }  
      $finaldata=array();
      $data1=$conn->query("select artificial,original from fserver.maintable where catagory=$section and original like '$value%'order by download desc;");
      $data2=$conn->query("select artificial,original from fserver.maintable where catagory=$section and original like '%$value%' and original not like '$value%'order by download desc;");
      if($data1!=NULL)
      {
          foreach($data1 as $e)
          $finaldata[]=$e;    
      
      }
      unset($e);
       if($data2!=NULL)
      {
          foreach($data2 as $e)
          $finaldata[]=$e;    
      
      }
      unset($e);
      if(count($burst)!=1)
        {  
        foreach($burst as $d)
           {
               $data3=$conn->query("select artificial,original from fserver.maintable where catagory=$section and original like '%$d%' and original not like '%$value%' order by download desc;");
                if($data3!=NULL)
                {
                 foreach($data3 as $e)
                 $finaldata[]=$e;
                }
             unset($e); 
       }
       unset ($d);
       
    } 
      echo '<table>';
    
   return  $finaldata;  
       
}

}

?>