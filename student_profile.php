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

<html>

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
    <link rel="stylesheet" href="public/css/student_profile.css">
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
                    <li><a href="student_index.php">Home</a></li>
                    <li><a href="student_profile.php">Profile</a></li>
                    <li> <a class="modal-trigger" href="#modal1">Notification</a></li>


                    <li><a href="logout.php">Logout</a></li>


                </ul>

                <ul class="sidenav gray lighten-2" id="mobile-menu">
                    <li><a href="student_index.php">Home</a></li>
                    <li><a href="student_profile.php">Profile</a></li>
                    <li> <a class="modal-trigger" href="#modal1">Notification</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul>

            </div>
        </nav>

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

    <div class="sgrid">

        <div class="itm1">
            <br><br>
            <center>
                <img class="responsive-img circle z-depth-5" width="100" src="public/img/profile.jfif" alt="">
                <br><br>
                <h2>Shyam Pandav</h2>
                <span>B.Tech IT</span>
                <br><br>
                <ul><br>
                    <center>
                        <li><a href="#" title="Click here to see Profile" id="profile1">Profile</a></li>
                    </center> <br>
                    <center>
                        <li><a href="#" title="Click here to Change Password" id="pass">Change Password</a></li>
                    </center><br>
                    <center>
                        <li><a href="#" title="Click here to Show Submitted Applications" id="app">Applications</a></li>
                    </center><br>

                </ul>
            </center>
        </div>
        <div class="itm2">
            <div class="profile" id="profile">
                <center>
                    <h1>Profile</h1>
                </center>
                <br><br>
                <div class="name">
                    <h5>PRN</h5>
                    <span>0220924</span>
                    <br><br>
                    <h5>Name</h5>
                    <span>Shyam Pandav</span>
                    <br><br>
                    <h5>Email-Address</h5>
                    <span>pavanp@mitaoe.ac.in</span>
                    <br><br>
                    <h5>School Name</h5>
                    <span>School of Computer Engineering</span>
                    <br><br>
                    <h5>Block</h5>
                    <span>B6</span>
                </div>

            </div>


            <br><br>
            <div class="changepass" id="changepass">
                <br><br>
                <center>
                    <h2>Change Password</h2>
                </center>
                <div class="form">
                    <div class="input-field col s6">
                        <input id="cpassword" name="cpassword" type="text" class="">
                        <label for="cpassword">Current Password</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="newpassword" name="newpassword" type="text" class="" required aria-required="true">
                        <label for="newpassword">New Password</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="newpassword" name="newpassword" type="text" class="" required aria-required="true">
                        <label for="newpassword">Confirm New Password</label>
                    </div>

                    <button class="btn btn-primary">Change</button>
                </div>
                <br><br><br>
            </div>
            <div class="application" id="application">
                <center>
                    <h2>Submitted Applications</h2>
                </center>

                <br>
                <center> <img class="responsive-img" src="img/notification.png" alt=""></center>
                <br>
                <center><span>Not Yet Applied</span></center>
            </div>
        </div>




    </div>
</body>



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
        $('.modal').modal();

    });
</script>

<script>
    $(document).ready(function() {
        $('#changepass').hide();
        $('#application').hide();


        $('#pass').click(function() {
            $('#changepass').show(1000);
            $('#profile').hide();
            $('#application').hide();
        });

        $('#profile1').click(function() {
            $('#profile').show(1000);
            $('#changepass').hide();
            $('#application').hide();
        });

        $('#app').click(function() {
            $('#application').show(1000);
            $('#profile').hide();
            $('#changepass').hide();
        });


    });
</script>
<script>
    $(document).ready(function() {
        $('.sidenav').sidenav();
        $('.materialboxed').materialbox();
        $('.parallax').parallax();
        $('.tabs').tabs();
        $('.datepicker').datepicker();

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

