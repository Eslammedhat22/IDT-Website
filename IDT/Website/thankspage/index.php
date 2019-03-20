<?php
session_start();
if(!isset($_SESSION["pst_success"]) && !isset($_SESSION["mobile"]))
{
   header('Location:../login/');
   exit;
}
elseif(!isset($_SESSION["pst_success"]))
{
   header('Location:../profilepage/profile.php');
   exit;
}
elseif($_SESSION["pst_success"]!=1)
{
    header('Location:../profilepage/profile.php');
    exit;
}
?>
<!DOCTYPE html> 
<html>
    <head> 
        <meta charset="utf-8"> 
        <title>Thanks</title>
        <link rel="shortcut icon" href="images/logo.png">
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/css.css">
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
        <div><h1>THANK YOU!</h1></div>
        <div><p>we're honored by your participation</p></div>
       
    </div>
           <!-- Home BUTTON -->
        <div id="ddd">
  <a id="home" class="ui button"href="../../index.html" >
        HOME
        </a>
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