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
session_start();

// Unsetting cookie of session if any

$params = session_get_cookie_params();
setcookie(session_name(), '', 0, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));

// Unsetting session except for login

if (isset($_SESSION)){
    foreach($_SESSION as $key => $val)
    {
        if ($key !== 'login')
        {
            unset($_SESSION[$key]);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MITAOE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

</head>
<style>
    body {
        margin: 0;
        padding: 0;
        color: black;
    }
</style>

<body>
    <header>
        <nav class="nav-wrapper transparent" id="mainNav">
            <div class="container">
                <a href="#" class="brand-logo" style="color: black;">MITAOE</a>
                <a href="#" class="sidenav-trigger" data-target="mobile-menu">
                    <i class="material-icons" style="color: black;">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="teacher_index.php" style="color: black;">Home</a></li>
                    <li><a href="#" style="color: black;">About us</a></li>
                    <li><a href="logout.php" style="color: black;">Logout</a></li>


                </ul>

                <ul class="sidenav gray lighten-2" id="mobile-menu">
                    <li><a href="teacher_index.php">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>

            </div>
        </nav>
    </header>


    <br><br>


    <center>
        <h1>Create Form</h1>
    </center>

    <section style="margin-top: 50px;" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="checked_or_not.php">
                        <input type="text" name="company_name" id="" placeholder="Enter Company Name" required>
                        <input type="text" name="company_description" id="" placeholder="Company Description..." required>
                        <div class="card">
                            <div class="card-body">
                                <label><input type="checkbox" value="BasicDetails" name="basicDetails" checked/>
                                    <span>Basic Detail</span>
                            </label>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <label><input type="checkbox" value="CommunicationDetails" name="communicationDetails"/>
                                <span>Communication Detail</span>
                            </label>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <label><input type="checkbox" value="EducationalDetails" name="educationalDetails"/>
                                <span>Educational Detail</span>
                            </label>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <label><input type="checkbox" value="InternshipDetail" name="internshipDetail"/>
                                <span>Internship Detail</span>
                            </label>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <label><input type="checkbox" value="PersonalSkill" name="personalSkill"/>
                                <span>Personal Skills</span>
                            </label>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <label><input type="checkbox" value="ProjectDetail" name="projectDetail"/>
                                <span>Projects Detail</span>
                            </label>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <label><input type="checkbox" value="AwardsAndAchievment" name="awardsAndAchievment"/>
                                <span>Awards and Achivement</span>
                            </label>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <label><input type="checkbox" value="Certificate" name="certificate"/>
                                <span>Certificate</span>
                            </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <input name="submit" type="submit" class="btn btn-success" value="Create Form">
                        </div>
                        <!-- form element -->
                    </form>
                </div>
            </div>
        </div>

    </section>

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
                &copy; 2019 <a href="#">MITAOE</a>
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

    <!-- <script type="text/javascript" src="particles.js"></script>
    <script type="text/javascript" src="app.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('.materialboxed').materialbox();
            $('.parallax').parallax();
            $('.tabs').tabs();
            $('.datepicker').datepicker();
        });
        // Prevent user to submit form on hit enter
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
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

