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
elseif($_SESSION["invtime"]!='')
{
    header('Location:../profilepage/profile.php');
    exit;
}

$time="";
$mobile=$_SESSION["mobile"];

$dbhost = "idtegypt.org";
$dbuser = "idtegypt";
$dbpass = "HamiedSherouk18";
$dbname = "idtegypt_Trial";
$data_sent = false;
$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
 mysqli_set_charset($conn,"utf8");
 $query = "SELECT * FROM user WHERE mobile = $mobile";
 $sql = "SELECT time FROM inter WHERE slots > 0";
 $all = $conn->query($sql);
 $result = $conn->query($query);
 $users = $result->fetch_assoc();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $time= $_POST["time"];  
   }
   if(empty($users['invtime']) && $users['pst_done'] > 0){
 ?>
 
<!DOCTYPE html> 
<html>
    <head> 
        <meta charset="utf-8"> 
        <title>INTERVIEW time</title>
        <link rel="shortcut icon" href="images/icon.png">
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
            <div class="interview">
                                            <!-- INTERVIEW PHOTO -->
                <div class="inter-photo">
                    <img src="images/02.png">
                </div>
                
                                            <!-- INTERVIEW SELECTED BOX -->
                <div class="select-box">
                    <p>Select Your Interview Time:</p>
                    <div class="styled-select">
                    <form action="" method="post">
                    <select name="time" ><?php
                    while($row = $all->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['time']?>"><?php echo $row['time'] ?></option>
                            <?php
                           
                            // $t1=$row['t1'];
                    }
                            ?>
                    </select>
                    </div>
                    
                                        <!-- Sumbit BUTTON -->
                    <button href="/" id="submit" class="ui right labeled icon button" type="submit" value="submit"name="submit">
                      <i class="right arrow icon"></i>
                      SUBMIT
                      <?php ?>
                    </button>
                </div>
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
<?php  
   }                        
    //     $sql3 = "INSERT INTO user (invtime)
    //    select t1 from inter  where id='37' ";
    //     $gggss = $conn->query($sql3);
    //echo $mobile;
    if($time != ''){
    $sql3=" UPDATE user SET invtime  = '$time' WHERE mobile = $mobile";
    $sql4 = "UPDATE inter SET slots = slots-1 WHERE time = '$time'";
    $_SESSION["invtime"]=$time;
    $_SESSION['FLAG'] = 1; 
    $gggss1 = $conn->query($sql3);
    $gggss2 = $conn->query($sql4);
    }
    
    if(isset($_SESSION['FLAG']) &&  $_SESSION['FLAG'] == 1){
        header('Location:../thankspage/');
        exit;
    }
        // $sql1 = "UPDATE inter SET inv=inv-1 where t1=33";
        // $ggss = $conn->query($sql1);
?>
