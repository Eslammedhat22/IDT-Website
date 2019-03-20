<?php
error_reporting(0);

/*--- Database Connection --- */
$dbhost = "idtegypt.org";
$dbuser = "idtegypt";
$dbpass = "HamiedSherouk18";
$dbname = "idtegypt_Trial";

// Create connection
$conn = new mysqli ($servername, $username, $password, $dbname);

// Check connection
/*if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
echo "Connected successfully";*/

//check if user coming from POST REQUEST

if($_SERVER['REQUEST_METHOD']==='POST')
{
	$data=array();
// sanitize the inputs and store them into Variables
	$fullName = filter_var($_POST['name'], FILTER_SANITIZE_STRING) ;
	$mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_NUMBER_INT);;
	$university =filter_var( $_POST['university'],FILTER_SANITIZE_STRING);
	$faculty = $_POST['faculty'];
	$department = $_POST['department'];
	$yearn= $_POST['year'];
	$firstPref = $_POST['firstpref'];
	$secondPref = $_POST['secondpref'];

// variables to hold the data inputs
	$name; $mobile; $email;
// creating different Error variables 
	$nameError=$firstNameError=$secondNameError=$mobileError=$emailError=$generalError="0";

// creating array containing the errors 
	/*$formErrors=array("fullName"=>$nameError, "firstName"=>$firstnameError, "secondName"=>$secondnameError, "mobile"=>$mobileError, "email"=>$emailError, "university"=>$universityError, "faculty"=>$facultyError, "department"=>$departmentError, "year"=>$yearError);*/

// conditions that lead to an form error 

foreach ($_POST as $key => $value) {
		switch ($key) {

/*//////////// validatation of the Name\\\\\\\\\\\\\\\*/
			case 'name':
						$pos=stripos($value,' ');  // check for the space between the first two Names
//make sures that user enterd his full name
						if($pos === FALSE || strlen($value)<2)
							$nameError="you have to enter your full name";
						else
						{
// getting the first and the second names		
							$firstName=substr($value, 0, $pos);
							$secondName=substr($value, $pos, strlen($value)-$pos);

// remove any spaces in the two names
							trim($firstName," ");
							trim($secondName," ");
// check the validty of the first name
							if(strlen($firstName)<2 || !preg_match("/^[a-zA-Z\p{Arabic}\s]+$/iu", $firstName))   
								$firstNameError= "your first name is invalid, please enter a valid name";
// check the validty of the second name
							else if(strlen($secondName)<2 || !preg_match("/^[a-zA-Z\p{Arabic}\s]+$/iu", $secondName))  
								$secondNameError= "your second name is invalid, please enter a valid name";	
							else
								$data[$key]=$value;	
						}
						break;
/*/////////// validation of The Mobile Number \\\\\\\\\\\\*/
			case 'mobile':
						if (!preg_match("/^01(0|1|2|5)\d{8}+$/", $value))
							$mobileError= "Please Enter a valid Mobile Number";
						else
							$data[$key]=$value;
						break;
/*/////////// validation of The Email \\\\\\\\\\\\*/
			case 'email':
						if (!filter_var($value, FILTER_VALIDATE_EMAIL))
							$emailError= "Please Enter a valid E-mail";
						else
							$data[$key]=$value;
						break;
/*/////////// validation of The University \\\\\\\*/
			case 'university':
							$data[$key]=$value;
							break;
/*/////////// validation of The Faculty \\\\\\\*/
			case 'faculty':
							$data[$key]=$value;
							break;
/*/////////// validation of The Department \\\\\\\*/
			case 'department':
							$data[$key]=$value;
							break;
/*/////////// validation of The year \\\\\\\*/
			case 'year':
						$data[$key]=$value;
						break;
			case 'firstpref': $data['firstpref']=$value; break;
			case 'secondpref': $data['secondpref']=$value; break;
			default:break;
		}		
	}
		$name=$data['name'];
		$mobile=$data['mobile'];
		$email=$data['email'];
		$university=$data['university'];
		$faculty=$data['faculty'];
		$department=$data['department'];
		$year=$data['year'];
		$firstpref=$data['firstpref'];
		$secondpref=$data['secondpref'];

		if($nameError!="0"||$firstNameError!="0"||$secondNameError!="0"||$mobileError!="0"||$emailError!="0") $generalError="1";
		
}

$done=0;
if(isset($data) && $generalError=="0")
{
	$dbData=array();
	$check1="none";
	$check2="none";
	$status;	

	$sql1="SELECT mobile, email FROM user";
 	$result = $conn->query($sql1);
	if ($result->num_rows > 0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($row["mobile"]===$mobile) $check1="mobile"; 
			if($row["email"]===$email) $check2="email";
			
		}
	}
	if($check1==="mobile" && $check2==="email") $status=  "Sorry ". $data['name'] .", These Email: ".$data['email']." and Mobile Number: ".$data['mobile']." already exist";
	else if($check1==="mobile") $status= "Sorry ". $data['name'] .", This Mobile Number: ".$data['mobile']." already exists";
	else if($check2==="email") $status= "Sorry ".$data['name'].", This Email: ".$data['email']." already exists";
	else{
			$offer = 0 ; // set it to 1 for offer
			$score=0;
			$iv='';
			$sql3 = "INSERT INTO user (name, mobile, email, university, faculty, department, year, firstpref, secondpref,pst_done,pst_success, pst_score , day , invtime)
					VALUES ('$name', '$mobile', '$email', '$university', '$faculty', '$department', '$year', '$firstpref', '$secondpref','$offer','$offer','$score','$score','$iv')";

			if ($conn->query($sql3) === TRUE) 
	    		{$status ="Thanks ". $data['name'] .", you have registered successfully "; $done=1;}
	 		else 
	    		echo "Error: " . $sql3 . "<br>" . $conn->error;
		}
	}		
$conn->close();
?>
<!-- Form -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-1.12.4.min.js"></script>	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/sweetalert.min.js"></script>
	<script src="js/java.js"></script>	
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<link rel="icon" href="css/Images/logo.png">
</head>
<body>
	<br><br><br><br>		
	<div class="container">
		<br><a href="../.."><img src="css/Images/logo.png"><br><br></a>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" validate method="POST">			
            <!-- full name -->
			<Label>Full Name</Label>
			<input value="<?php if(isset($generalError) && $generalError!=0 || (isset($status) && $done!=1) ) echo isset($data['name'])? $data['name'] : ''; ?>" type="text" name="name" class ="form-control" class="input" 
			placeholder="<?php if( isset($nameError) || isset($firstNameError) || isset($secondNameError))
									if($nameError!="0") echo $nameError;
									else if($firstNameError!="0") echo $firstNameError ;
									else if ($secondNameError!="0") echo $secondNameError;
									else echo"example: john doe" ;
								else echo"example: john doe" ;
	 					?>" required  
			 style="<?php if(isset($done) && $done!=1 && ($check1!="mobile" || $check2!="email") )
			 				 if(isset($nameError) || isset($firstNameError) || isset($secondNameError) )
			 					if( $nameError!="0" || $firstNameError!="0" || $secondNameError!="0" )
			 						{ echo 'border: 2px solid red;
											box-shadow:0 0 1px red;';
									}
									else{
										echo'border: 2px solid green;
											box-shadow:0 0 1px green;';
										}

					?>">
			<br>
            <!-- Mobile -->
			<Label>Mobile Number</Label>
			<input value="<?php if(isset($generalError) && $generalError!=0 || (isset($status) && $done!=1) ) echo isset($data['mobile'])? $data['mobile'] : ''?>" type="text" name="mobile" class = "form-control" required
			style="<?php if( isset($done) && isset($mobileError) && $done!=1 ) if($mobileError!="0" || $check1==="mobile" ){
								echo 'border: 2px solid red;
									box-shadow:0 0 1px red;';}		
							else{
								echo'border: 2px solid green;
								box-shadow:0 0 1px green;';}
					?>" placeholder=" <?php if(isset($mobileError)) echo ($mobileError!="0")? $mobileError : "example : 01111111111" ; else echo"example : 01111111111" ; ?>" >
			<br> 
            <!-- Email -->
			<Label>Email</Label>
			<input value="<?php if(isset($generalError) && $generalError!=0 || (isset($status) && $done!=1) )  echo isset($data['email'])? $data['email'] : ''?>"  type="email" name="email" class = "form-control" required 
			placeholder=" <?php if(isset($emailError)) echo ($emailError!="0")? $emailError : "example:  john_doe@example.com" ; else echo "example:  john_doe@example.com"; ?>"
			style="<?php if( isset($done) && $done!=1 && isset($emailError) ) 
							if($emailError!="0" || $check2==="email" ){
								echo 'border: 2px solid red;
									box-shadow:0 0 1px red;';}		
							else{
								echo'border: 2px solid green;
								box-shadow:0 0 1px green;';}
					?>">
			<br>

            <!-- university -->
			<Label>University</Label>
			<select placeholder = "Choose..." required name ="university" class="custom-select mr-sm-2">
				<option value ="" selected="true" disabled="disabled"> Choose... </option>
				<option value="Al Azhar University">Al Azhar University</option>
        		<option value="Ain Shams University">Ain Shams University</option>
        		<option value="Cairo University">Cairo University</option>
       			<option value="Helwan University">Helwan University</option>
       			<option value="Others">Others</option>
      		</select>
			<br><br>

            <!-- Faculty -->
			<Label>Faculty</Label>
			<select required name ="faculty" id="faculty" class="custom-select mr-sm-2">
				<option value ="" selected="true" disabled="disabled"> Choose... </option>
				<option value="Faculty Of Engineering">Faculty Of Engineering</option>
       			<option value="Others">Others</option>
      		</select>
			<br class ="year"><br class ="year">

			<!-- year -->
			<Label class ="year">Year</Label>
			<select required name ="year" id="year" class="custom-select mr-sm-2 year">
				<option value ="" selected="true" disabled="disabled"> Choose... </option>
				<option value="Preparatory">Preparatory</option>
        		<option value="1st">1st</option>
        		<option value="2nd">2nd</option>
       			<option value="3rd">3rd</option>
       			<option value="4th">4th</option>
       		</select>

       		<br class = "dep"><br class = "dep">
            <!-- Department -->
			<Label class = "dep">Department</Label>
			<select  name ="department" id = "department" 
			class="custom-select mr-sm-2 dep">
				<option value ="" selected="true" disabled="disabled"> Choose... </option>
				<option class ="1&2" value="Architecture Engineering">
				Architecture Engineering</option>
        		<option class ="1&2"
        		value="Civil Engineering">Civil Engineering</option>
        		<option value="Electrical Engineering" class ="1&2"> 
        		Electrical Engineering</option>
       			<option class ="1&2"
       			value="Mechanical Engineering">Mechanical Engineering</option>
       			
       			<!-- Civil Departments -->
       			<optgroup class ="4" label="Civil Engineering">
       			<option class ="4" value="Irrigation of Hydraulics Engineering">
       			Irrigation of Hydraulics Engineering </option>
        		<option class ="4" value="Structure Engineering">
        		Structure Engineering </option>
       			<option class ="4" value="Public Works">
       			Public Works </option>
       			
       			<!-- Electrical Departments -->
       			<optgroup id="Electrical" label="Electrical Engineering">
       			<option value="Computer and Systems Engineering">
       			Computer and Systems Engineering</option>
        		<option value="Electronics and Electrical Communication Engineering">Electronics and Electrical Communication Engineering</option>
       			<option value="Power and Electrical Machines Engineering">
       			Power and Electrical Machines Engineering</option>
				
				<!-- Mechanical Departments -->
       			<optgroup id="Mechanical" label="Mechanical Engineering">
       			<option value="Automotive Engineering">
    			Automotive Engineering</option>
        		<option value="Design and Production Engineering">
        		Design and Production Engineering</option>
       			<option value="Mechatronics Engineering">
       			Mechatronics Engineering</option>
       			<option value="Mechanical Power Engineering">
       			Mechanical Power Engineering</option>

       		</select>
	
			<br class = "pref"><br class = "pref">

            <!-- Preferences -->
			<Label class = "pref" >First Preference</Label>
			<select required name="firstpref" class="custom-select mr-sm-2 pref" 
			id="firstpref">
				<option value ="" selected="true" disabled="disabled">Choose...</option> 
				<!-- Technical -->
				<optgroup class = "Technical" value = "Technical" label="Technical">
        		<option value="Python">Python</option>
        		<option value="SolidWorks">SolidWorks</option>
				<!-- Non Technical -->
        		<optgroup class="NT" label="Non Technical">
       			<option value="Marketing">Marketing</option>
       			<option value="Red Lantern">Red Lantern</option>
       			<option value="Green Lantern">Green Lantern</option>
       			<option value="Orange Lantern">Orange Lantern</option>
      		</select>
			<br class = "pref"><br class = "pref">
			
			<Label class = "pref"> Second Preference</Label>
			<select required name="secondpref" class="custom-select mr-sm-2 pref"
			id="secondpref">
				<option value ="" selected="true" disabled="disabled">Choose...</option>
				<!-- Technical -->
				<optgroup class = "T Technical" value = "Technical" label="Technical">
        		<option value="Python">Python</option>
        		<option value="SolidWorks">SolidWorks</option>
				<!-- Non Technical -->
        		<optgroup label="Non Technical">
       			<option value="Marketing">Marketing</option>
       			<option value="Red Lantern">Red Lantern</option>
       			<option value="Green Lantern">Green Lantern</option>
       			<option value="Orange Lantern">Orange Lantern</option>
      		</select>
			<br><br><br>
			<input  type="submit" value="Submit" class="btn btn-warning btn-block">
		</form>
		<br>

       
		<script type="text/javascript">

			/*--------- Getting Elements --------*/
			var faculty = document.getElementById ('faculty');
			var year = document.getElementById ('year');
			var department = document.getElementById ('department');
			var firstpref = document.getElementById ('firstpref');
			var secondpref = document.getElementById ('secondpref');

			/*-- Message to show if the email or mobile is already exist 
			or record in database is done --*/	
		
			var status = <?php echo json_encode($status); ?> ;
			var done = <?php echo json_encode(isset($status)); ?> ;
			var success = <?php echo json_encode($done); ?> ;
			if(done)
			{
				$(document).ready(function() 
				 	{
				 		if(success)
				 		{
							swal({ 
				 				title: "Congratulations!",
   								text: status,
    							icon: "success",
								buttons : ["Go To PST", true]
								
    						})
							.then(function(isConfirm){
								if(isConfirm)
									{
										document.getElementById("#form").reset();
										
										window.location.reload();
									}
								else
									window.location.href = '../login/';						
							})
						}
			
				 		else
						{swal({ 
				 				title: "Error!",
   								text: status,
    							icon: "error",
    							button : "Try Again"
    						})
    					}
				 	})
			}
		</script>
	</div>
	<br><br>
</body>
</html>