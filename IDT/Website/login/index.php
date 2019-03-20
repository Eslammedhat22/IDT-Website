<?php
session_start();
session_unset ();
$mobile='';
$check = 0;
$check1 = 0;
$check2 = 0;
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
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 

 if (!preg_match("/^01(0|1|2|5)\d{8}+$/",$_POST['mobile'] )) {
         global $check;
         $check = 1;
   } else
   {
     $mobile =  filter_var($_POST['mobile'],FILTER_SANITIZE_NUMBER_INT);
     $sql1="SELECT mobile, email FROM user";
 	   $result = $conn->query($sql1);
	    if ($result->num_rows > 0)
      	{
		        while($row=mysqli_fetch_assoc($result))
		         {
			            if($row["mobile"]===$mobile) {$check2=1; break;} 
			            
		         }
           if($check2!=1)
           {
             $check1=1;
           }
           else
           {
             session_start();
             $_SESSION['mobile'] =$mobile;
             header('Location:../profilepage/profile.php');
             exit;
           }
	      }
   }
			$conn->close();
}

?>

<!DOCTYPE html> 
<html>
    <head> 
        <meta charset="utf-8"> 
        <title>LOGIN</title>
        <link rel="shortcut icon" href="images/login-icon.png">
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
    </head>
    <body>
        
        <!--///////////////////////////////////Navigation Bar\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->  
   <nav>
        <ul>
            <div id="leftBar">
                <!-- <a href="../Events/Event2.html">Events</a> -->
                <a href="#">Events</a>
                <!-- <a  href="../gallary/gallary.html">Gallery</a> -->
                <a  href="#">Gallery</a>
            </div>
            <div id="logo"><a href="../../"><img src="images/logo.png" ></a></div>
            <div id="rightBar">
                <a href="../AboutUs/AboutUs.html">About us</a>
                <a href="../sponsors/sponsors.html">Sponsors</a>
            </div>
        </ul>
        <div class="handle">
            <label for="toggle">&#9776; MENU</label>
        </div>        
    </nav>

    <script>
        $('.handle').on('click', function(){
        $('nav ul').toggleClass('showing');});
    </script>
    <!--//////////////////////////////////////////end of navigation \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
        
        
        
         <!--/////////////////////////////////// content \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
        <div class="container">
            <div class="login">
                <form method="post"> 
                    <div id="mobile-input" class="ui labeled input">
                      <div id="la-input" class="ui label">
                       Please Enter your Mobile No. 
                      </div>
                    
                      <input   id="input" placeholder="010********" type="text" name="mobile" placeholder="Enter yor mobile" value="<?php if(isset($mobile)) echo $mobile;?>">
                        
                    </div>
                    <?php if($check == 1) {?>
                    <span style="color:red "> PLEASE ENTER Valid Mobile N0.</span><?php }?>
                    <?php if($check1 == 1) {?>
                    <span style="color:red "> Click <a style="color:#ffd530"  href="../register/RegistrationForm.php"> here </a> to make a registeration first.</span><?php }?>
                    
                                <!-- Home BUTTON -->
                     <a href="../../" id="home" class="ui button">
                        HOME</a>
                                 <!-- Sumbit BUTTON -->
                    <button id="submit" class="ui right labeled icon button" value="submit" name="submit">
                      <i class="right arrow icon"></i>
                      LOGIN
                    </button>
                    
                </form>
            </div>
        </div>
            
        <!--//////////////////////////////////////// end of content \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
        
        
 <!--/////////////////////////////////////////// footer \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
        <div class="footer">
            <p>Copyrights &copy; IT IDT'18 </p>
            <div>
                <a href="https://www.facebook.com/idt.egypt"><i class="fa fa-facebook-official fa-2x fa-inverse" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/channel/UCc6IoJNV980IbpGmNxLzdnA"><i class="fa fa-youtube-square fa-inverse fa-2x" aria-hidden="true"></i></a>
                <a href="https://www.linkedin.com/company/10220348/"><i class="fa fa-linkedin-square fa-inverse fa-2x" aria-hidden="true"></i></a>
            </div>
        </div>
 <!--////////////////////////////////////////// end of footer \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
    </body>
</html>

                   