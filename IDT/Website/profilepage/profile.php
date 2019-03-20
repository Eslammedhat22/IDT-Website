<?php
session_start();
unset ($_SESSION["entered"]);
if(!isset($_SESSION["mobile"]))
{
   header('Location:../login/');
   exit;
}
$mobile='';
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
$mobile=$_SESSION["mobile"];
$username='';
$usermobile=$mobile;
$useremail='';
$useriv='';
$usersuccess;
$userpstdone;
$sql1="SELECT * FROM user";
 	   $result = $conn->query($sql1);
	    if ($result->num_rows > 0)
      	{
		        while($row=mysqli_fetch_assoc($result))
		         {
			            if($row["mobile"]===$mobile)
                     {
                        $username=$row["name"];
                        $useremail=$row["email"];
                        $useriv=$row["invtime"];
                        $usersuccess=$row["pst_success"];
                        $userpstdone=$row["pst_done"];
                        $_SESSION["invtime"]=$useriv;
                        $_SESSION["pst_success"]=$usersuccess;
                        $_SESSION["pst_done"]=$userpstdone;
								$_SESSION["id"]=$row["id"];
                        break;
                     }
			            
		         }
           
	      }
?>
<!DOCTYPE html> 
<html>
    <head> 
        <meta charset="utf-8"> 
        <title>Your Profile</title>
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="images/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Risque" >
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
            <div class="profile">
                <h1>welcome  ... </h1>
                <ul>
                               
                                     <li>Name:<?php echo"$username";?></li> 
                                     <li>Mobile no.:<?php echo"$usermobile";?></li>
                                     <li>Email :<?php echo"$useremail";?></li>
                                     <li>interview time :<?php echo"$useriv";?></li>
                                     
                               
                    
                    </ul>
                </div>
                
                <div class="buttons">
                <?php
                     if($userpstdone ==0 && $usersuccess==0){
                        ?>
                            <!-- Go To PST BUTTON -->
                            
                       <a href="../instructionpage/instructions.php" id="pst" class="ui animated button" tabindex="0">
                    
                        <div class="visible content"> PST</div>
                        <div class="hidden content" style="color:#FFD430;" class="ui button" >
                        Go to pst</div>
                         </a>
                            <?php  }
                            elseif($usersuccess==-1&&$userpstdone==1)  {
                                     ?>
                        <a  href="../../" id="pst" class="ui animated button" tabindex="0">
                         <div class="visible content">Hard Luck</div>
                         <div class="hidden content" style="color:#FFD430;"class="ui button" >
                          Hard Luck</div>
                         </a>
                              <?php } else if ($usersuccess==1&&$userpstdone==1&&$useriv==''){?>
                        <a href="../interviewspage/interviews.php" id="pst" class="ui animated button" tabindex="0">
                        <div class="visible content">Congratulations</div>
                        <div class="hidden content" style="color:#FFD430;" class="ui button" >
                        Go to interviews</div>
                      
                    </a>
                   
                    <?php } else if ($usersuccess==0&&$userpstdone==1){?>
                        <a href="../../"id="pst" class="ui animated button" tabindex="0">
                         <div class="visible content">Waiting the PST result</div>
                         <div class="hidden content" style="color:#FFD430;"class="ui button" >
                         Waiting....! </div>
                      
                    </a>
                    <?php }?>
                             <!-- Home BUTTON -->
                     
                         <a href="../../"id="home" class="ui button" >HOME</a>
                    

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



