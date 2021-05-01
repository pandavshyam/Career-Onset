<?php 

// Remaining

// require 'API/db.php';
$output = " ";
// if(isset($_POST['submit'])){
//     $email = $_POST['email'];
//     $name = $_POST['name'];
//     $msg = $_POST['msg'];
//     $query = "insert into contactus(email,name,message)values('$email','$name','$msg')";
//     $res = mysqli_query($conn,$query);
//     if($res){
//         $to = $email;
//         $subject = "Query MITAOE Placement Cell";
//         $mailContent = "
//         <html></body><div><div>Dear $name,</div></br></br>
//         <span> Here is your Message..</span>
//         <br>
//         <span>$msg</span> <br><br>
//         Thanks Regards, <br>
//         MITAOE Placement Cell
//         </div></div>
//         </body></html>
//         ";
//         //set content-type header for sending HTML email
//         $headers = "MIME-Version: 1.0" . "\r\n";
//         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//         //additional headers
//         $headers .= 'From: patilpavan631@gmail.com' . "\r\n";
//         //send email
//         mail($to,$subject,$mailContent,$headers);
//         $to = 'pavanp@mitaoe.ac.in';
//         $subject = "Query MITAOE Placement Cell";
//         $mailContent = "
//         <html></body><div><div>Dear Sir,</div></br></br>
//         <span> Here is Query of the Student </span>
//         <br>
//         <span>Email = $email </span><br>
//         <span>Message = $msg</span> <br><br>
//         Thanks Regards, <br>
//         MITAOE Placement Cell
//         </div></div>
//         </body></html>
//         ";
//         //set content-type header for sending HTML email
//         $headers = "MIME-Version: 1.0" . "\r\n";
//         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//         //additional headers
//         $headers .= 'From: patilpavan631@gmail.com' . "\r\n";
//         //send email
//         mail($to,$subject,$mailContent,$headers);
//         $output = "Thanks, we will contact you Shortly..";
//     }
//     else{
//         $output = "Sorry, Some Problem has Occoured Try Again";
//     }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MITAOE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"  href="swiper.min.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width: 320px) and (max-device-width: 500px)" href="css/mobile.css" />
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width: 501px)" href="css/main.css" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="public/css/contact_us.css">
</head>

<style>

</style>
<body oncontextmenu="return false;">
    <header>
            <nav class="nav-wrapper transparent" id="mainNav">
                    <div class="container">
                        <a href="index.php" class="brand-logo" style="color:black;">MITAOE</a>
                        <a href="#" class="sidenav-trigger" data-target="mobile-menu">
                            <i class="material-icons" style="color: black;">menu</i>
                        </a>
                      <ul class="right hide-on-med-and-down" style="font-family: 'Roboto', sans-serif;">
                          <li><a href="index.php">Home</a></li>
                          <li><a href="contact_us.php">Contact us</a></li>
                          <li><a href="login.php">Login</a></li>
                         
                  
                      </ul>
                  
                      <ul class="sidenav gray lighten-2" id="mobile-menu">
                             <li><a href="index.php">Home</a></li>
                          <li><a href="contact_us.php">Contact us</a></li>
                          <li><a href="login.php">Login</a></li>
                         
                      </ul>
                    
                      </div>
                  </nav>
                </header>


<br><br>
<div class="title">
    <center>   <h1>Let's Keep in Touch</h1>
    <hr style="border-bottom: 3px solid #94bbe9; width: 50px;"></center>

</div>

<div class="grid">
    <div class="item1">
        <img src="public/img/contact.svg"  alt="">
    </div>
    <div class="item2">
    <!-- <center><h1>Reach to us</h1></center> -->

    <br><br>   
    <h3>Contact us</h3><br>
 
                                    <div class="form">
                                        
                                        <form action="contactus.php" method="POST">
                                            <h3 style="color:green;"><?php echo $output; ?></h3>
                                            <div class="input-field">
                                                <input id="Email" type="text" name="email" class="validate">
                                                <label for="Email">Email</label>
                                              </div>
                                              <div class="input-field">
                                                <input id="name"type="text" name="name" class="validate">
                    
                                                <label for="name">Name</label>
                                              </div>
                                              <div class="input-field">
                                              <textarea id="msg" name="msg" class="materialize-textarea"></textarea>
          <label for="msg">Message</label>
</div>
                                            <button name="submit" class="btn btn-primary">Submit</button>
                                          
                                        </form>
                                    </div>
    </div>
</div>

<br><br>
<!-- footer -->

<div class="footercolor">
    <br><br>
        <div class="footer">
                <div class="footergrid">
                    <div class="footer1">
                        <h3>Important Links</h3><br>
                        <ul>
                            <li><a href="#">Fill Registration Form</a></li>
                        </ul>
                        <h6>Rules & Regulation</h6>
                    </div>
                    <div class="footer2">
                        <h3>Developer</h3>
                        <ul><br>
                            <li><a href="#">Shyam Pandav</a></li>
                            <li><a href="#">Pavan Patil</a></li>
                        </ul>
                        <h6>Guidence</h6>
                        <a href="#">Rudragouda Patil</a>
                    </div>
                    <div class="footer3">
                        <h3>Reach to us</h3>
                        <div class="inlines">
                            <br>
                                <a href="#"><i class="fa fa-facebook" style="font-size:26px"></i></a>
                                &nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-linkedin" style="font-size:26px"></i></a>
                                &nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-twitter" style="font-size:26px"></i></a>                  
                        </div>
                       
                </div>
                
            </div>
            <br>
       
        </div>
</div>
        <div class="copyright" style="background: #5265cf;color: white">
                <center><h6>&copy; MITAOE 2019-20</h6></center>
        </div>
<!-- Footer End Here -->

    <!-- Block the Inscept Element -->

<script>
document.onkeydown=function(e){
    if(event.keyCode == 123){
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == "I".charAt(0)){
        alert("Sorry..");
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == "J".charCodeAt(0)){
        alert("Sorry..");
        return false;
    }
    if(e.ctrlKey && e.keyCode == "U".charCodeAt(0)){
        alert("Sorry for this..");
        return false;
    }
}
</script>

    <!-- End Here Inscept element -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  


<script>
$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.materialboxed').materialbox();
    $('.parallax').parallax();
    $('.tabs').tabs();
    $('.datepicker').datepicker();
    $('.carousel').carousel();

});
</script>
<script>

</script>
</body>
</html>