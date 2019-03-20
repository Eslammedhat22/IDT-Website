<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "applicants";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//=========================================== Model 1 =======================================================
$mobile=0;
$counter=0;
$pst_done=0;
$pst_score=0;
foreach($_POST as $key=>$val)
{
    if(isset($_POST[$key]))
    {
    	if($pst_done==0)
    	{
       
        if($key == "Q1" && $val == 1)
        {
           $counter++;
        }
            
        else if($key == "Q2" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q3" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q4" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q5" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q6" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q7" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q8" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q9" && $val == 5)
        {
           $counter++;
        }
        else if($key == "Q10" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q11" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q12" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q13" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q14" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q15" && $val == 5)
        {
           $counter++;
        }
        else if($key == "Q16" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q17" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q18" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q19" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q20" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q21" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q22" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q23" && $val == 3)
        {
           $counter++;
        }
       }
    }
}

if ($counter)
{
	$pst_score=$counter;
	$pst_done=1;
}

$sql = "SELECT mobile FROM applicants";
$result = $conn->query($sql);
if ($result->num_rows > 0)
 {
  while($row = $result->fetch_assoc())
  {
   if( $row["mobile"]===$mobile)
   {
   	$sql1 = "UPDATE applicants SET pst_score=$pst_score WHERE mobile=$mobile";
    $sql2 = "UPDATE applicants SET pst_done=$pst_done WHERE mobile=$mobile";

   }
  }  
 
}
if ($conn->query($sql1) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
if ($conn->query($sql2) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}



$conn->close();
 ?>


foreach($_POST as $key=>$val)
{
    if(isset($_POST[$key]))
    {
    	if($pst_done==0)
    	{
       
        if($key == "Q1" && $val == 2)
        {
           $counter++;
        }
            
        else if($key == "Q2" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q3" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q4" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q5" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q6" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q7" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q8" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q9" && $val == 5)
        {
           $counter++;
        }
        else if($key == "Q10" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q11" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q12" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q13" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q14" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q15" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q16" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q17" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q18" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q19" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q20" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q21" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q22" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q23" && $val == 2)
        {
           $counter++;
        }
       }
    }
}

//model 3

foreach($_POST as $key=>$val)
{
    if(isset($_POST[$key]))
    {
    	if($pst_done == 0)
    	{
       
        if($key == "Q1" && $val == 4)
        {
           $counter++;
        }
            
        else if($key == "Q2" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q3" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q4" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q5" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q6" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q7" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q8" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q9" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q10" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q11" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q12" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q13" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q14" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q15" && $val == 5)
        {
           $counter++;
        }
        else if($key == "Q16" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q17" && $val == 3)
        {
           $counter++;
        }
        else if($key == "Q18" && $val == 1)
        {
           $counter++;
        }
        else if($key == "Q19" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q20" && $val == 5)
        {
           $counter++;
        }
        else if($key == "Q21" && $val == 4)
        {
           $counter++;
        }
        else if($key == "Q22" && $val == 2)
        {
           $counter++;
        }
        else if($key == "Q23" && $val == 1)
        {
           $counter++;
        }
       }
    }
}