<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["pst_done"]) && !isset($_SESSION["mobile"]))
{
   header('Location:../../login/');
   exit;
}
elseif(!isset($_SESSION["pst_done"]))
{
   header('Location:../../profilepage/profile.php');
   exit;
}

$dbhost = "idtegypt.org";
$dbuser = "idtegypt";
$dbpass = "HamiedSherouk18";
$dbname = "idtegypt_Trial";
$counter=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST' || (isset($_SESSION["entered"]) && $_SESSION["entered"]==1))
{
   foreach($_POST as $key=>$value)
  {
    if(isset($_POST[$key]))
    {
      
        if($key == "Q1" && $value == '4')
        {
           $counter++;
        }
            
        else if($key == "Q2" && $value == '2')
        {
           $counter++;
        }
        else if($key == "Q3" && $value == '3')
        {
           $counter++;
        }
        else if($key == "Q4" && $value == '4')
        {
           $counter++;
        }
        else if($key == "Q5" && $value == '4')
        {
           $counter++;
        }
        else if($key == "Q6" && $value == '1')
        {
           $counter++;
        }
        else if($key == "Q7" && $value == '1')
        {
           $counter++;
        }
        else if($key == "Q8" && $value == '4')
        {
           $counter++;
        }
        else if($key == "Q9" && $value == '4')
        {
           $counter++;
        }
        else if($key == "Q10" && $value == '2')
        {
           $counter++;
        }
        else if($key == "Q11" && $value == '3')
        {
           $counter++;
        }
        else if($key == "Q12" && $value == '4')
        {
           $counter++;
        }
        else if($key == "Q13" && $value == '1')
        {
           $counter++;
        }
        else if($key == "Q14" && $value == '3')
        {
           $counter++;
        }
        else if($key == "Q15" && $value == '5')
        {
           $counter++;
        }
        else if($key == "Q16" && $value == '1')
        {
           $counter++;
        }
        else if($key == "Q17" && $value == '3')
        {
           $counter++;
        }
        else if($key == "Q18" && $value == '1')
        {
           $counter++;
        }
        else if($key == "Q19" && $value == '4')
        {
           $counter++;
        }
        else if($key == "Q20" && $value == '5')
        {
           $counter++;
        }
        else if($key == "Q21" && $value == '4')
        {
           $counter++;
        }
        else if($key == "Q22" && $value == '2')
        {
           $counter++;
        }
        else if($key == "Q23" && $value == '1')
        {
           $counter++;
        }
       }
	   
  }
  
  $id=$_SESSION["id"];
  $sql  = "UPDATE user SET pst_score= $counter WHERE id=$id ";
    mysqli_query($conn,$sql);
    $_SESSION["entered"]=0;
	header('Location:../thankspage/');
	exit;
   $conn->close();
  
   
}
if($_SESSION["pst_done"]==1)
          {
               header('Location:../../profilepage/profile.php');
               exit;
          }
          
	  $id=$_SESSION["id"];
     $_SESSION["pst_done"]=1;
     $pst_done=1;
     $day=getdate();
     $sql  = "UPDATE user SET pst_done=$pst_done , day=$day[mday]  WHERE id=$id ";
     mysqli_query($conn,$sql);
     $conn->close();
?>
<!DOCTYPE HTML>
    <html>
        <head>
            <title>IDT PST</title>
            <link rel="shortcut icon" href="imagespst3/2.png">
            <Link rel="stylesheet" href="PST1.css">
			<link rel="stylesheet" href="css/style1.css">
            <link rel="stylesheet" href="css/AboutUsPage.css">
            <meta charset="utf-8">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.23/jquery-ui.min.js"></script>
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
                  <style>
        .timer
{
   width:200px;
   text-align: center;
   font-size: 50px;
    border: 10px  solid black;
    background: #d5c4c4;
    margin:  2% auto;
    margin-bottom:0;
    border-radius: 10%;
    
}
       </style>
        <script>
            window.onscroll = function() {scrollFunction()};

          function scrollFunction() {
                                       if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                                        document.getElementById("myBtn").style.display = "block";}
                                        else {
                                        document.getElementById("myBtn").style.display = "none"; }
                                    }


         function topFunction() {
                                   document.body.scrollTop = 0; 
                                   document.documentElement.scrollTop = 0; 
                                }


            function nextQuestion(n)
            {
                $(".questions").hide();
                $("#q"+n).show();
                $(".Next").hide();
                topFunction();
                if(n!=24){$("#n"+n).show();}
				else{$(".timer").hide();}
                
            }
        </script>
         
        </head>
        
        <body>
            
             <!--///////////////////////////////////prevent saving images from web page\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->  
            <script type="text/javascript">
                document.oncontextmenu=function(e)
                {
                    e=e || window.event;
                    if(/^img$/i.test((e.target||e.srcElement).nodeName))return false;
                                            
                };

            </script>
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
    var pixelSource = 'http://upload.wikimedia.org/wikipedia/commons/c/ce/Transparent.gif';
    var useOnAllImages = true;
    // Preload the pixel
    var preload = new Image();
    preload.src = pixelSource;
    $('img').live('mouseenter touchstart', function(e) {
        // Only execute if this is not an overlay or skipped
        var img = $(this);
        if (img.hasClass('protectionOverlay')) return;
        if (!useOnAllImages && !img.hasClass('protectMe')) return;
        // Get the real image's position, add an overlay
        var pos = img.offset();
        var overlay = $('<img class="protectionOverlay" src="' + pixelSource + '" width="' + img.width() + '" height="' + img.height() + '" />').css({position: 'absolute', zIndex: 9999999, left: pos.left, top: pos.top}).appendTo('body').bind('mouseleave', function() {
            setTimeout(function(){ overlay.remove(); }, 0, $(this));
        });
        if ('ontouchstart' in window) $(document).one('touchend', function(){ setTimeout(function(){ overlay.remove(); }, 0, overlay); });
    });
});
</script>
           

                     <!--///////////////////////////////////Navigation Bar\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->  
    <nav>
        <ul>
            <div id="leftBar">
                <a href="../../Events/Event2.html">Events</a>
                <a  href="../../gallary/gallary.html">Gallery</a>
            </div>
            <div id="logo"><a href="../../../"><img src="images/logo.png" ></a></div>
            <div id="rightBar">
                <a href="../../AboutUs/AboutUs.html">About us</a>
                <a href="../../sponsors/sponsors.html">Sponsors</a>
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
	<div id="countDown" class="timer"></div>
    <!--///////////////////////////////////PST\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->  
                   
        <div class="pstBody">
                <form method="POST" id="test">
                          <div class="questionsBody">
                                               <div class="questions" id="q1">
                                                          <h1>Question 1 :</h1>
                                                          <h2>Which one of these is least like others :</h2>
                                                          <h1>Answer:</h1>
                                                          <input type="radio" name="Q1" value="1"> <h2 class="choices">dog</h2>
                                                          <input type="radio" name="Q1" value="2"> <h2 class="choices">mouse</h2>
                                                          <input type="radio" name="Q1" value="3"> <h2 class="choices">lion</h2>
                                                          <input type="radio" name="Q1" value="4"> <h2 class="choices">snake</h2>
                                               </div>
                                               <div class="questions" id="q2">
                                                           <h1>Question 2 :</h1>
                                                           <h2>Choose the next figuer in the sequence : </h2>
                                                           <img src="imagespst3/Q2.png">
                                                           <h1>Answer:</h1>
                                                           <input type="radio" name="Q2" value="1"> <h2 class="choices">A</h2>
                                                           <input type="radio" name="Q2" value="2"> <h2 class="choices">B</h2>
                                                           <input type="radio" name="Q2" value="3"> <h2 class="choices">C</h2>
                                                           <input type="radio" name="Q2" value="4"> <h2 class="choices">D</h2>
                                                           <input type="radio" name="Q2" value="5"> <h2 class="choices">E</h2>
                                                           <input type="radio" name="Q2" value="6"> <h2 class="choices">F</h2>
                                               </div>
                                               <div class="questions" id="q3">
                                                            <h1>Question 3 :</h1>
                                                            <h2>The guide is………a line of tourists through the narrow passage with the help of his torch</h2> 
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q3" value="1"> <h2 class="choices">conducting </h2>
                                                            <input type="radio" name="Q3" value="2"> <h2 class="choices">bringing</h2>
                                                            <input type="radio" name="Q3" value="3"> <h2 class="choices">leading </h2>
                                                            <input type="radio" name="Q3" value="4"> <h2 class="choices">guiding</h2>
                                               </div>
                                               <div class="questions" id="q4">
                                                            <h1>Question 4 :</h1>
                                                            <h2>What number must be added to 6,16,8 to get an average of 13?</h2>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q4" value="1"> <h2 class="choices">35</h2>
                                                            <input type="radio" name="Q4" value="2"> <h2 class="choices">25</h2>
                                                            <input type="radio" name="Q4" value="3"> <h2 class="choices">20</h2>
                                                            <input type="radio" name="Q4" value="4"> <h2 class="choices">22</h2>
                                                         
                                               </div>
                                               <div class="questions" id="q5">
                                                            <h1>Question 5 :</h1>
                                                            <h2>What is the missing number in the sequence shown below?<br>1-8-27-?-125-216</h2>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q5" value="1"> <h2 class="choices">36</h2>
                                                            <input type="radio" name="Q5" value="2"> <h2 class="choices">45</h2>
                                                            <input type="radio" name="Q5" value="3"> <h2 class="choices">46</h2>
                                                            <input type="radio" name="Q5" value="4"> <h2 class="choices">64</h2>
                                                            <input type="radio" name="Q5" value="5"> <h2 class="choices">99</h2>
                                                            
                                               </div>
                                               <div class="questions" id="q6">
                                                            <h1>Question 6 :</h1>
                                                            <h2> Has Mrs. Smith arrived ..... ?</h2>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q6" value="1"> <h2 class="choices">yet</h2>
                                                            <input type="radio" name="Q6" value="2"> <h2 class="choices">still</h2>
                                                            <input type="radio" name="Q6" value="3"> <h2 class="choices">now</h2>
                                                            <input type="radio" name="Q6" value="4"> <h2 class="choices">already</h2> 

                                               </div>
                                               <div class="questions" id="q7">
                                                            <h1>Question 7 :</h1>
                                                            <h2>They do not ..... cheques in that restaurant </h2>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q7" value="1"> <h2 class="choices">accept</h2>
                                                            <input type="radio" name="Q7" value="2"> <h2 class="choices">agree</h2>
                                                            <input type="radio" name="Q7" value="3"> <h2 class="choices">allow</h2>
                                                            <input type="radio" name="Q7" value="4"> <h2 class="choices">admit</h2>

                                               </div>
                                               <div class="questions" id="q8">
                                                            <h1>Question 8 :</h1>
                                                            <h2>She tried to………out of the window to see the procession more clearly.</h2>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q8" value="1"> <h2 class="choices">bend</h2>
                                                            <input type="radio" name="Q8" value="2"> <h2 class="choices">curve</h2>
                                                            <input type="radio" name="Q8" value="3"> <h2 class="choices">bow</h2>
                                                            <input type="radio" name="Q8" value="4"> <h2 class="choices">lean</h2>

                                               </div>
                                               <div class="questions" id="q9">
                                                            <h1>Question 9 :</h1>
                                                            <h2>Which letter should replace the question mark?</h2>
                                                            <img src="imagespst3/Q9.png">
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q9" value="1"> <h2 class="choices">F</h2>
                                                            <input type="radio" name="Q9" value="2"> <h2 class="choices">U</h2>
                                                            <input type="radio" name="Q9" value="3"> <h2 class="choices">L</h2>
                                                            <input type="radio" name="Q9" value="4"> <h2 class="choices">j</h2>
                                                            <input type="radio" name="Q9" value="5"> <h2 class="choices">D</h2>   
                                               </div>
                                               <div class="questions" id="q10">
                                                            <h1>Question 10 :</h1>
                                                            <h2>What is the number in * cell?</h2>
                                                            <img src="imagespst3/Q10.png">
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q10" value="1"> <h2 class="choices">10</h2>
                                                            <input type="radio" name="Q10" value="2"> <h2 class="choices">-5</h2>
                                                            <input type="radio" name="Q10" value="3"> <h2 class="choices">32</h2>
                                                            <input type="radio" name="Q10" value="4"> <h2 class="choices">18</h2>
                                               </div>
                                               <div class="questions" id="q11">
                                                            <h1>Question 11 :</h1>
                                                            <h2>I have been living in London ...... 7 years </h2>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q11" value="1"> <h2 class="choices">at least</h2>
                                                            <input type="radio" name="Q11" value="2"> <h2 class="choices">since</h2>
                                                            <input type="radio" name="Q11" value="3"> <h2 class="choices">for</h2>
                                                            <input type="radio" name="Q11" value="4"> <h2 class="choices">before</h2>  
                                               </div>
                                               <div class="questions" id="q12">
                                                            <h1>Question 12 :</h1>
                                                            <h2>2,000,000 nanometers (nm) is to 2 millimeters (mm) as 25,000,000 nm is to?</h2>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q12" value="1"> <h2 class="choices">25 nm</h2>
                                                            <input type="radio" name="Q12" value="2"> <h2 class="choices">25.5 mm</h2>
                                                            <input type="radio" name="Q12" value="3"> <h2 class="choices">20 mm</h2>
                                                            <input type="radio" name="Q12" value="4"> <h2 class="choices">25 mm</h2>
                                                            <input type="radio" name="Q12" value="5"> <h2 class="choices"> None of the above</h2>
                                                            
                                                            
                                               </div>
                                               <div class="questions" id="q13">
                                                            <h1>Question 13 :</h1>
                                                            <h2>Choose the next figure in the flow :</h2>
                                                            <img src="imagespst3/Q13.png">
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q13" value="1"> <h2 class="choices">A</h2>
                                                            <input type="radio" name="Q13" value="2"> <h2 class="choices">B</h2>
                                                            <input type="radio" name="Q13" value="3"> <h2 class="choices">C</h2>
                                                            <input type="radio" name="Q13" value="4"> <h2 class="choices">D</h2>
                                               </div>
                                               <div class="questions" id="q14">
                                                            <h1>Question 14 :</h1>
                                                            <h2>Choose the next figure in the flow :</h2>
                                                            <img src="imagespst3/Q14.png">
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q14" value="1"> <h2 class="choices">A</h2>
                                                            <input type="radio" name="Q14" value="2"> <h2 class="choices">B</h2>
                                                            <input type="radio" name="Q14" value="3"> <h2 class="choices">C</h2>
                                                            <input type="radio" name="Q14" value="4"> <h2 class="choices">D</h2>
                                                            
                                               </div>
                                               <div class="questions" id="q15">
                                                            <h1>Question 15 :</h1>
                                                            <h2>Choose the next figure in the flow :</h2>
                                                            <img src="imagespst3/Q15.png">
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q15" value="1"> <h2 class="choices">A</h2>
                                                            <input type="radio" name="Q15" value="2"> <h2 class="choices">B</h2>
                                                            <input type="radio" name="Q15" value="3"> <h2 class="choices">C</h2>
                                                            <input type="radio" name="Q15" value="4"> <h2 class="choices">D</h2>
                                                            <input type="radio" name="Q15" value="4"> <h2 class="choices">E</h2>
                                               </div>
                                               <div class="questions" id="q16">
                                                            <h1>Question 16 :</h1>
                                                            <h2>What number should replace the question mark?</h2>
                                                            <img src="imagespst3/Q16.png">
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q16" value="1"> <h2 class="choices">67</h2>
                                                            <input type="radio" name="Q16" value="2"> <h2 class="choices">12</h2>
                                                            <input type="radio" name="Q16" value="3"> <h2 class="choices">54</h2>
                                                            <input type="radio" name="Q16" value="4"> <h2 class="choices">3</h2>
                                                            

                                                            
                                               </div>
                                               <div class="questions" id="q17">
                                                            <h1>Question 17 :</h1>
                                                            <h2>Choose the missing number in this sequence :</h2>
                                                            <img src="imagespst3/Q17.png">
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q17" value="1"> <h2 class="choices">A</h2>
                                                            <input type="radio" name="Q17" value="2"> <h2 class="choices">B</h2>
                                                            <input type="radio" name="Q17" value="3"> <h2 class="choices">C</h2>
                                                            <input type="radio" name="Q17" value="4"> <h2 class="choices">D</h2>
                                                            <input type="radio" name="Q17" value="5"> <h2 class="choices">E</h2>
                                                            <input type="radio" name="Q17" value="6"> <h2 class="choices">F</h2>
                                               </div>
                                               <div class="questions" id="q18">
                                                            <h1>Question 18 :</h1>
                                                             <h2>What is the number that is one half of one quarter of one tenth of 480? </h>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q18" value="1"> <h2 class="choices">6</h2>
                                                            <input type="radio" name="Q18" value="2"> <h2 class="choices">12</h2>
                                                            <input type="radio" name="Q18" value="3"> <h2 class="choices">16</h2>
                                                            <input type="radio" name="Q18" value="4"> <h2 class="choices">24</h2>
                                                            <input type="radio" name="Q18" value="5"> <h2 class="choices">32</h2>
                                               </div>
                                               <div class="questions" id="q19">
                                                            <h1>Question 19 :</h1>
                                                            <h2>What number must be added to 6,16,8 to get an average of 13?</h2>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q19" value="1"> <h2 class="choices">35</h2>
                                                            <input type="radio" name="Q19" value="2"> <h2 class="choices">25</h2>
                                                            <input type="radio" name="Q19" value="3"> <h2 class="choices">20</h2>
                                                            <input type="radio" name="Q19" value="4"> <h2 class="choices">22</h2>
                                               </div>
                                               <div class="questions" id="q20">
                                                            <h1>Question 20 :</h1>
                                                            <h2>What number should replace the question mark?</h2>
                                                            <img src="imagespst3/Q20.png">
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q20" value="1"> <h2 class="choices">8</h2>
                                                            <input type="radio" name="Q20" value="2"> <h2 class="choices">9</h2>
                                                            <input type="radio" name="Q20" value="3"> <h2 class="choices">14</h2>
                                                            <input type="radio" name="Q20" value="4"> <h2 class="choices">11</h2>
                                                            <input type="radio" name="Q20" value="5"> <h2 class="choices">10</h2>
                                               </div>
                                               <div class="questions" id="q21">
                                                            <h1>Question 21 :</h1>
                                                            <h2>A goat tied to corner of a square plot of side 12m by a rope of 7m long. Find the area it can graze?</h2>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q21" value="1"> <h2 class="choices">155</h2>
                                                            <input type="radio" name="Q21" value="2"> <h2 class="choices">19.25</h2>
                                                            <input type="radio" name="Q21" value="3"> <h2 class="choices">144</h2>
                                                            <input type="radio" name="Q21" value="4"> <h2 class="choices">38.5</h2>
                                                         

                                               </div>
                                               <div class="questions" id="q22">
                                                            <h1>Question 22 :</h1>
                                                            <h2>What is 80% of 160?</h2>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q22" value="1"> <h2 class="choices">140</h2>
                                                            <input type="radio" name="Q22" value="2"> <h2 class="choices">128</h2>
                                                            <input type="radio" name="Q22" value="3"> <h2 class="choices">150</h2>
                                                            <input type="radio" name="Q22" value="4"> <h2 class="choices">136</h2>
                                               </div>
                                               <div class="questions" id="q23">
                                                            <h1>Question 23 :</h1>
                                                            <h2>You can watch TV .... you like .</h2>
                                                            <h1>Answer:</h1>
                                                            <input type="radio" name="Q23" value="1"> <h2 class="choices">whenever</h2>
                                                            <input type="radio" name="Q23" value="2"> <h2 class="choices">soon</h2>
                                                            <input type="radio" name="Q23" value="3"> <h2 class="choices">always</h2>
                                                            <input type="radio" name="Q23" value="4"> <h2 class="choices">whatever</h2>
                                               </div>
                                        
                        
                                       </div>
								
								
								
                    
                    
                    
                    
                    
                    
                    
                                       <div class="nextAndSubmit">
                                                <button class="Next" id="n1" onclick="nextQuestion(2);return false; ">Next ></button> 
                                                <button class="Next" id="n2" onclick="nextQuestion(3);return false;">Next ></button>
                                                <button class="Next" id="n3" onclick="nextQuestion(4);return false;">Next ></button>
                                                <button class="Next" id="n4" onclick="nextQuestion(5);return false;">Next ></button>
                                                <button class="Next" id="n5" onclick="nextQuestion(6);return false;">Next ></button>
                                                <button class="Next" id="n6" onclick="nextQuestion(7);return false;">Next ></button>
                                                <button class="Next" id="n7" onclick="nextQuestion(8);return false;">Next ></button>
                                                <button class="Next" id="n8" onclick="nextQuestion(9);return false;">Next ></button>
                                                <button class="Next" id="n9" onclick="nextQuestion(10);return false;">Next ></button>
                                                <button class="Next" id="n10" onclick="nextQuestion(11);return false;">Next ></button>
                                                <button class="Next" id="n11" onclick="nextQuestion(12);return false;">Next ></button>
                                                <button class="Next" id="n12" onclick="nextQuestion(13);return false;">Next ></button>
                                                <button class="Next" id="n13" onclick="nextQuestion(14);return false;">Next ></button>
                                                <button class="Next" id="n14" onclick="nextQuestion(15);return false;">Next ></button>
                                                <button class="Next" id="n15" onclick="nextQuestion(16);return false;">Next ></button>
                                                <button class="Next" id="n16" onclick="nextQuestion(17);return false;">Next ></button>
                                                <button class="Next" id="n17" onclick="nextQuestion(18);return false;">Next ></button>
                                                <button class="Next" id="n18" onclick="nextQuestion(19);return false;">Next ></button>
                                                <button class="Next" id="n19" onclick="nextQuestion(20);return false;">Next ></button>
                                                <button class="Next" id="n20" onclick="nextQuestion(21);return false;">Next ></button>
                                                <button class="Next" id="n21" onclick="nextQuestion(22);return false;">Next ></button>
                                                <button class="Next" id="n22" onclick="nextQuestion(23);return false;">Next ></button>
                                                <input  type="submit" value="Submit" class="Next" id="n23">
                                                
                                       </div>
                    
                </form>
            
        </div>           
                   
                   
                   
                   
                   
                   

                     <!--footer -->
        <div class="footer">
            <p>Copyrights &copy; IT IDT'18 </p>
            <div>
                <a href="https://www.facebook.com/idt.egypt"><i class="fa fa-facebook-official fa-2x fa-inverse" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/channel/UCc6IoJNV980IbpGmNxLzdnA"><i class="fa fa-youtube-square fa-inverse fa-2x" aria-hidden="true"></i></a>
                <a href="https://www.linkedin.com/company/10220348/"><i class="fa fa-linkedin-square fa-inverse fa-2x" aria-hidden="true"></i></a>
            </div>
        
        </div>

           <script src="counter.js"></script>
        </body>
    </html>
<?php
	    session_start();
		$_SESSION["entered"]=1;
	
		  
?>