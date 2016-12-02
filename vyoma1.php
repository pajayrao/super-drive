<?php
if(isset($_POST['Submit'])&&isset($_POST['name'])&&isset($_POST['passowrd'])&&isset($_POST['task'])&&is_int($POST['name']))
{    $id=is_int($POST['name']);
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

       $e=$conn->query("select username from user where userid='".$id."' and password='".$password."';");
          $i=0;
            foreach($e as $q)
            {
                if(isset($q['artificial']))
                      {
                               $i++;
        
                      }
           }
        if($i===1)
        {   $date=date('Y-m-d');
            $work=subsrt($_POST['password'],0,500);
            
            $conn->query("insert into info values('$date','$id','$work';");
            
            
            
        }
}

?>
<html>
    <head>
        <title>
            Vyoma Task Gruop
        </title>
    </head>
    <body>
         <form method="post" action="">
             <table>
                 <tr>
                     <td>
                         User ID: <input type="text" name="name"><br>
                     </td>
                     <td>
                         Password <input type="password" name="passowrd">
                     </td>
                 </tr>
             </table>
             <table>
                 <tr> 
                     <td>
                         
                   <textarea name="task" cols="25" rows="5">Enter today's progress 
                          </textarea>
                          </td>
                          <td>
                  <input type="submit" value="Submit" />
                  </td>
                 </tr>
                  </table>
         </form>
             <div>
                 <table>
                 <?php
                  echo'<tr>';
                  echo'<td>';
                  echo 'Today\'s Log';
                  echo'</td>';
                  echo '</tr>';
                  echo'<tr>';
                  echo'<td>';
                  echo 'Name';
                  echo'</td>';
                  echo'<td>';
                  echo 'Progress';
                  echo'</td>';
                  echo '</tr>';
                  $e=$conn->query("select useid,task from info where date='".date('Y-m-d')."'; ");
                  
                  foreach($e as $value)
                  {
                      $temp=$conn->query("select username from user where userid='".$value['userid']."' ");
                      foreach($temp as $tempo)
                      {
                          $username=$temop['username'];
                      }
                      echo'<tr>';
                      echo'<td>';
                      echo $username;
                      echo'</td>';
                      echo'<td>';
                      echo $value['task'];
                      echo'</td>';
                      echo'</tr>';
                  }
                  
                      
                  
                 
                   
                 ?>
                 </table>
             </div>
         </form>
    </body>