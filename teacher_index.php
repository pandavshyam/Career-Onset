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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>MITAOE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width: 320px) and (max-device-width: 500px)" href="css/mobile.css" />
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width: 501px)" href="css/main.css" />

    <link href="public/css/teacher_index.css" rel="stylesheet">

</head>

<body>
    <header>
        <nav class="nav-wrapper transparent" id="mainNav">
            <div class="container">
                <a href="index.php" class="brand-logo" style="color:black">MITAOE</a>
                <a href="#" class="sidenav-trigger" data-target="mobile-menu">
                    <i class="material-icons" style="color: black;">menu</i>
                </a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="teacher_index.php">Home</a></li>
                    <li><a href="teacher_form_creation.php">Create Form</a></li>
                    <li><a href="register_form_submission.php">View Submission</a></li>
                    <li><a href="addcolobrator.php">Add Collaborator</a></li>
                    <li><a href="logout.php">Logout</a></li>


                </ul>

                <ul class="sidenav gray lighten-2" id="mobile-menu">
                    <li><a href="teacher_index.php">Home</a></li>
                    <li><a href="teacher_form_creation.php">Create Form</a></li>
                    <li><a href="register_form_submission.php">View Submission</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>

            </div>
        </nav>
        <div class="teach">
            <div class="grid">
                <div class="item1"><br><br>
                    <h1>Welcome to MITAOE Placement Portal</h1>
                    <br><br>
                    <div class="view">
                        <a href="register_form_submission.php"><button>View Submission</button></a>
                    </div>
                </div>
                <div class="item2">
                    <img src="public/img/t.png" alt="">
                </div>
            </div>
        </div>

    </header>

    <br><br>
    <center>
        <h1 style="font-size: 35px;">Important Steps</h1>
        <hr style="border-bottom:3px solid blue; width:50px;">
    </center>
    <br><br>
    <div class="stepgrid">

        <div class="itm1">
            <a href="teacher_form_creation.php" style="text-decoration: none; color: black;">
                <center><img src="public/img/regi.png" class="responsive-img" width="150px;" alt=""></center>
                <center>
                    <h2>Create form</h2>
                </center>
                <center><span>First of all you create a form for the Student. Student will fill this form accodeing to the Criteria of the Company.</span></center>
            </a>
        </div>
        <div class="itm2">
            <center><img src="public/img/share.png" class="responsive-img" width="150px;" alt=""></center>
            <center>
                <h2>Share With Student</h2>
            </center>
            <center><span>Share the Form with the Stduent. Student will fill this form accodeing to the Criteria of the Company.</span></center>
        </div>
        <div class="itm3">
            <center><img src="public/img/recive.png" class="responsive-img" width="150px;" alt=""></center>
            <center>
                <h2>Recieve Forms</h2>
            </center>
            <center><span>Recieve the form froms the Student. See the Forms According to the Company</span></center>
        </div>
    </div>
    <br><br>

    <center>
        <h1 style="font-size: 35px;">Submissions</h1>
        <hr style="border-bottom:3px solid #e75480;width:50px;">
    </center><br><br>
    <div class="submissiongrid">
        <div class="it1">
            <center>
                <h4>Register form Submissions</h4>
                <br><br>
                <button onclick="location.href = 'register_form_submission.php';">View Submission</button></center>
        </div>
        <div class="it2">
            <center>
                <h4>Company Wise Submissions</h4>
                <br><br>
                <button onclick="location.href = 'view_company_teacher.php';">View Submission</button></center>
        </div>
    </div>



    <br><br>
    <br>
    <div class="guide">
        <center>
            <h1 style="font-size: 35px;">How it Works</h1>
            <hr style="border-bottom:3px solid #e75480;width:50px;">
        </center><br><br>
        <div class="grids">
            <div class="item1">
                <iframe src="https://www.youtube.com/embed/LVjqAvyAVTk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="item2">
                <h2>Guidence to Create a Form</h2>
                <br>
                <span>Here is the Quick guidence to create a form where is define how to create a form.Here is the Quick guidence to create a form where is define how to create a form.Here is the Quick guidence to create a form where is define how to create a form.Here is the Quick guidence to create a form where is define how to create a form.</span>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="main.js"></script>

    <br>
    <!-- footer -->

    <footer class="page-footer grey darken-3">
        <div class="container">
            <div class="row">
                <div class="col s12 l6">
                    <h5>About Site</h5>
                    <p>This Site is useful for the student in MITAOE About their Placement Activities.</p>

                </div>

            </div>
        </div>
        <div class="footer-copyright grey darken-4">
            <div class="container center-align">
                &copy; 2019 <a href="http://tpcorporation.epizy.com/">MITAOE</a>
            </div>
        </div>
    </footer>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function() {
            $('.slider').slider();
        });
    </script>

    <script type="text/javascript" src="particles.js"></script>
    <script type="text/javascript" src="app.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('.materialboxed').materialbox();
            $('.parallax').parallax();
            $('.tabs').tabs();
            $('.datepicker').datepicker();

        });
    </script>
</body>

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
