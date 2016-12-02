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

$e=$conn->query("update fserver.request set upload=upload+1;");

$message=NULL; 
include('function.php');
if(isset($_POST["submit"])&&isset($_FILES["data"])&&($_FILES['data']['error']==0)&&isset($_POST["infoabtit"]))
{    //print_r($_FILES["data"]);
   
$i=0;
  $folder=charvalidator($_POST['infoabtit']);
 if(!($folder ===''))
 {   
if(isset($_POST['category']))
  {
    $r=$_POST['category'];
    if(count($r)!==1)
        $i++;
    else if(!($r>0&&$r<=5))
        $i++;
    
  if($i===0)
  {
      
 
 $folder=charvalidator($_POST["infoabtit"]);
 $za = new ZipArchive();
 $time=implode("",explode('.',implode("",explode(" ",microtime()))));
 $za->open("C:/Superdrive/Zipped/".$time.".zip",ZipArchive::CREATE);
  $filename=$_FILES["data"]["tmp_name"];
 $new=$_FILES["data"]["name"];
 $za->addFile($filename,"/superdrive/$new");
 $za->close();
 

 
 $size=filesize("C:/Superdrive/Zipped/".$time.".zip");
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
$sql="insert into fserver.maintable values('$time','$folder','$size','$r','0');";

$e=$conn->query($sql);
$message="SUCCESSFUL UPDATE";

  }
  else
  {
    $message='Error in Uploading the files';
  }
}
}
}
/*else if(isset($_FILES["data"])||$_FILES["data"]["error"]!='UPLOAD_ERR_OK'||!isset($_POST["infoabtit"]))
    $message='FAILURE IN UPDATE . PLS TRY AGAIN';*/

?>
<html>
    
    
    <head>
        <title>
            Super Drive Upload File
        </title>
        
    <link rel="stylesheet" type="text/css" href="style2.css.txt">
    </head>
    <body>
                <form action="index.php" methord="get">
            <input type="submit" value="Back to Search "/>
        </form>
        <img src="uploader.png" id="mainimage">
        <pre>
  <?php
    if($message!==NULL)
    echo "<h2>Status  :  $message</h2>";
    ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    
<br/><br/>
<h2>Detailed information about the file including the content , sub-category and file format</br>
    Eg : Introduction to flight aerodynamics book pdf</h2></br>
    <table
       
        <tr><td><h2>Input the file for upload</h2></td>
            <td>     
<input type="hidden" name="MAX_FILE_SIZE" value="2147483648" />
<input type="file" name="data" id="upload" /> 
            </td>
        </tr>
        
        
        
       
  <tr>
      <td><h2>File description of file </h2></td><td>   


<input type="text" name="infoabtit" Size= 100/>

            </td></tr>
  <tr><td>
          <h2>Category</h2></td><td>
<select name="category" id="dropdown">
<option value="1" class="dropdown1">Mechanical</option>
<option value="2" class="dropdown1">Electronics</option>
<option value="3" class="dropdown1">Computer Science</option>
<option value="4" class="dropdown1">Chemical</option>
<option value="5" class="dropdown1">Others</option>
</select>  
      </td>
  <tr>
      <td></td>
      <td>   
          <input type="submit" name="submit" value="Upload"id="submit"/>
      </td>
  </tr>      
    </table>      
</br>

    </form>
    
