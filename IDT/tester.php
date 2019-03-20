<?php

$dbhost = "idtegypt.org";
$dbuser = "idtegypt";
$dbpass = "HamiedSherouk18";
$dbname = "idtegypt_Trial";

$data_sent = false;
$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['password']=="idt_it@2018")
{
 
         
          $day=$_POST['day'];
          $score=$_POST['score'];
		  $wait=$_POST['wait'];
          $sql1="SELECT * FROM user";
 	      $result = $conn->query($sql1);
	    if ($result->num_rows > 0)
      	{
		        while($row=mysqli_fetch_assoc($result))
		         {
			            if(($row["pst_done"]==1) && $row["day"]==$day  ) 
                        {
                            $id=$row["id"];
                            
                            if($row["pst_score"]>=$score)  
                            {
                                $pass=1;
                                $sql  = "UPDATE user SET pst_success=$pass WHERE id=$id ";
                                mysqli_query($conn,$sql);
                            }
                            else
                            {
                              if($wait !="1")  $unpass=-1;
                                $sql  = "UPDATE user SET pst_success=$unpass WHERE id=$id ";
                                mysqli_query($conn,$sql);
                            }
                        } 
			            
		         }
           
        }
        $conn->close();
			
    
    header('Location: http://www.google.com/');
       
}

?>

<!DOCTYPE html> 
<html>
    <head> 
        <meta charset="utf-8"> 
        <title>Tester</title>
    </head>
    <body>
        
                
                <form method="post"> 
                    <div style="margin: 10% auto; width: 500px; height: 500px; background: black;">
                         <p>day</p>
                      <input   placeholder="Enter the day" type="number" name="day">
                      
                      <br>
                      
                       <p>score</p>
                      <input    placeholder="Enter the score " type="number" name="score">
                      <br>
						<p style="color: white;">waiting</p>
                      <input    type="checkbox" name="wait" value="1">
                      <br>
                      
                       <p> password</p>
                      <input    placeholder="Enter your Password" type="password" name="password">
                      <input value="submit" type="submit" >
                    </div>
                    
                </form>
     
      
            
    </body>
</html>
