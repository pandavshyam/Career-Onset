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
    session_start();
    $stmt = $conn->prepare("select * from company_details");
    $stmt->execute();
    $result = $stmt->get_result();
    // $rows = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
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

    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="public/css/view_company_teacher.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="nav-wrapper transparent" id="mainNav">
            <div class="container">
                <a href="index.php" class="brand-logo" style="color:black;">MITAOE</a>
                <a href="#" class="sidenav-trigger" data-target="mobile-menu">
                    <i class="material-icons" style="color: black;">menu</i>
                </a>
                <ul class="right hide-on-med-and-down" style="font-family: 'Roboto', sans-serif;">
                    <li><a href="teacher_index.php">Home</a></li>
                    <li><a href="teacher_form_creation.php">Create Form</a></li>
                    <li><a href="register_form_submission.php">View Submission</a></li>
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
    </header>

    <div class="search">
        <br>
        <div class="">
            <div class="form">
                <form action="" method="post">
                    <div class="formgrid">
                        <div class="itm1">
                            <div class="input-field col s6">
                                <i class="material-icons prefix">search</i>
                                <input id="icon_prefix" type="text" class="validate">
                                <label for="icon_prefix">Search Company</label>
                            </div>
                        </div>
                        <div class="itm2">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <br><br>
        </div>
    </div>

    <div class="companygrid">
<?php
    if ($result->num_rows > 0){
        while ($rows = $result->fetch_assoc()){
            ?>
            <div class="item">
                <div class="company2">
                    <div class="row">
                        <div class="col s12 m7">
                            <div class="card" style="width:400px;">
                                <div class="card-image">
                                    <img height="200px;" src="public/img/infosys.jpg">
                                </div>
                                <div class="card-content">
                                    <h4><?php echo $rows['company_name'];?></h4>
                                    <p style="height: 70px; overflow-y : scroll;"><?php echo $rows['company_description'];?></p>
                                </div>
                                <div class="card-action">
                                <button class="btn btn-primary"><a style="color:white" href="http://localhost/Web/Placement_project/Placement_Project/teacher_company_submissions.php?cn=<?php echo base64_encode($rows['company_name']);?>">View Submissions</a></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        <?php
        }
    }
?>
    </div>

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
                &copy; 2019 <a href="">MITAOE</a>
            </div>
        </div>
    </footer>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>


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
