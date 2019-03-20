<?php
//error_reporting(0);

/*--- Database Connection --- */
$dbhost = "idtegypt.org";
$dbuser = "idtegypt";
$dbpass = "HamiedSherouk18";
$dbname = "idtegypt_Trial";

// Create connection
$conn = new mysqli ($dbhost, $dbuser, $dbpass, $dbname);


if($_SERVER['REQUEST_METHOD']==='POST')
{
    $pr_name = $_POST['pr_name'] ;
    $pr_evaluation = $_POST['pr_evaluation'] ;
    $event_meet_expectations = $_POST['event_meet_expectations'] ;
    $workshop_time_suitable = $_POST['workshop_time_suitable'] ;
    $booth_evaluation = $_POST['booth_evaluation'] ;
    $rollup_evaluation = $_POST['rollup_evaluation'] ;
    $flyer_evaluation = $_POST['flyer_evaluation'] ;
    $know_about_idt = $_POST['know_about_idt'] ;
    $idt_rate = $_POST['idt_rate'] ;
    $comments = $_POST['comments'] ;


    $sql = "INSERT INTO feedback_inst_18 (pr_name, pr_evaluation, event_meet_expectations, workshop_time_suitable, booth_evaluation, rollup_evaluation, flyer_evaluation, know_about_idt, idt_rate,comments)
    VALUES ('$pr_name', '$pr_evaluation', '$event_meet_expectations', 
    '$workshop_time_suitable', '$booth_evaluation', '$rollup_evaluation',
     '$flyer_evaluation', '$know_about_idt', '$idt_rate','$comments')";

    $conn->query($sql);
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Feedback Form</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" > 
        <link rel="icon" href="images/logo.png">     
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/style.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    </head>
    <body >
         <!--///////////////////////////////////Navigation Bar\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->  
    <nav>
        <ul>
            <div id="leftBar">
                <a href="../Events/Event2.html">Events</a>
                <a  href="../gallary/gallary.html">Gallery</a>
            </div>
            <div id="logo"><a href="../../"><img src="images/logo.png" ></a></div>
            <div id="rightBar">
                <a href="../AboutUs/AboutUs.html">About us</a>
                <a href="#">Sponsors</a>
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
        <div class="container">
            <div class="row ">
                <div id="feedback" class="col-md-6 col-md-offset-3 form-container">
                    <h2>PLEASE SHARE YOUR FEEDBACK!</h2>
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']?>" nonvalidate method="POST">
                         <div class="row">
                            <div class="col-sm-6 form-group">
                                <label> Who talked to you?</label>
                                <input name="pr_name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>How do you think of him?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input value="Excellent" type="radio" 
                                        name="pr_evaluation">
                                        Excellent 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Very Good" type="radio" 
                                        name="pr_evaluation">
                                        Very Good 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Good" type="radio" 
                                        name="pr_evaluation">
                                        Good 
                                    </label>
                                    <label value="Fair" class="radio-inline">
                                        <input type="radio" name="pr_evaluation">
                                        Fair 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Poor" type="radio" 
                                        name="pr_evaluation">
                                        Poor 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Does the event meet your Expectations? </label>
                                <p>
                                    <label class="radio-inline" >
                                        <input value = "Yes" type="radio" name="event_meet_expectations">
                                        Yes  
                                    </label>
                                    <label class="radio-inline">
                                        <input value = "No" type="radio" name="event_meet_expectations">
                                        No
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Does the time of the workshops suit you well?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input value = "Yes" type="radio" name="workshop_time_suitable">
                                        Yes  
                                    </label>
                                    <label class="radio-inline" >
                                        <input value = "No" type="radio" name="workshop_time_suitable">
                                        No
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>what is your opinion about our Booth?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input value="Excellent" type="radio" 
                                        name="booth_evaluation">
                                        Excellent 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Very Good" type="radio" 
                                        name="booth_evaluation">
                                        Very Good 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Good" type="radio" 
                                        name=booth_evaluation">
                                        Good 
                                    </label>
                                    <label value="Fair" class="radio-inline">
                                        <input type="radio" name="booth_evaluation">
                                        Fair 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Poor" type="radio" 
                                        name="booth_evaluation">
                                        Poor 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>what is your opinion about our Rollup?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input value="Excellent" type="radio" 
                                        name="rollup_evaluation">
                                        Excellent 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Very Good" type="radio" 
                                        name="rollup_evaluation">
                                        Very Good 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Good" type="radio" 
                                        name="rollup_evaluation">
                                        Good 
                                    </label>
                                    <label value="Fair" class="radio-inline">
                                        <input type="radio" name="rollup_evaluation">
                                        Fair 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Poor" type="radio" 
                                        name="rollup_evaluation">
                                        Poor 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>what is your opinion about our Flyer?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input value="Excellent" type="radio" 
                                        name="flyer_evaluation">
                                        Excellent 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Very Good" type="radio" 
                                        name="flyer_evaluation">
                                        Very Good 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Good" type="radio" 
                                        name="flyer_evaluation">
                                        Good 
                                    </label>
                                    <label value="Fair" class="radio-inline">
                                        <input type="radio" name="flyer_evaluation">
                                        Fair 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Poor" type="radio" 
                                        name="flyer_evaluation">
                                        Poor 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>How did you know IDT?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input value = "Fan Page" type="radio"
                                        name="know_about_idt">
                                        Fan Page 
                                    </label>
                                    <label class="radio-inline">
                                        <input value = "Friend" type="radio" 
                                        name="know_about_idt">
                                        Friend 
                                    </label>
                                    <label class="radio-inline">
                                       <input value = "Booth" type="radio" 
                                       name="know_about_idt">
                                        Booth 
                                    </label>
                                </p>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Please rate IDT Overall</label>
                                <p>
                                   <label class="radio-inline">
                                        <input value="Excellent" type="radio" 
                                        name="idt_rate">
                                        Excellent 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Very Good" type="radio" 
                                        name="idt_rate">
                                        Very Good 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Good" type="radio" 
                                        name="idt_rate">
                                        Good 
                                    </label>
                                    <label value="Fair" class="radio-inline">
                                        <input type="radio" name="idt_rate">
                                        Fair 
                                    </label>
                                    <label class="radio-inline">
                                        <input value="Poor" type="radio" 
                                        name="idt_rate">
                                        Poor 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label> Comments:</label>
                                <textarea name = "comments" class="form-control" type="textarea" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <input type="submit" value="Submit" class="btn btn-lg btn-warning btn-block" id="sub-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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