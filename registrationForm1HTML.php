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
    session_start();
    $photoError = $success =  "";
    if (isset($_SESSION['photoError'])){
        $photoError = $_SESSION['photoError'];
        unset($_SESSION['photoError']);
    }
    if (isset($_SESSION['success'])){
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MITAOE</title>

    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="public/css/registrationForm1HTML.css">
</head>

<body>
    <header>
        <nav class="nav-wrapper transparent" id="mainNav">
            <div class="container">
                <!-- <img src="img/logo-color-1.png" alt="" width="250px" height="60px;"> -->
                <a href="index.php" class="brand-logo" style="color: blue;"><b>MITAOE</b></a>
                <a href="#" class="sidenav-trigger" data-target="mobile-menu">
                    <i class="material-icons" style="color: black;">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="logout.php">Logout</a></li>


                </ul>

                <ul class="sidenav gray lighten-2" id="mobile-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About us</a></li>
                    li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <br>
    <div class="contact">
        <center>
            <h1><b>Registration Form</b></h1>
            <h5 style="color: red;"><?php echo $success;?></h5>
        </center>
        <!-- ajax contact form -->
        <section style="margin-top: 50px;" id="contact">
            <div class="container">
                <form class="contact__form" method="POST" action="registrationForm.php" autocomplete="off">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            <div class="card">
                                <div class="card-body">
                                    <h3 style="color: blue;"><b>Basic Detail</b></h3>
                                    <!-- form element -->
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input name="prn" id="prn" type="text" class="validate" maxlength="10">
                                                    <label for="prn">PRN</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <select id='salutation' class="btn blue darken-1" name="salutation" style="color: white;">
                                                        <option value="" disabled selected style="color: white">Salutation</option>
                                                        <option value="Mr">Mr.</option>
                                                        <option value="Ms">Ms.</option>
                                                        <option value="Mrs">Mrs.</option>
                                                        <option value="Miss">Miss.</option>
                                                    </select>
                                                </div>
                                                <div class="input-field col s6">
                                                    <select id='branch' class="btn blue darken-1" name="branch" style="color: white;">
                                                        <option value="" disabled selected style="color: white">School</option>
                                                        <option value="SCET">SCHOOL OF COMPUTER ENGINEERING</option>
                                                        <option value="SEE">SCHOOL OF ELECTRICAL ENGINEERING</option>
                                                        <option value="SMCE">SCHOOL OF MECH & CIVIL ENGINEERING</option>
                                                        <option value="SCE">SCHOOL OF CHEMICAL ENGINEERING</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input id="firstname" name="firstname" type="text" class="">
                                                    <label for="firstname">First Name</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="lastname" name="lastname" type="text" class="">
                                                    <label for="lastname">Last Name</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input id="fathername" name="fathername" type="text" class="">
                                                    <label for="fathername">Father Name</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="mothername" name="mothername" type="text" class="">
                                                    <label for="mothername">Mother Name</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <select id='gender' class="btn blue darken-1" name="gender" style="color: white;">
                                                        <option value="" disabled selected style="color: black">Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="dob" type="text" class="datepicker" name="dob">
                                                    <label for="dob">DOB</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s12" id="uphoto">
                                                    <label class="custom-file-upload" id="photo" for="myphoto">
                                                        <a class="btn blue darken-1"><input style="display: none;" id="myphoto" type="file" accept=".png, .jpg, .jpeg" name="userPhoto"><p id='myfilephoto' style="color: white;">Upload Photo</p></a>
                                                    </label>
                                                
                                                </div>
                                            </div><br><br><br>
                                            <img id="image_upload_preview" src="" alt="your image" width="150" height="150" />
                                            <div style="color: red;"><?php echo $photoError;?></div>
                                        </div>
                                    </div>
                                    <!-- end form element -->


                                </div>
                            </div>


                            <!-- Communication Detatil -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 title="Click Here to fill the Communication Details" id="comm" style="color: blue;"><b>Communication Detail</b></h3>
                                    <!-- form element -->
                                    <div class="row" id="commu"><br>
                                        <div class="col s12">
                                            <br>
                                            <h5 style="color: blue;">Present Address</h5>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input name="presentaddress" id="presentaddress" type="text" class="validate">
                                                    <label for="presentaddress">Address Line 1</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input name="pcountry" id="pcountry" type="text" class="validate" value="INDIA">
                                                    <label for="pcountry">Country</label>

                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="pstate" id="pstate" type="text" class="validate" value="MAHARASHTRA">
                                                    <label for="pstate">State</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="pcity" id="pcity" type="text" class="validate" value="PUNE">
                                                    <label for="pcity">City</label>
                                                </div>
                                            </div>

                                            <h5 style="color: blue;">Permanent Address</h5>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input name="permanentaddress" id="permanentaddress" type="text" class="validate" aria-required="true">
                                                    <label for="permanentaddress">Address Line 1</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input name="ppcountry" id="ppcountry" type="text" class="validate" aria-required="true">
                                                    <label for="ppcountry">Country</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="ppstate" id="ppstate" type="text" class="validate" aria-required="true">
                                                    <label for="ppstate">State</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="ppcity" id="ppcity" type="text" class="validate" aria-required="true">
                                                    <label for="ppcity">City</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input name="mobilenumber1" id="mobilenumber1" type="text" class="validate" maxlength="10">
                                                    <label for="mobilenumber1">Mobile Number 1</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="mobilenumber2" id="mobilenumber2" type="text" class="validate" maxlength="10">
                                                    <label for="mobilenumber2">Mobile Number 2</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input name="pemail" id="pemail" type="email" class="validate">
                                                    <label for="pemail">Personal Email</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="cemail" id="cemail" type="email" class="validate">
                                                    <label for="cemail">College Email</label>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- end form element -->

                                    </div>
                                </div>
                            </div>
                            <!-- Educational Detail -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 id="eduu" title="Click here to Fill the Educational Detail" style="color: blue;"><b>Educational Detail</b></h3>
                                    <!-- form element -->
                                    <div class="row" id="edu">
                                        <div class="col s12">
                                            <h5 style="color: blue;">&nbsp;Details of Examination Passed</h5>
                                            <div class="row">
                                                <table class="responsive-table">
                                                    <thead>
                                                        <tr class="heading">
                                                            <th scope="col" style="text-align: center;">Examination</th>
                                                            <th scope="col" style="text-align: center;">Institution</th>
                                                            <th scope="col" style="text-align: center;">Year of Commencement</th>
                                                            <th scope="col" style="text-align: center;">Year of Passing</th>
                                                            <th scope="col" style="text-align: center;">Class/Division</th>
                                                            <th scope="col" style="text-align: center;">%Marks</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <th style="text-align: center;" scope="col">S.S.C.(X)</th>
                                                            <td><input type="text" id="" name="institutionssc" placeholder="Institution"></td>
                                                            <td><input type="text" id="" name="yocssc" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="yopssc" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="classssc" placeholder="Class/Division"></td>
                                                            <td><input type="text" id="" name="perssc" placeholder="%Marks" maxlength="8"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center;"><b>H.S.C.(XII)</b></td>
                                                            <td><input type="text" id="" name="institutionhsc" placeholder="Institution"></td>
                                                            <td><input type="text" id="" name="yochsc" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="yophsc" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="classhsc" placeholder="Class/Division"></td>
                                                            <td><input type="text" id="" name="perhsc" placeholder="%Marks" maxlength="8"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center;"><b>Diploma</b></td>
                                                            <td><input type="text" id="" name="institutiondip" placeholder="Institution"></td>
                                                            <td><input type="text" id="" name="yocdip" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="yopdip" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="classdip" placeholder="Class/Division"></td>
                                                            <td><input type="text" id="" name="perdip" placeholder="%Marks" maxlength="8"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <h4 style="color: blue;">&nbsp;&nbsp;&nbsp;Details of Engineering</h4>
                                                <table class="responsive-table">
                                                    <thead>
                                                        <tr class="heading">
                                                            <th colspan="2" scope="col" style="text-align: center;">Year</th>
                                                            <th scope="col" style="text-align: center;">Institution</th>
                                                            <th scope="col" style="text-align: center;">Year of Commencement</th>
                                                            <th scope="col" style="text-align: center;">Year of Passing</th>
                                                            <th scope="col" style="text-align: center;">Class/Division</th>
                                                            <th scope="col" style="text-align: center;">%Marks</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td rowspan="2"><b>FY</b></td>
                                                            <td>I Semester</td>
                                                            <td><input type="text" id="" name="institutionfysem1" placeholder="Institution" value="MITAOE"></td>
                                                            <td><input type="text" id="" name="yocfysem1" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="yopfysem1" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="classfysem1" placeholder="Class/Division"></td>
                                                            <td><input type="text" id="" name="perfysem1" placeholder="%Marks" maxlength="8"></td>
                                                        </tr>
                                                        <tr class="">

                                                            <td>II Semester</td>
                                                            <td><input type="text" id="" name="institutionfysem2" placeholder="Institution" value="MITAOE"></td>
                                                            <td><input type="text" id="" name="yocfysem2" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="yopfysem2" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="classfysem2" placeholder="Class/Division"></td>
                                                            <td><input type="text" id="" name="perfysem2" placeholder="%Marks" maxlength="8"></td>
                                                        </tr>

                                                        <tr class="">
                                                            <td rowspan="2"><b>SY</b></td>
                                                            <td>I Semester</td>
                                                            <td><input type="text" id="" name="institutionsysem1" placeholder="Institution" value="MITAOE"></td>
                                                            <td><input type="text" id="" name="yocsysem1" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="yopsysem1" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="classsysem1" placeholder="Class/Division"></td>
                                                            <td><input type="text" id="" name="persysem1" placeholder="%Marks" maxlength="8"></td>
                                                        </tr>
                                                        <tr class="">

                                                            <td>II Semester</td>
                                                            <td><input type="text" id="" name="institutionsysem2" placeholder="Institution" value="MITAOE"></td>
                                                            <td><input type="text" id="" name="yocsysem2" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="yopsysem2" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="classsysem2" placeholder="Class/Division"></td>
                                                            <td><input type="text" id="" name="persysem2" placeholder="%Marks" maxlength="8"></td>
                                                        </tr>

                                                        <tr class="">
                                                            <td rowspan="2"><b>TY</b></td>
                                                            <td>I Semester</td>
                                                            <td><input type="text" id="" name="institutiontysem1" placeholder="Institution" value="MITAOE"></td>
                                                            <td><input type="text" id="" name="yoctysem1" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="yoptysem1" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="classtysem1" placeholder="Class/Division"></td>
                                                            <td><input type="text" id="" name="pertysem1" placeholder="%Marks" maxlength="8"></td>
                                                        </tr>
                                                        <tr class="">

                                                            <td>II Semester</td>
                                                            <td><input type="text" id="" name="institutiontysem2" placeholder="Institution" value="MITAOE"></td>
                                                            <td><input type="text" id="" name="yoctysem2" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="yoptysem2" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="classtysem2" placeholder="Class/Division"></td>
                                                            <td><input type="text" id="" name="pertysem2" placeholder="%Marks" maxlength="8"></td>
                                                        </tr>

                                                        <tr class="">
                                                            <td rowspan="2"><b>B.Tech</b></td>
                                                            <td>I Semester</td>
                                                            <td><input type="text" id="" name="institutionfinalsem1" placeholder="Institution" value="MITAOE"></td>
                                                            <td><input type="text" id="" name="yocfinalsem1" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="yopfinalsem1" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="classfinalsem1" placeholder="Class/Division"></td>
                                                            <td><input type="text" id="" name="perfinalsem1" placeholder="%Marks" maxlength="8"></td>
                                                        </tr>
                                                        <tr class="">

                                                            <td>II Semester</td>
                                                            <td><input type="text" id="" name="institutionfinalsem2" placeholder="Institution" value="MITAOE"></td>
                                                            <td><input type="text" id="" name="yocfinalsem2" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="yopfinalsem2" placeholder="Year" maxlength="4"></td>
                                                            <td><input type="text" id="" name="classfinalsem2" placeholder="Class/Division"></td>
                                                            <td><input type="text" id="" name="perfinalsem2" placeholder="%Marks" maxlength="8"></td>
                                                        </tr><br>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <h4 style="color: blue;">&nbsp;&nbsp;&nbsp;No of Backlogs</h4>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s2">
                                                    <select id='noOfBacklog' class="btn blue darken-1" name="noOfBacklog" style="color: white;">
                                                        <option value="" disabled selected style="color: black">No of Backlog</option>
                                                        <option value="0" selected>0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>



                                        </div>
                                    </div>

                                    <!-- end form element -->
                                </div>
                            </div>

                            <!-- Internship Detail -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 id="int" title="Click here to fill the Internship Detail" style="color: blue;"><b>Internship Detail</b></h3>
                                    <!-- form element -->
                                    <div class="row" id="intern">
                                        <div class="col s12" id="intern1"><br>
                                            <h5 style="color: blue;">&nbsp;Internship 1</h5>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input name="internship1cname" id="internship1cname" type="text" class="validate">
                                                    <label for="internship1cname">Name of the Industry</label>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <h5>&nbsp;&nbsp;&nbsp;Training Period</h5>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input name="internship1startdate" type="text" class="datepicker">
                                                    <label for="internship1startdate">Starting Date</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input name="internship1enddate" type="text" class="datepicker">
                                                    <label for="internship1enddate">End Date</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s6" id="">
                                                    <label class="custom-file-upload" id="" for="internship1certificate">
                                                        <a class="btn blue darken-1"><input style="display: none;" name="internship1certificate" id="internship1certificate" type="file" accept=".pdf, .jpg, .jpeg, .docx"><p id='internship1certificatep' style="color: white;">Upload Certificate</p></a>
                                                    </label>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <a class="btn blue darken-1" id='internshipdetailsadd' style="color: white;">Add another Internship Detail</a>
                                                </div>
                                            </div>




                                            <br>
                                            <div class="internship2div">
                                                <h5 style="color: blue;">&nbsp;Internship 2</h5>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input name="internship2cname" id="internship2cname" type="text" class="validate">
                                                        <label for="internship2cname">Name of the Industry</label>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <h5>&nbsp;&nbsp;&nbsp;Training Period</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input name="internship2startdate" type="text" class="datepicker">
                                                        <label for="internship2startdate">Starting Date</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input name="internship2enddate" type="text" class="datepicker">
                                                        <label for="internship2enddate">End Date</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12" id="">
                                                        <label class="custom-file-upload" id="" for="internship2certificate">
                                                        <a class="btn blue darken-1"><input style="display: none;" id="internship2certificate" name="internship2certificate" type="file" accept=".pdf, .jpg, .jpeg, .docx"><p id='internship2certificatep' style="color: white;">Upload Certificate</p></a>
                                                    </label>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <a class="btn blue darken-1" id='internshipdetailsadd1' style="color: white;">Add another Internship Detail</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="internship3div">
                                                <h5 style="color: blue;">&nbsp;Internship 3</h5>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input name="internship3cname" id="internship3cname" type="text" class="validate">
                                                        <label for="internship3cname">Name of the Industry</label>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <h5>&nbsp;&nbsp;&nbsp;Training Period</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input name="internship3startdate" type="text" class="datepicker">
                                                        <label for="internship3startdate">Starting Date</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input name="internship3enddate" type="text" class="datepicker">
                                                        <label for="internship3enddate">End Date</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12" id="">
                                                        <label class="custom-file-upload" id="" for="internship3certificate">
                                                        <a class="btn blue darken-1"><input style="display: none;" id="internship3certificate" name="internship3certificate" type="file" accept=".pdf, .jpg, .jpeg, .docx"><p id='internship3certificatep' style="color: white;">Upload Certificate</p></a>
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end form element -->
                                </div>
                            </div>


                            <!-- Personal Skills -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 id="per" title="Click here to Fill the Personal Detail" style="color: blue;"><b>Personal Skills</b></h3>
                                    <!-- form element -->
                                    <div class="row" id="skill">
                                        <div class="col s12">
                                            <div class="row">
                                                <h5 style="color: blue;">&nbsp;&nbsp;&nbsp;Extra Curricular</h5>
                                            </div>
                                            <div class="act" id="act">
                                                <div class="row">

                                                    <div class="input-field col s6">
                                                        <input name="activities[]" id="activities" type="text" class="validate">
                                                        <label for="activities">Activities</label>

                                                    </div>
                                                    <div class="input-field col s6">
                                                        <a onclick="addActivity()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="hobb" id="hobb">
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input name="hobbies[]" id="hobbies" type="text" class="validate">
                                                        <label for="hobbies">Hobbies</label>

                                                    </div>
                                                    <div class="input-field col s12">
                                                        <a onclick="addHobbies()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <h5 style="color: blue;">&nbsp;&nbsp;&nbsp;Languages Known</h5>
                                            </div>
                                            <div class="row">
                                                <table class="responsive-table">

                                                    <tbody>
                                                        <tr>
                                                            <td><input type="text" id="language1" name="language1[]" placeholder="Language"></td>
                                                            <td><label>
                                                                <input type="checkbox" class="" checked="checked" id="language1read" value="Read" name="language1[]"/>
                                                                <span>Read</span>
                                                            </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                <input type="checkbox" class="" id="language1write" value="Write" name="language1[]"/>
                                                                <span>Write</span>
                                                            </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                <input type="checkbox" class="" id="language1speak" value="Speak" name="language1[]"/>
                                                                <span>Speak</span>
                                                            </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="language2" name="language2[]" placeholder="Language"></td>
                                                            <td><label>
                                                                <input type="checkbox" class="" checked="checked" id="language2read" value="Read" name="language2[]"/>
                                                                <span>Read</span>
                                                            </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                <input type="checkbox" class="" id="language2write" value="Write" name="language2[]"/>
                                                                <span>Write</span>
                                                            </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                <input type="checkbox" class="" id="language2speak" value="Speak" name="language2[]"/>
                                                                <span>Speak</span>
                                                            </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="language3" name="language3[]" placeholder="Language"></td>
                                                            <td><label>
                                                                <input type="checkbox" class="" checked="checked" id="language3read" value="Read" name="language3[]"/>
                                                                <span>Read</span>
                                                            </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                <input type="checkbox" class="" id="language3write" value="Write" name="language3[]"/>
                                                                <span>Write</span>
                                                            </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                <input type="checkbox" class="" id="language3speak" value="Speak" name="language3[]"/>
                                                                <span>Speak</span>
                                                            </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="language4" name="language4[]" placeholder="Language"></td>
                                                            <td><label>
                                                                <input type="checkbox" class="" checked="checked" id="language4read" value="Read" name="language4[]"/>
                                                                <span>Read</span>
                                                            </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                <input type="checkbox" class="" id="language4write" value="Write" name="language4[]"/>
                                                                <span>Write</span>
                                                            </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                <input type="checkbox" class="" id="language4speak" value="Speak" name="language4[]"/>
                                                                <span>Speak</span>
                                                            </label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end form element -->
                                </div>
                            </div>



                            <!-- Projects Details -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 id="pro" title="Click Here to Fill the Project Detail" style="color: blue;"><b>Projects Detail</b></h3>
                                    <!-- form element -->
                                    <div class="row" id="project">
                                        <div class="col s12">
                                            <div class="row">
                                                <table class="responsive-table">
                                                    <thead></thead>
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="4" style="color: blue;">Minor</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="minortitle" name="minor[]" placeholder="Title"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="minorplatform" name="minor[]" placeholder="Platform Used"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="minorlang" name="minor[]" placeholder="Languages Used"></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4" style="color: blue;">Mini</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="minititle" name="mini[]" placeholder="Title"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="miniplatform" name="mini[]" placeholder="Platform Used"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="minilang" name="mini[]" placeholder="Languages Used"></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4" style="color: blue;">Major</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="majortitle" name="major[]" placeholder="Title"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="majorplatform" name="major[]" placeholder="Platform Used"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" id="majorlang" name="major[]" placeholder="Languages Used"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end form element -->
                                </div>
                            </div>

                            <!-- Awards and Achivement -->
                            <div class="card">
                                <div class="card-body">

                                    <h3 title="Click to Fill the Awards and Achivement Detail" id="award" style="color: blue;"><b>Awards and Achivement</b></h3>
                                    <!-- form element -->
                                    <div class="row" id="Achivement">
                                        <div class="fgrid" id="fgrid">

                                            <h5 style="color: blue;">&nbsp;&nbsp;&nbsp;Award</h5>
                                            <div id="schollg">
                                                <div style="margin-left: 20px;">
                                                    <div class="itm1">
                                                        <input type="text" name="schoolAward[]" id="schoolAward0" placeholder="School Award 1">
                                                    </div>
                                                    <!-- <div class="itm2">
                                                        <label class="custom-file-upload" id="schoolAwardLabel" for="schoolAwardFile">
                                                            <a class="btn blue darken-1"><input style="display: none;" id="schoolAwardFile" name="schoolAwardFile" type="file" accept=".pdf, .jpg, .jpeg"><p id='schoolAwardPara' style="color: white;">Upload Certificate</p></a>
                                                        </label>
                                                    </div> -->

                                                    <!-- <div class="">
                                                    <a onclick="schoolAward()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                                </div> -->
                                                </div>
                                            </div>
                                            <div style="margin-left: 20px;">
                                                <a onclick="schoolAward()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                            </div>
                                            <hr>
                                            <div class="jrcerg" id="jrcerg">

                                                <div style="margin-left: 20px;">
                                                    <div class="itm1">
                                                        <input type="text" id="jrcollegeAward0" name="jrcollegeAward[]" placeholder="Jr College Award 1">
                                                    </div>

                                                </div>
                                            </div>
                                            <div style="margin-left: 20px;">
                                                <!-- <div class="input-field col s6" id="">
                                                    <label class="custom-file-upload" id="" for="certificate1file">
                                                        <a class="btn blue darken-1"><input style="display: none;" id="certificate1file" type="file" accept=".pdf, .jpg, .jpeg"><p id='certificate1p' style="color: white;">Upload Certificate</p></a>
                                                    </label>
                                                </div> -->
                                                <a id="" onclick="jrcollegeAward();" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                            </div>
                                            <hr>
                                            <div class="" id="engg">
                                                <div style="margin-left: 20px;">
                                                    <div class="itm1">
                                                        <input type="text" id="enggcollegeAward0" name="enggcollegeAward[]" placeholder="Engg College Award 1">
                                                    </div>

                                                </div>
                                            </div>
                                            <div style="margin-left: 20px;">

                                                <a id="" onclick="enggcollegeAward();" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="fgrid">
                                            <div class="prscgri" id="prscgri">
                                                <h5 style="margin-left: 20px; color: blue;"><br>Prize</h5>

                                                <div class="" id="schoolPrize">
                                                    <div style="margin-left: 20px;">
                                                        <div class="itm1">
                                                            <input type="text" id="schoolPrize0" name="schoolPrize[]" placeholder="School Prize 1">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div style="margin-left: 20px;">
                                                    <a id="" onclick="schoolPrize()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                                </div>

                                                <hr>
                                                <div class="" id="jrCollegePrize">
                                                    <div style="margin-left: 20px;">
                                                        <div class="itm1">
                                                            <input type="text" id="jrCollegePrize0" name="jrCollegePrize[]" placeholder="Jr College Prize">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div style="margin-left: 20px;">
                                                    <a id="" onclick="jrCollegePrize()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                                </div>
                                                <hr>

                                                <div class="" id="enggCollegePrize">
                                                    <div style="margin-left: 20px;">
                                                        <div class="itm1">
                                                            <input type="text" id="enggCollegePrize0" name="enggCollegePrize[]" placeholder="Engg College Prize">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div style="margin-left: 20px;">
                                                    <a id="" onclick="enggCollegePrize()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="fgrid">
                                            <h5 style="color: blue; margin-left: 20px;">Scholorship</h5>
                                            <div class="" id="schoolScholar">
                                                <div style="margin-left: 20px;">
                                                    <div class="itm1">
                                                        <input type="text" id="schoolScholar0" name="schoolScholar[]" placeholder="School Scholarship 1">
                                                    </div>

                                                </div>
                                            </div>
                                            <div style="margin-left: 20px;">
                                                <a id="" onclick="schoolScholar()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                            </div>
                                            <hr>
                                            <div class="" id="jrCollegeScholar">
                                                <div style="margin-left: 20px;">
                                                    <div class="itm1">
                                                        <input type="text" id="jrCollegeScholar0" name="jrCollegeScholar[]" placeholder="Jr College Scholarship 1">
                                                    </div>

                                                </div>
                                            </div>
                                            <div style="margin-left: 20px;">
                                                <a id="" onclick="jrCollegeScholar()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                            </div>
                                            <hr>
                                            <div class="" id="enggCollegeScholar">
                                                <div style="margin-left: 20px;">
                                                    <div class="itm1">
                                                        <input type="text" id="enggCollegeScholar0" name="enggCollegeScholar[]" placeholder="Engg College Scholarship 1">
                                                    </div>

                                                </div>
                                            </div>
                                            <div style="margin-left: 20px;">
                                                <a id="" onclick="enggCollegeScholar()" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- Certificate  -->

                            <div class="card">
                                <div class="card-body">
                                    <h3 id="cer" title="Click Here to fill the Certificate Details" style="color: blue;"><b>Certificate</b></h3>
                                    <div class="row" class="certi" id="certi">
                                        <div class="col s12" id="adddiv">
                                            <div id="addNewCertificateToThis">
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input name="certificate[]" id="certificate0" type="text" class="validate">
                                                        <label for="certificate0">Certificate About..e.g.Sports,Course</label>
                                                    </div>
                                                </div>

                                                <div class="file-field input-field">
                                                    <div class="btn-small blue">
                                                        <span>Upload File</span>
                                                        <input type="file" id="certificate0file" name="certificatefile0" accept=".pdf,.jpg,.jpeg,.docx,.doc,.png">
                                                    </div>

                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text" placeholder="No file selected" />
                                                    </div>
                                                </div>
                                            </div>

                                            <a id="" value="add" onclick="addCertificate();" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">add</i></a>
                                        </div>



                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="col s6 offset-s3 center" id="submitform">
                            <button class="btn blue darken-2" type="submit" name="action" id="submitformdata" style="color: white;" formenctype="multipart/form-data">Submit
                        <i class="material-icons right">send</i>
                        </button>
                        </div>
                    </div>

                </form>
            </div>
        </section>
    </div>


    <br>
    <!-- footer -->

    <footer class="page-footer grey darken-3">
        <div class="container">
            <div class="row">
                <div class="col s12 l6">
                    <h5>About Site</h5>
                    <p>This Site is useful for the student in MITAOE about their Placement Activities.</p>

                </div>

            </div>
        </div>
        <div class="footer-copyright grey darken-4">
            <div class="container center-align">
                &copy; 2019 <a href="#">MITAOE</a>
            </div>
        </div>
    </footer>
    <script src="registrationForm.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



    <script>
        ctr11 = 0;

        function addCertificate() {
            ctr11 += 1;

            var div = document.createElement("div");
            div.innerHTML = '<div class="row">\n' +
                '<div class="input-field col s6">\n' +
                '<input name="certificate[]" id="certificate' + ctr11 + '" type="text" class="validate">\n' +
                '<label for="certificate' + ctr11 + '">Certificate About..e.g.Sports,Course</label>\n' +
                '</div>\n' +
                '</div>\n' +

                '<div class="file-field input-field">\n' +
                '<div class="btn-small blue">\n' +
                '<span>Upload File</span>\n' +
                '<input type="file" id="certificate' + ctr11 + 'file" name="certificatefile' + ctr11 + '" accept=".pdf,.jpg,.jpeg,.docx,.doc,.png">\n' +
                '</div>\n' +

                '<div class="file-path-wrapper">\n' +
                '<input class="file-path validate" type="text" placeholder="No file selected" />\n' +
                '</div>\n' +
                '</div>\n';
            b = document.getElementById("addNewCertificateToThis");
            b.appendChild(div);

        }

        var ctr = ctr1 = ctr2 = ctr3 = ctr4 = ctr5 = ctr6 = ctr7 = ctr8 = ctr9 = ctr10 = 0;
        $("#image_upload_preview").hide();
        $(".internship2div").hide();
        $(".internship3div").hide();
        myimg = $("#image_upload_preview").val();

        $("#internshipdetailsadd").click(function() {
            $(".internship2div").fadeIn(300);
        });
        $("#internshipdetailsadd1").click(function() {
            $(".internship3div").fadeIn(300);
        });

        $('#myphoto').change(function() {


            var f = $('#myphoto').val().split('.')
            var x = f[1]
            if (x == 'jpeg' || x == 'png' || x == 'jpg') {
                $('#myfilephoto').replaceWith($('#myphoto').val())

                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_upload_preview').attr('src', e.target.result);

                    };

                    reader.readAsDataURL(this.files[0]);
                }

                $("#image_upload_preview").slideDown("slow");
            } else {
                alert('Invalid File \n Only IMAGE accepted')
            }
        });

        function enggCollegeScholar() {
            ctr10 = ctr10 + 1;

            var div = document.createElement("div");
            div.innerHTML = '<div class="pgrid">\n' +
                '<div class="itm1">\n' +
                '<input type="text" id="enggCollegeScholar' + ctr10 + '" name="enggCollegeScholar[]" placeholder="Another Engg College Scholarship">\n' +
                ' </div>\n' +
                ' </div>\n';
            b = document.getElementById("enggCollegeScholar");
            b.appendChild(div);
        };

        function jrCollegeScholar() {
            ctr9 = ctr9 + 1;

            var div = document.createElement("div");
            div.innerHTML = '<div class="pgrid">\n' +
                '<div class="itm1">\n' +
                '<input type="text" id="jrCollegeScholar' + ctr9 + '" name="jrCollegeScholar[]" placeholder="Another Jr College Scholarship">\n' +
                ' </div>\n' +
                ' </div>\n';
            b = document.getElementById("jrCollegeScholar");
            b.appendChild(div);
        };

        function schoolScholar() {
            ctr8 = ctr8 + 1;

            var div = document.createElement("div");
            div.innerHTML = '<div class="pgrid">\n' +
                '<div class="itm1">\n' +
                '<input type="text" id="schoolScholar' + ctr8 + '" name="schoolScholar[]" placeholder="Another School Scholarship">\n' +
                ' </div>\n' +
                ' </div>\n';
            b = document.getElementById("schoolScholar");
            b.appendChild(div);
        };

        function enggCollegePrize() {
            ctr7 = ctr7 + 1;

            var div = document.createElement("div");
            div.innerHTML = '<div class="pgrid">\n' +
                '<div class="itm1">\n' +
                '<input type="text" id="enggCollegePrize' + ctr7 + '" name="enggCollegePrize[]" placeholder="Another Engg College Prize">\n' +
                ' </div>\n' +
                ' </div>\n';
            b = document.getElementById("enggCollegePrize");
            b.appendChild(div);
        };

        function jrCollegePrize() {
            ctr6 = ctr6 + 1;

            var div = document.createElement("div");
            div.innerHTML = '<div class="pgrid">\n' +
                '<div class="itm1">\n' +
                '<input type="text" id="jrCollegePrize' + ctr6 + '" name="jrCollegePrize[]" placeholder="Another Jr College Prize">\n' +
                ' </div>\n' +
                ' </div>\n';
            b = document.getElementById("jrCollegePrize");
            b.appendChild(div);
        };

        function schoolPrize() {
            ctr5 = ctr5 + 1;

            var div = document.createElement("div");
            div.innerHTML = '<div class="pgrid">\n' +
                '<div class="itm1">\n' +
                '<input type="text" id="schoolPrize' + ctr5 + '" name="schoolPrize[]" placeholder="Another School Prize">\n' +
                ' </div>\n' +
                ' </div>\n';
            b = document.getElementById("schoolPrize");
            b.appendChild(div);
        };

        function enggcollegeAward() {
            ctr4 = ctr4 + 1;

            var div = document.createElement("div");
            div.innerHTML = '<div class="pgrid">\n' +
                '<div class="itm1">\n' +
                '<input type="text" id="enggcollegeAward' + ctr4 + '" name="enggcollegeAward[]" placeholder="Another Engg College Award">\n' +
                ' </div>\n' +
                ' </div>\n';
            b = document.getElementById("engg");
            b.appendChild(div);
        };

        function jrcollegeAward() {
            ctr3 = ctr3 + 1;

            var div = document.createElement("div");
            div.innerHTML = '<div class="pgrid">\n' +
                '<div class="itm1">\n' +
                '<input type="text" id="jrcollegeAward' + ctr3 + '" name="jrcollegeAward[]" placeholder="Another Jr College Award">\n' +
                ' </div>\n' +
                ' </div>\n';
            b = document.getElementById("jrcerg");
            b.appendChild(div);
        }

        function addHobbies() {
            ctr1 = ctr1 + 1;
            var div = document.createElement("div");
            div.innerHTML = '<div class="row">' +
                '<div class="input-field col s12">' +
                '<input name="hobbies[]" id="hobbies' + ctr1 + '" type="text" class="validate">' +
                '<label for="hobbies' + ctr1 + '">Hobbies</label>' +

                '</div>' +
                '<div class="input-field col s12">' +

                '</div>' +
                '</div>';
            b = document.getElementById("hobb");

            b.appendChild(div);
        }

        function schoolAward() {
            ctr2 = ctr2 + 1;
            var div = document.createElement("div");
            div.innerHTML = '<div style="margin-left: 20px;">' +
                '<div class="itm1">' +
                '<input type="text" placeholder="Another School Award" name="schoolAward[]" id="schoolAward' + ctr2 + '">\n' +
                ' </div>\n' +
                '</div>';
            b = document.getElementById("schollg");
            b.appendChild(div);
        }

        function addActivity() {
            ctr = ctr + 1;
            var div = document.createElement("div");
            div.innerHTML = '<div class="row">\n' +
                '<div class="input-field col s12">\n' +
                '<input name="activities[]" id="activities' + ctr + '" type="text" class="validate">\n' +
                '<label for="activities' + ctr + '">Activities</label>\n' +

                '</div>\n' +
                '<div class="input-field col s12">\n' +
                '</div>\n' +
                '</div>';
            b = document.getElementById("act");

            b.appendChild(div);
        }


        $('.datepicker').datepicker({
            //dateFormat:"dd/mm/yy",
            yearRange: [1919, 2019],
            changeMonth: true,

            //changeYear:true

        });

        $('#myphoto').change(function() {
            var f = $('#myphoto').val().split('.')
            var x = f[1]
            if (x == 'png' || x == 'jpeg' || x == 'jpg') {
                $('#myfilephoto').replaceWith($('#myphoto').val())

            } else {
                alert('Invalid File \n Only PNG, JPEG, JPG accepted')
            }

        });

        $('#internship1certificate').change(function() {
            var f = $('#internship1certificate').val().split('.')
            var x = f[1]
            if (x == 'pdf' || x == 'jpeg' || x == 'jpg' || x == 'docx') {
                $('#internship1certificatep').replaceWith($('#internship1certificate').val())

            } else {
                alert('Invalid File \n Only PDF, JPEG, JPG, DOCX accepted')
            }

        });

        $('#internship2certificate').change(function() {
            var f = $('#internship1certificate').val().split('.')
            var x = f[1]
            if (x == 'pdf' || x == 'jpeg' || x == 'jpg' || x == 'docx') {
                $('#internship2certificatep').replaceWith($('#internship2certificate').val())

            } else {
                alert('Invalid File \n Only PDF, JPEG, JPG, DOCX accepted')
            }

        });

        $('#internship3certificate').change(function() {
            var f = $('#internship3certificate').val().split('.')
            var x = f[1]
            if (x == 'pdf' || x == 'jpeg' || x == 'jpg' || x == 'docx') {
                $('#internship3certificatep').replaceWith($('#internship3certificate').val())

            } else {
                alert('Invalid File \n Only PDF, JPEG, JPG, DOCX accepted')
            }

        });
        
        $(document).ready(function() {
            $('#certi').hide();
            $('#Achivement').hide();
            $('#project').hide();
            $('#skill').hide();
            $('#intern').hide();
            $('#edu').hide();
            $('#commu').hide();


            $('#comm').click(function() {
                $('#commu').toggle(300);
            });

            $('#eduu').click(function() {
                $('#edu').toggle(300);
            });

            $('#int').click(function() {
                $('#intern').toggle(300);
            });
            $('#per').click(function() {
                $('#skill').toggle(300);
            });

            $('#pro').click(function() {
                $('#project').toggle(300);
            });

            $('#award').click(function() {
                $('#Achivement').toggle(300);
            });

            $('#cer').click(function() {
                $('#certi').toggle(300);
            });
            // Prevent user to submit form on hit enter
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
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

