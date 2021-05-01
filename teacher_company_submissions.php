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
    error_reporting(E_ALL & ~E_NOTICE);
    // For printing row number sequentially
    $count = 0;
    session_start();
    require_once 'API/db.php';
    $company_name = base64_decode($_GET['cn']);
    $_SESSION['company_name_excel'] = $company_name; 
    $company_name = str_replace(" ","",$company_name);
    $stmt = $conn->prepare("select * from $company_name");
    $stmt->execute();
    $allDetails = $stmt->get_result();

    $stmt1 = $conn->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'placement_cell' AND TABLE_NAME = '$company_name'");
    $stmt1->execute();
    $result = $stmt1->get_result();

    $arrayOfColumn = array();
    if ($result->num_rows > 0){
        while ($rows = $result->fetch_assoc()){
            $arrayOfColumn[] = $rows['COLUMN_NAME'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
   
    <title>MITAOE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/pagination.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <link href="public/css/teacher_company_submissions.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="nav-wrapper transparent" id="mainNav">
            <div class="container">
                <a href="index.php" class="brand-logo">
                    <h4 style="color: blue; margin-top: 10px;">MITAOE</h1>
                </a>
                <a href="#" class="sidenav-trigger" data-target="mobile-menu">
                    <i class="material-icons" style="color: black;">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
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
    <form action="excel_dyanamic_company.php" method="POST">
        <input type="submit" name="export_excel" class="btn blue darken-1" value="Export to Excel">
    </form>
    <table border="1">


    <tr>
    <?php
        for ($i = 1; $i < count($arrayOfColumn); $i++){
            if ($arrayOfColumn[$i] == 'prn'){
                echo '<th colspan="11"><center>Basic Details</center></th>';
            }
            if ($arrayOfColumn[$i] == 'present_address'){
                echo '<th colspan="12"><center>Communication Detail</center></th>';
                
            }
            if ($arrayOfColumn[$i] == 'SSC'){
                echo '<th colspan="56"><center>Educational Detail</center></th>';
                
            }
            if ($arrayOfColumn[$i] == 'internship_1'){
                echo '<th colspan="12"><center>Internship Detail</center></th>';
            }
            if ($arrayOfColumn[$i] == 'activities'){
                echo '<th colspan="6"><center>Personal Skills</center></th>';
            }
            if ($arrayOfColumn[$i] == 'minor_project'){
                echo '<th colspan="9"><center>Projects Detail</center></th>';
            }
            if ($arrayOfColumn[$i] == 'award'){
                echo '<th colspan="9"><center>Awards and Achivement</center></th>';
            }
            if ($arrayOfColumn[$i] == 'certificate'){
                echo '<th colspan="2"><center>Certificate</center></th>';
            }
        }
    ?>
    </tr>
    
    
    <tr>
    <?php
        
        for ($i = 1; $i < count($arrayOfColumn); $i++){
            if ($arrayOfColumn[$i] == 'prn'){
                ?>
                <th>Sr.No</th>
                <th colspan="2">Date & Time</th>
                <th>PRN</th>
                <th>Student Name</th>
                <th>School</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Photo</th>
                <?php
            }
            if ($arrayOfColumn[$i] == 'present_address'){
                ?>
                <th colspan="4">Present Address</th>
                <th colspan="4">Permanent Address</th>
                <th colspan="2">Mobile Numbers</th>
                <th colspan="2">Emails</th>
                <?php
            }
            if ($arrayOfColumn[$i] == 'SSC'){
                ?>
                <th colspan="5">SSC</th>
                <th colspan="5">HSC</th>
                <th colspan="5">Diploma</th>
                <th colspan="5">Engg 1st Sem</th>
                <th colspan="5">Engg 2nd Sem</th>
                <th colspan="5">Engg 3rd Sem</th>
                <th colspan="5">Engg 4th Sem</th>
                <th colspan="5">Engg 5th Sem</th>
                <th colspan="5">Engg 6th Sem</th>
                <th colspan="5">Engg 7th Sem</th>
                <th colspan="5">Engg 8th Sem</th>
                <th>Backlog</th>
                <?php
            }
            if ($arrayOfColumn[$i] == 'internship_1'){
                ?>
                <th colspan="4">Internship 1</th>
                <th colspan="4">Internship 2</th>
                <th colspan="4">Internship 3</th>
                <?php
            }
            if ($arrayOfColumn[$i] == 'activities'){
                ?>
                <th colspan="2">Extra Curricular</th>
                <th colspan="4">Languages Known</th>
                <?php
            }
            if ($arrayOfColumn[$i] == 'minor_project'){
                ?>
                <th colspan="3">Minor</th>
                <th colspan="3">Mini</th>
                <th colspan="3">Major</th>
                <?php
            }
            if ($arrayOfColumn[$i] == 'award'){
                ?>
                <th colspan="3">Award</th>
                <th colspan="3">Prize</th>
                <th colspan="3">Scholarship</th>
                <?php
            }
            if ($arrayOfColumn[$i] == 'certificate'){
                ?>
                <th colspan="2">Certificates</th>
                <?php
            }
            
        }
    ?>
    </tr>
    <tr>
        <?php
            for ($i = 1; $i < count($arrayOfColumn); $i++){
                if ($arrayOfColumn[$i] === 'prn'){
                    ?>
                    <th></th>
                    <th>Date</th>
                    <th>Time</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <?php
                }
                if ($arrayOfColumn[$i] === 'present_address'){
                    ?>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Mobile Number</th>
                    <th>Mobile Number</th>
                    <th>Personal Email</th>
                    <th>College Email</th>
                    <?php
                }
                if ($arrayOfColumn[$i] === 'SSC'){
                    ?>
                    <th>Institution</th>
                    <th>Year of Commencement</th>
                    <th>Year of Passing</th>
                    <th>Class/Division</th>
                    <th>% Marks</th>
                    <th>Institution</th>
                    <th>Year of Commencement</th>
                    <th>Year of Passing</th>
                    <th>Class/Division</th>
                    <th>% Marks</th>
                    <th>Institution</th>
                    <th>Year of Commencement</th>
                    <th>Year of Passing</th>
                    <th>Class/Division</th>
                    <th>% Marks</th>
                    <th>Institution</th>
                    <th>Year of Commencement</th>
                    <th>Year of Passing</th>
                    <th>Class/Division</th>
                    <th>% Marks</th>
                    <th>Institution</th>
                    <th>Year of Commencement</th>
                    <th>Year of Passing</th>
                    <th>Class/Division</th>
                    <th>% Marks</th>
                    <th>Institution</th>
                    <th>Year of Commencement</th>
                    <th>Year of Passing</th>
                    <th>Class/Division</th>
                    <th>% Marks</th>
                    <th>Institution</th>
                    <th>Year of Commencement</th>
                    <th>Year of Passing</th>
                    <th>Class/Division</th>
                    <th>% Marks</th>
                    <th>Institution</th>
                    <th>Year of Commencement</th>
                    <th>Year of Passing</th>
                    <th>Class/Division</th>
                    <th>% Marks</th>
                    <th>Institution</th>
                    <th>Year of Commencement</th>
                    <th>Year of Passing</th>
                    <th>Class/Division</th>
                    <th>% Marks</th>
                    <th>Institution</th>
                    <th>Year of Commencement</th>
                    <th>Year of Passing</th>
                    <th>Class/Division</th>
                    <th>% Marks</th>
                    <th>Institution</th>
                    <th>Year of Commencement</th>
                    <th>Year of Passing</th>
                    <th>Class/Division</th>
                    <th>% Marks</th>
                    <th></th>
                    <?php
                }
                if ($arrayOfColumn[$i] === 'internship_1'){
                    ?>
                    <th>Name of the Industry</th>
                    <th>Starting Date</th>
                    <th>End Date</th>
                    <th>Certificate</th>
                    <th>Name of the Industry</th>
                    <th>Starting Date</th>
                    <th>End Date</th>
                    <th>Certificate</th>
                    <th>Name of the Industry</th>
                    <th>Starting Date</th>
                    <th>End Date</th>
                    <th>Certificate</th>
                    <?php
                }
                if ($arrayOfColumn[$i] == 'activities'){
                    ?>
                    <th>Activities</th>
                    <th>Hobbies</th>
                    <th>Language 1</th>
                    <th>Language 2</th>
                    <th>Language 3</th>
                    <th>Language 4</th>
                    <?php
                }
                if ($arrayOfColumn[$i] == 'minor_project'){
                    ?>
                    <th>Title</th>
                    <th>Platform Used</th>
                    <th>Languages Used</th>
                    <th>Title</th>
                    <th>Platform Used</th>
                    <th>Languages Used</th>
                    <th>Title</th>
                    <th>Platform Used</th>
                    <th>Languages Used</th>
                    <?php
                }
                if ($arrayOfColumn[$i] == 'award'){
                    ?>
                    <th>School</th>
                    <th>Jr College</th>
                    <th>Engg College</th>
                    <th>School</th>
                    <th>Jr College</th>
                    <th>Engg College</th>
                    <th>School</th>
                    <th>Jr College</th>
                    <th>Engg College</th>
                    <?php
                }
                if ($arrayOfColumn[$i] == 'certificate'){
                    ?>
                    <th>Certificate Name</th>
                    <th>Certificate Files</th>
                    <?php
                }
            }
        ?>
    </tr>
    <?php if ($allDetails->num_rows > 0){

        while($rows = $allDetails->fetch_assoc()){
            echo '<tr>';
            $count = $count + 1;
            echo "<td>".$count."</td>";
    
                for ($i = 1; $i <= count($arrayOfColumn); $i++){

                    if ($arrayOfColumn[$i] == 'entry_time'){
                        $entry_time = $rows[$arrayOfColumn[$i]];
                        ?>
                            <td><?php $time = str_split($rows['entry_time'],10); echo $time[0];?></td>
                            <td><?php echo $time[1];?></td>
                        <?php
                    }
                    if ($arrayOfColumn[$i] == 'prn'){
                        ?>
                            <td><?php echo $rows['prn'];?></td>
                            <td><?php echo $rows['student_name'];?></td>
                            <td><?php echo $rows['student_branch'];?></td>
                            <td><?php echo $rows['father_name'];?></td>
                            <td><?php echo $rows['mother_name'];?></td>
                            <td><?php echo $rows['gender'];?></td>
                            <td><?php echo $rows['date_of_birth'];?></td>
                            <td><a href="" onclick="window.open('http://localhost/Web/Placement_project/Placement_Project/view_student_photo.php?did=<?php echo $rows["id"];?>&cn=<?php echo base64_encode($company_name);?>')">Click</a></td>
                        <?php
                    }
                    if ($arrayOfColumn[$i] == 'present_address'){
                        ?>
                            <td><?php $str_arr = explode(",",$rows['present_address']); echo $str_arr[0];?></td>
                            <td><?php echo $str_arr[1];?></td>
                            <td><?php echo $str_arr[2];?></td>
                            <td><?php echo $str_arr[3];?></td>
                            <td><?php $str_arr1 = explode(",",$rows['permanent_address']); echo $str_arr1[0];?></td>
                            <td><?php echo $str_arr1[1];?></td>
                            <td><?php echo $str_arr1[2];?></td>
                            <td><?php echo $str_arr1[3];?></td>
                            <td><?php $mobile = explode(",",$rows['mobile_number']); echo $mobile[0];?></td>
                            <td><?php echo $mobile[1];?></td>
                            <td><?php $email = explode(",",$rows['email']); echo $email[0];?></td>
                            <td><?php echo $email[1];?></td>
                        <?php
                    }
                    if ($arrayOfColumn[$i] == 'SSC'){
                    ?>
                        <td><?php $ssc = explode(",",$rows['SSC']); echo $ssc[0];?></td>
                        <td><?php echo $ssc[1];?></td>
                        <td><?php echo $ssc[2];?></td>
                        <td><?php echo $ssc[3];?></td>
                        <td><?php echo $ssc[4];?></td>

                        <td><?php $hsc = explode(",",$rows['HSC']); echo $hsc[0];?></td>
                        <td><?php echo $hsc[1];?></td>
                        <td><?php echo $hsc[2];?></td>
                        <td><?php echo $hsc[3];?></td>
                        <td><?php echo $hsc[4];?></td>

                        <td><?php $diploma = explode(",",$rows['diploma']); echo $diploma[0];?></td>
                        <td><?php echo $diploma[1];?></td>
                        <td><?php echo $diploma[2];?></td>
                        <td><?php echo $diploma[3];?></td>
                        <td><?php echo $diploma[4];?></td>

                        <td><?php $engg_1st_sem = explode(",",$rows['engg_1st_sem']); echo $engg_1st_sem[0];?></td>
                        <td><?php echo $engg_1st_sem[1];?></td>
                        <td><?php echo $engg_1st_sem[2];?></td>
                        <td><?php echo $engg_1st_sem[3];?></td>
                        <td><?php echo $engg_1st_sem[4];?></td>

                        <td><?php $engg_2nd_sem = explode(",",$rows['engg_2nd_sem']); echo $engg_2nd_sem[0];?></td>
                        <td><?php echo $engg_2nd_sem[1];?></td>
                        <td><?php echo $engg_2nd_sem[2];?></td>
                        <td><?php echo $engg_2nd_sem[3];?></td>
                        <td><?php echo $engg_2nd_sem[4];?></td>

                        <td><?php $engg_3rd_sem = explode(",",$rows['engg_3rd_sem']); echo $engg_3rd_sem[0];?></td>
                        <td><?php echo $engg_3rd_sem[1];?></td>
                        <td><?php echo $engg_3rd_sem[2];?></td>
                        <td><?php echo $engg_3rd_sem[3];?></td>
                        <td><?php echo $engg_3rd_sem[4];?></td>

                        <td><?php $engg_4th_sem = explode(",",$rows['engg_4th_sem']); echo $engg_4th_sem[0];?></td>
                        <td><?php echo $engg_4th_sem[1];?></td>
                        <td><?php echo $engg_4th_sem[2];?></td>
                        <td><?php echo $engg_4th_sem[3];?></td>
                        <td><?php echo $engg_4th_sem[4];?></td>

                        <td><?php $engg_5th_sem = explode(",",$rows['engg_5th_sem']); echo $engg_5th_sem[0];?></td>
                        <td><?php echo $engg_5th_sem[1];?></td>
                        <td><?php echo $engg_5th_sem[2];?></td>
                        <td><?php echo $engg_5th_sem[3];?></td>
                        <td><?php echo $engg_5th_sem[4];?></td>

                        <td><?php $engg_6th_sem = explode(",",$rows['engg_6th_sem']); echo $engg_6th_sem[0];?></td>
                        <td><?php echo $engg_6th_sem[1];?></td>
                        <td><?php echo $engg_6th_sem[2];?></td>
                        <td><?php echo $engg_6th_sem[3];?></td>
                        <td><?php echo $engg_6th_sem[4];?></td>

                        <td><?php $engg_7th_sem = explode(",",$rows['engg_7th_sem']); echo $engg_7th_sem[0];?></td>
                        <td><?php echo $engg_7th_sem[1];?></td>
                        <td><?php echo $engg_7th_sem[2];?></td>
                        <td><?php echo $engg_7th_sem[3];?></td>
                        <td><?php echo $engg_7th_sem[4];?></td>

                        <td><?php $engg_8th_sem = explode(",",$rows['engg_8th_sem']); echo $engg_8th_sem[0];?></td>
                        <td><?php echo $engg_8th_sem[1];?></td>
                        <td><?php echo $engg_8th_sem[2];?></td>
                        <td><?php echo $engg_8th_sem[3];?></td>
                        <td><?php echo $engg_8th_sem[4];?></td>

                        <td><?php echo $rows['backlog'];?></td>
                    <?php
                    }
                    if ($arrayOfColumn[$i] == 'internship_1'){
                        ?>
                            <td><?php $internship_1 = explode(",",$rows['internship_1']); echo $internship_1[0];?></td>
                            <td><?php echo $internship_1[1].$internship_1[2];?></td>
                            <td><?php echo $internship_1[3].$internship_1[4];?></td>
                            <td><a href="" onclick="window.open('http://localhost/Web/Placement_project/Placement_Project/internship_1.php?did=<?php echo $rows["id"];?>&cn=<?php echo base64_encode($company_name);?>')">Click</a></td>


                            <td><?php $internship_2 = explode(",",$rows['internship_2']); echo $internship_2[0];?></td>
                            <td><?php echo $internship_2[1].$internship_2[2];?></td>
                            <td><?php echo $internship_2[3].$internship_2[4];?></td>
                            <td><a href="" onclick="window.open('http://localhost/Web/Placement_project/Placement_Project/internship_2.php?did=<?php echo $rows["id"];?>&cn=<?php echo base64_encode($company_name);?>')">Click</a></td>


                            <td><?php $internship_3 = explode(",",$rows['internship_3']); echo $internship_3[0];?></td>
                            <td><?php echo $internship_3[1].$internship_3[2];?></td>
                            <td><?php echo $internship_3[3].$internship_3[4];?></td>
                            <td><a href="" onclick="window.open('http://localhost/Web/Placement_project/Placement_Project/internship_3.php?did=<?php echo $rows["id"];?>&cn=<?php echo base64_encode($company_name);?>')">Click</a></td>
    
                                                    
                        <?php
                    }
                    if ($arrayOfColumn[$i] == 'activities'){
                        ?>
                            <td><?php echo $rows['activities'];?></td>
                            <td><?php echo $rows['hobbies'];?></td>

                            <td><?php echo $rows['language_1'];?></td>
                            <td><?php echo $rows['language_2'];?></td>
                            <td><?php echo $rows['language_3'];?></td>
                            <td><?php echo $rows['language_4'];?></td>
                        <?php
                    }

                    if ($arrayOfColumn[$i] == 'minor_project'){
                        ?>
                            <td><?php $minor_project = explode("-",$rows['minor_project']); echo $minor_project[0];?></td>
                            <td><?php echo $minor_project[1];?></td>
                            <td><?php echo $minor_project[2];?></td>

                            <td><?php $mini_project = explode("-",$rows['mini_project']); echo $mini_project[0];?></td>
                            <td><?php echo $mini_project[1];?></td>
                            <td><?php echo $mini_project[2];?></td>

                            <td><?php $major_project = explode("-",$rows['major_project']); echo $major_project[0];?></td>
                            <td><?php echo $major_project[1];?></td>
                            <td><?php echo $major_project[2];?></td>
                        <?php
                    }
                    if ($arrayOfColumn[$i] == 'award'){
                        ?>
                            <td><?php $award = explode("-",$rows['award']); echo $award[0];?></td>
                            <td><?php echo $award[1];?></td>
                            <td><?php echo $award[2];?></td>

                            <td><?php $prize = explode("-",$rows['prize']); echo $prize[0];?></td>
                            <td><?php echo $prize[1];?></td>
                            <td><?php echo $prize[2];?></td>

                            <td><?php $scholarship = explode("-",$rows['scholarship']); echo $scholarship[0];?></td>
                            <td><?php echo $scholarship[1];?></td>
                            <td><?php echo $scholarship[2];?></td>
                        <?php
                    }
                    if ($arrayOfColumn[$i] == 'certificate'){
                        ?>
                            <td><?php echo $rows['certificate'];?></td>
                            <td><a href="" onclick="window.open('http://localhost/Web/Placement_project/Placement_Project/certificate_view.php?did=<?php echo $rows["id"];?>&cn=<?php echo base64_encode($company_name);?>')">Click</a></td>
                        <?php
                    }
                }
            echo '</tr>';
        }
    }
    ?>
    </table>
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

