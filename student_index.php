<?php
    if(isset($_COOKIE['sid'])){
        require 'API/db.php';

        $sql = "select sid,type from session where sid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$_COOKIE['sid']);
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($row['type'] == "Student"){
                
?>
<?php
    require 'API/db.php';

    $stmt = $conn->prepare("select company_name,company_description,url from company_details");
    $stmt->execute();
    $result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>MITAOE</title>
    <link rel="shortcut icon" href="img/logo-color-1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width: 320px) and (max-device-width: 500px)" href="css/mobile.css" />
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width: 501px)" href="css/main.css" />
    <!-- Files for the Courserl -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Files end here -->
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="public/css/student_index.css">
</head>


<body oncontextmenu="return false;">

    <header>
        <nav class="nav-wrapper transparent" id="mainNav">
            <div class="container">
                <a href="index.php" class="brand-logo" style="color:black;">MITAOE</a>
                <a href="#" class="sidenav-trigger" data-target="mobile-menu">
                    <i class="material-icons" style="color: black;">menu</i>
                </a>
                <ul class="right hide-on-med-and-down" style="font-family: 'Roboto', sans-serif;">
                    <li><a style="font-size: 14px;" href="student_index.php">Home</a></li>
                    <li><a style="font-size: 14px;" href="student_profile.php">Profile</a></li>
                    <li> <a style="font-size: 14px;" class="modal-trigger" href="#modal1">Notification</a></li>


                    <li><a style="font-size: 14px;" href="logout.php">Logout</a></li>


                </ul>

                <ul class="sidenav gray lighten-2" id="mobile-menu">
                    <li><a href="student_index.php">Home</a></li>
                    <li><a href="student_profile.php">Profile</a></li>
                    <li> <a class="modal-trigger" href="#modal1">Notification</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul>

            </div>
        </nav>


        <div class="headergrid">
            <div class="header1">
                <center>
                    <h2>Welcome to MITAOE Placement Portal</h2>
                    <br>
                    <button><a href="registrationForm1HTML.php" style="color: black;">Fill the Form</a></button>

                </center>
            </div>
            <div class="header2">
                <img src="public/img/headerbackgroud.svg" width="700px;" class="responsive-img" alt="">
            </div>
        </div>

    </header>


    <!-- Modal Trigger -->


    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Notification</h4>
            <p>No New Notification</p>

            <img src="public/img/notification.png" height="220px" alt="">
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close btn btn-primary">Close</a>
        </div>
    </div>


    <!-- Steps by Step Guide -->
    <div class="steps">
        <center>
            <h1>Steps for Apply</h1>
            <hr style="border-bottom:3px solid #4d4dcb;width: 50px;">
        </center>

        <br>
        <div class="stepgrid">
            <div class="step1">
                <center>
                    <a href="registrationForm1HTML.php"><img src="public/img/register.png" width="200px;" class="responsive-img" alt=""></a>
                </center>
                <center>
                <a href="registrationForm1HTML.php"> <h3>1.Fill the Registration Form</h3></a>
                    <span>It is Mandatory to fill the form for apply for the company. It is compulsary to have an all the document for fill the form.</span>
                </center>
                <!-- <span>It is Mandotory to fill the form to apply for the Company</span> -->
            </div>
            <div class="step2">
                <center>
                    <a href="view_company_student.php"><img src="public/img/search.jpg" width="200px;" class="responsive-img" alt=""></a>
                </center>
                <center>
                <a href="view_company_student.php"><h3>2.Search for Company</h3></a>
                    <span>Search the company to apply for the Job. You should search the company based on the differnt criteria</span>

                </center>
                <!-- <span>Search for the Specific Comapany. That should come in College and apply for the job</span> -->
            </div>
            <div class="step3" style="width:90%">
                <center>
                    <a href="view_company_student.php"><img src="public/img/apply1.png" width="250px;" class="responsive-img" alt=""></a>
                </center>
                <a href="view_company_student.php"> <h3>3.Apply</h3></a>
                <span >It is Mandatory to fill the form for apply for the company.</span>

                <!-- <span>Apply for the Job</span> -->
            </div>
        </div>


    </div>
    <br>

    <div class="imagediv">

    </div>

    <br><br>
    <center>
        <div class="fillform">
            <center>
                <h4>It is Mandatory to fill the Registration form first to apply for the Company Please click on below button to fill the form and Apply</h4>
                <br>
                <a href="registrationForm1HTML.php"><button>FILL FORM</button></a>

            </center>
        </div>
    </center>

    <br><br><br>
    <!-- Slider for The Place Student  -->
    <div class="demo">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2 style=" text-transform: uppercase;">Campus update</h2>
                <hr style="border-bottom: 3px solid #94bbe9; width: 50px;">
            </center>

            <div id="testimonial-slider" class="owl-carousel">
                <?php
                        if ($result->num_rows > 0){
                            while ($rows = $result->fetch_assoc()){
                            ?>
                    <div class="testimonial">
                        <div class="card" style="width: 30rem;">
                            <center><img src="public/img/c1.gif" class="card-img-top" alt="..."></center>
                            <div class="title">
                                <center>
                                    <h2>
                                        <?php echo $rows['company_name'];?>
                                    </h2>
                                </center>
                            </div>
                            <div class="card-body">
                                <p style="height: 70px; overflow-y : scroll;hover:text-decoration:none;" class="card-text">
                                    <?php echo $rows['company_description'];?>
                                </p>
                            </div><br>
                            <div class="button">
                                <center><button class="btn wow fadeInUp"><a style="color:white;" href="<?php echo $rows['url'];?>">Register</a></button></center>
                            </div>
                            <br>
                        </div>
                        <br>
                    </div>

                    
                    <?php
                            }
                        }
                    ?>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- End here -->
    <br>
    <br>
    <center>
                        <h2 style=" text-transform: uppercase;">Our Alumuni</h2>
                        <hr style="border-bottom: 3px solid #94bbe9; width: 50px;">
                    </center>
    <div class="testimonial_slider_2">
        <input type="radio" name="slider_2" id="slide_2_1" checked />
        <input type="radio" name="slider_2" id="slide_2_2" />
        <input type="radio" name="slider_2" id="slide_2_3" />
        <input type="radio" name="slider_2" id="slide_2_4" />
        <div class="boo_inner clearfix">
            <div class="slide_content">
                <div class="inner">
                    <div class="cols">
                        <div class="testimonial">
                            <center> <img src="public/img/profile.jfif" alt=""></center>
                            <center>
                                <div class="name">Shyam Pandav</div>
                            </center>
                            <div class="stars">
                                <center> B.tech IT</center>
                            </div>

                            <p>
                                Throughout my 4 years of engineering at 'MIT Academy of Engineering', I had countless opportunities to develop analytical skills, leadership and proactive thinking through various programs and events.
                            </p>
                        </div>
                    </div>

                    <div class="cols" id="sec">
                        <div class="testimonial">
                        <center> <img src="public/img/profile.jfif" alt=""></center>
                            <center>
                                <div class="name">Pavan Patil</div>
                            </center>
                            <div class="stars">
                                <center> B.tech IT</center>
                            </div>

                            <p>
                                Throughout my 4 years of engineering at 'MIT Academy of Engineering', I had countless opportunities to develop analytical skills, leadership and proactive thinking through various programs and events.
                            </p>
                        </div>
                    </div>
                    <div class="cols" id="thi">
                        <div class="testimonial">
                        <center> <img src="public/img/profile.jfif" alt=""></center>
                            <center>
                                <div class="name">Sarvesh Pathak</div>
                            </center>
                            <div class="stars">
                                <center> B.tech IT</center>
                            </div>

                            <p>
                                Throughout my 4 years of engineering at 'MIT Academy of Engineering', I had countless opportunities to develop analytical skills, leadership and proactive thinking through various programs and events.
                            </p>
                        </div>
                    </div>

                </div>
            </div>



            <div class="slide_content">
                <div class="inner">
                    <div class="cols">
                        <div class="testimonial">
                        <center> <img src="public/img/profile.jfif" alt=""></center>
                            <center>
                                <div class="name">Nishad Patil</div>
                            </center>
                            <div class="stars">
                                <center> B.tech IT</center>
                            </div>

                            <p>
                                Throughout my 4 years of engineering at 'MIT Academy of Engineering', I had countless opportunities to develop analytical skills, leadership and proactive thinking through various programs and events.
                            </p>
                        </div>
                    </div>

                    <div class="cols" id="sec">
                        <div class="testimonial">
                        <center> <img src="public/img/profile.jfif" alt=""></center>
                            <center>
                                <div class="name">Kunal Koli</div>
                            </center>
                            <div class="stars">
                                <center> B.tech IT</center>
                            </div>

                            <p>
                                Throughout my 4 years of engineering at 'MIT Academy of Engineering', I had countless opportunities to develop analytical skills, leadership and proactive thinking through various programs and events.
                            </p>
                        </div>
                    </div>
                    <div class="cols" id="thi">
                        <div class="testimonial">
                        <center> <img src="public/img/profile.jfif" alt=""></center>
                            <center>
                                <div class="name">Pratap Patil</div>
                            </center>
                            <div class="stars">
                                <center> B.tech IT</center>
                            </div>

                            <p>
                                Throughout my 4 years of engineering at 'MIT Academy of Engineering', I had countless opportunities to develop analytical skills, leadership and proactive thinking through various programs and events.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div id="controls">
            <label for="slide_2_1"></label>
            <label for="slide_2_2"></label>

        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            pagenum = 1;

            function AutoRotate() {
                var myele = null;
                var allElements = document.getElementsByTagName('label');
                for (var i = 0, n = allElements.length; i < n; i++) {
                    var myfor = allElements[i].getAttribute('for');
                    if ((myfor !== null) && (myfor == ('slide_2_' + pagenum))) {
                        allElements[i].click();
                        break;
                    }
                }
                if (pagenum == 4) {
                    pagenum = 1;
                } else {
                    pagenum++;
                }
            }
            setInterval(AutoRotate, 5000);
        });
    </script>

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
                        <a href="#"><i class="fa fa-facebook" style="font-size:26px"></i></a> &nbsp;&nbsp;&nbsp;
                        <a href="#"><i class="fa fa-linkedin" style="font-size:26px"></i></a> &nbsp;&nbsp;&nbsp;
                        <a href="#"><i class="fa fa-twitter" style="font-size:26px"></i></a>
                    </div>

                </div>

            </div>
            <br>

        </div>
        <div class="copyright" style="background: #5265cf;color: white">
            <center>
                <h6>&copy; MITAOE 2019-20</h6>
            </center>
        </div>
    </div>

    <!-- Footer End Here -->
    <!-- Block the Inscept Element -->

    <script>
        document.onkeydown = function(e) {
            if (event.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == "I".charAt(0)) {
                alert("Sorry..");
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == "J".charCodeAt(0)) {
                alert("Sorry..");
                return false;
            }
            if (e.ctrlKey && e.keyCode == "U".charCodeAt(0)) {
                alert("Sorry..");
                return false;
            }
        }
    </script>

    <!-- End Here Inscept element -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<!-- It can be end Here -->
<script>
    $(document).ready(function() {
        $('.sidenav').sidenav();
        $('.materialboxed').materialbox();
        $('.parallax').parallax();
        $('.tabs').tabs();
        $('.datepicker').datepicker();
        $('.modal').modal();

    });
</script>
<script>
    $(document).ready(function() {
        $('#car2').hide();
        $('#next').click(function() {
            $('#car2').hide();
            $('#car1').show();

        });
        $('#prev').click(function() {
            $('#car2').hide();
            $('#car1').show();
        });
    });
</script>
<!-- Jquery code for the textamonail code -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>


<script>
    $(document).ready(function() {
        $("#testimonial-slider").owlCarousel({
            items: 3,
            itemsDesktop: [1000, 3],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 2],
            itemsMobile: [650, 1],
            pagination: true,
            autoPlay: true
        });
    });
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
