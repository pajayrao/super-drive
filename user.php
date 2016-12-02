<?php
if(isset($_POST['id'])&&isset($_POST['name'])&&isset($_POST['password']))
{   $id=$_POST['id'];
    $name=$_POST['name'];
    $password=md5(subsrt($_POST['password'],0,20));
     $dsn="mysql:host=mysql6.000webhost.com;dbname=a8213874_vyomawo";
     $username="a8213874_vyoma12";
      $password="zaqwsx123";
        try 
        {
             $conn = new PDO( $dsn, $username, $password );
             $conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } 
       catch ( PDOException $e )
         {
             echo "Connection failed: " . $e-> getMessage();
         }

       $conn->query("insert into user values('".$id."','".$name."',".$password."';");
}

?>

<form method="post" action="">
             <table>
                 <tr>
                     <td>
                         User ID: <input type="text" name="id"><br>
                     </td>
                     <td>
                         User Name: <input type="text" name="username"><br>
                     </td>
                      <td>
                         User Name: <input type="text" name="name"><br>
                     </td>
                     <td>
                         Password <input type="password" name="password">
                     </td>
                 </tr>
             </table>
             <table>
                 <tr> 
                    <td>
                  <input type="submit" value="Submit" />
                  </td>
                 </tr>
                  </table>
         </form>
