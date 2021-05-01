<?php
    if(isset($_COOKIE['sid'])){
        require 'API/db.php';

        $sql = "select sid,type from session where sid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$_COOKIE['sid']);
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($row['type'] == "Teacher"){
                
?>

<?php 
    require_once 'API/db.php';
    if(isset($_POST['submit'])){
        $arrayEmail =  $_POST['email'];
        for ($i=0; $i < count($arrayEmail); $i++){
            $try = "$arrayEmail[$i]";
            $stmt = $conn->prepare("insert into collaborators (email) values (?)");
            $stmt->bind_param("s",$try);
            $stmt->execute();
        }
        // foreach($arrayEmail as $toEmail){
           
        //     $setPassLink = 'http://localhost:8080/placementportal/setpass.php?fp_code='.base64_encode($toEmail);
        //     $to = $toEmail;
        //     $subject = "MITAOE Placement Cell SET Password";
        //     $mailContent = 'Dear Sir, 
        //     You have Added has a Collabrator to the MITAOE Placement Cell. Please Set your Password by Clicking the Following Link
        //     <a href="'.$setPassLink.'">'.$setPassLink.'</a>
        //     <br/><br/>Regards,
        //     <br/>MITAOE Placement Cell';
        //     //set content-type header for sending HTML email
        //     $headers = "MIME-Version: 1.0" . "\r\n";
        //     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //     //additional headers
        //     $headers .= 'From: patilpavan631@gmail.com' . "\r\n";
        //     //send email
        //     mail($to,$subject,$mailContent,$headers);
        //     echo "<script>alert('Collbrator added Sucessfully')</script>";
        // }
      
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MITAOE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="public/css/addcolobrator.css">
</head>


<body>
    <header>
        <nav class="nav-wrapper transparent" id="mainNav">
            <div class="container">
                <a href="#" class="brand-logo" style="color:black;">MITAOE</a>
                <a href="#" class="sidenav-trigger" data-target="mobile-menu">
                    <i class="material-icons" style="color: black;">menu</i>
                </a>
                <ul class="right hide-on-med-and-down" style="font-family: 'Roboto', sans-serif;">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#contact">Contact us</a></li>
                    <li><a href="login.html">Login</a></li>


                </ul>

                <ul class="sidenav gray lighten-2" id="mobile-menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#contact">Contact us</a></li>
                    <li><a href="login.html">Login</a></li>

                </ul>

            </div>
        </nav>
    </header>
    <br><br>
    <div class="addcollebrator">
        <center>
            <h1>Add collaborators</h1>
            <hr style="border-bottom: 3px solid #94bbe9; width: 50px;">
        </center>

        <section style="margin-top: 50px;" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form class="contact__form" method="POST" action="addcolobrator.php">
                            <div class="card">
                                <div class="card-body">
                                    <h3 style="color: blue;"><b>Fill collaborators Detail</b></h3>
                                    <div class="appd" id="appd">
                                        <div class="row" id="row">
                                            <div class="input-field col s6">
                                                <input id="email" name="email[]" type="email" class="" required aria-required="true">
                                                <label for="email">Email Id</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <a id="aw" onclick="q();" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <center><button style="width:150px;" name="submit" class="btn btn-primary">submit</button></center>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

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
                            <a href="#"><i class="fa fa-facebook" style="font-size:26px"></i></a> &nbsp;&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-linkedin" style="font-size:26px"></i></a> &nbsp;&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-twitter" style="font-size:26px"></i></a>
                        </div>

                    </div>

                </div>
                <br>

            </div>
        </div>
        <div class="copyright" style="background: #5265cf;color: white">
            <center>
                <h6>&copy; MITAOE 2019-20</h6>
            </center>
        </div>
        <!-- Footer End Here -->
</body>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    function q() {

        var div = document.createElement("div");
        div.innerHTML = '<div class="row" id="removes">' +
            '<div class="input-field col s6">' +
            '<input id="email" name="email[]" type="email" class="" required aria-required="true">' +
            '<label for="email">Email Id</label>' +
            '</div>' +
            '<div class="input-field col s6">' +
            '<a id="aw2" onclick="rem();" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">close</i></a>' +
            '</div>' +
            '</div>';
        b = document.getElementById("appd");
        b.appendChild(div);
    }

    function rem() {
        var ele = document.getElementById('removes');
        ele.parentNode.removeChild(ele);
    }
</script>

</html>

<?php
            }
            else
            {
                header("refresh:0;url=error.html");
            }
        }
        else
        {
            header("refresh:0;url=error.html");
        }
    }
    else
    {
        header("refresh:0;url=error.html");
    }
?>
