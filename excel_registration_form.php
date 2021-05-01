<?php
    require 'API/db.php';
    $output = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
        if (isset($_POST['school'])){
            if ($_POST['school'] == "All"){
                $query = "select * from master_database";
            }else{
                $var = $_POST['school'];
                $query = "select * from master_database where student_branch = '$var'";
            }
        }
        // Varibale for increasing row number
        $count = 0;
        // Query to retrive all the data

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $output .= '<table cellpadding="1" cellspacing="1" class="card material-table" id="myTable">
                            <thead>
                                <tr>
                                    <th colspan="11"><center>Basic Details</center></th>
                                    <th colspan="12"><center>Communication Detail</center></th>
                                    <th colspan="56"><center>Educational Detail</center></th>
                                    <th colspan="12"><center>Internship Detail</center></th>
                                    <th colspan="6"><center>Personal Skills</center></th>
                                    <th colspan="9"><center>Projects Detail</center></th>
                                    <th colspan="9"><center>Awards and Achivement</center></th>
                                    <th colspan="2"><center>Certificate</center></th>
                                </tr>
                                <tr>
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
                                    <th colspan="4">Present Address</th>
                                    <th colspan="4">Permanent Address</th>
                                    <th colspan="2">Mobile Numbers</th>
                                    <th colspan="2">Emails</th>
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
                                    <th colspan="4">Internship 1</th>
                                    <th colspan="4">Internship 2</th>
                                    <th colspan="4">Internship 3</th>
                                    <th colspan="2">Extra Curricular</th>
                                    <th colspan="4">Languages Known</th>
                                    <th colspan="3">Minor</th>
                                    <th colspan="3">Mini</th>
                                    <th colspan="3">Major</th>
                                    <th colspan="3">Award</th>
                                    <th colspan="3">Prize</th>
                                    <th colspan="3">Scholarship</th>
                                    <th colspan="2">Certificates</th>
                                </tr>
                                <tr>
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
                                    <th>Activities</th>
                                    <th>Hobbies</th>
                                    <th>Language 1</th>
                                    <th>Language 2</th>
                                    <th>Language 3</th>
                                    <th>Language 4</th>
                                    <th>Title</th>
                                    <th>Platform Used</th>
                                    <th>Languages Used</th>
                                    <th>Title</th>
                                    <th>Platform Used</th>
                                    <th>Languages Used</th>
                                    <th>Title</th>
                                    <th>Platform Used</th>
                                    <th>Languages Used</th>
                                    <th>School</th>
                                    <th>Jr College</th>
                                    <th>Engg College</th>
                                    <th>School</th>
                                    <th>Jr College</th>
                                    <th>Engg College</th>
                                    <th>School</th>
                                    <th>Jr College</th>
                                    <th>Engg College</th>
                                    <th>Certificate Name</th>
                                    <th>Certificate Files</th>
                                </tr>
                            </thead>';

                            $output .= "<tbody>";
            if ($result->num_rows > 0) {
                while (($rows = $result->fetch_assoc())) {
                    
                        
                        $output .= "<tr>";
                        $count = $count+1;
                        $output .= "<td>$count</td>";
                        $time = str_split($rows['entry_time'],10);
                        $output .= "<td>$time[0]</td>";
                        $output .= "<td>$time[1]</td>";
                        $output .= "<td>".$rows['prn']."</td>";
                        $output .= "<td>".$rows['student_name']."</td>";
                        $output .= "<td>".$rows['student_branch']."</td>";
                        $output .= "<td>".$rows['father_name']."</td>";
                        $output .= "<td>".$rows['mother_name']."</td>";
                        $output .= "<td>".$rows['gender']."</td>";
                        $output .= "<td>".$rows['date_of_birth']."</td>";
                        $output .= "<td>";
                        $id = $rows["id"];
                        $output .= '<a href="" onclick="window.open(\'http://localhost/Web/Placement_project/Placement_Project/view_student_photo.php?id='.$id.'\')">Click</a>';
                        $output .= "</td>";
                        $str_arr = explode(",",$rows['present_address']);
                        $output .= "<td>".$str_arr[0]."</td>";
                        $output .= "<td>".$str_arr[1]."</td>";
                        $output .= "<td>".$str_arr[2]."</td>";
                        $output .= "<td>".$str_arr[3]."</td>";
                        $str_arr1 = explode(",",$rows['permanent_address']);
                        $output .= "<td>".$str_arr1[0]."</td>";
                        $output .= "<td>".$str_arr1[1]."</td>";
                        $output .= "<td>".$str_arr1[2]."</td>";
                        $output .= "<td>".$str_arr1[3]."</td>";
                        $mobile = explode(",",$rows['mobile_number']);
                        $output .= "<td>".$mobile[0]."</td>";
                        $output .= "<td>".$mobile[1]."</td>";
                        $email = explode(",",$rows['email']);
                        $output .= "<td>".$email[0]."</td>";
                        $output .= "<td>".$email[1]."</td>";
                        
                        $ssc = explode(",",$rows['SSC']);

                        $output .= "<td>".$ssc[0]."</td>";
                        $output .= "<td>".$ssc[1]."</td>";
                        $output .= "<td>".$ssc[2]."</td>";
                        $output .= "<td>".$ssc[3]."</td>";
                        $output .= "<td>".$ssc[4]."</td>";

                        $hsc = explode(",",$rows['HSC']);

                        $output .= "<td>".$hsc[0]."</td>";
                        $output .= "<td>".$hsc[1]."</td>";
                        $output .= "<td>".$hsc[2]."</td>";
                        $output .= "<td>".$hsc[3]."</td>";
                        $output .= "<td>".$hsc[4]."</td>";

                        $diploma = explode(",",$rows['diploma']);

                        $output .= "<td>".$diploma[0]."</td>";
                        $output .= "<td>".$diploma[1]."</td>";
                        $output .= "<td>".$diploma[2]."</td>";
                        $output .= "<td>".$diploma[3]."</td>";
                        $output .= "<td>".$diploma[4]."</td>";

                        

                        $engg_1st_sem = explode(",",$rows['engg_1st_sem']);

                        $output .= "<td>".$engg_1st_sem[0]."</td>";
                        $output .= "<td>".$engg_1st_sem[1]."</td>";
                        $output .= "<td>".$engg_1st_sem[2]."</td>";
                        $output .= "<td>".$engg_1st_sem[3]."</td>";
                        $output .= "<td>".$engg_1st_sem[4]."</td>";

                        $engg_2nd_sem = explode(",",$rows['engg_2nd_sem']);

                        $output .= "<td>".$engg_2nd_sem[0]."</td>";
                        $output .= "<td>".$engg_2nd_sem[1]."</td>";
                        $output .= "<td>".$engg_2nd_sem[2]."</td>";
                        $output .= "<td>".$engg_2nd_sem[3]."</td>";
                        $output .= "<td>".$engg_2nd_sem[4]."</td>";

                        $engg_3rd_sem = explode(",",$rows['engg_3rd_sem']);

                        $output .= "<td>".$engg_3rd_sem[0]."</td>";
                        $output .= "<td>".$engg_3rd_sem[1]."</td>";
                        $output .= "<td>".$engg_3rd_sem[2]."</td>";
                        $output .= "<td>".$engg_3rd_sem[3]."</td>";
                        $output .= "<td>".$engg_3rd_sem[4]."</td>";

                        $engg_4th_sem = explode(",",$rows['engg_4th_sem']);

                        $output .= "<td>".$engg_4th_sem[0]."</td>";
                        $output .= "<td>".$engg_4th_sem[1]."</td>";
                        $output .= "<td>".$engg_4th_sem[2]."</td>";
                        $output .= "<td>".$engg_4th_sem[3]."</td>";
                        $output .= "<td>".$engg_4th_sem[4]."</td>";

                        $engg_5th_sem = explode(",",$rows['engg_5th_sem']);

                        $output .= "<td>".$engg_5th_sem[0]."</td>";
                        $output .= "<td>".$engg_5th_sem[1]."</td>";
                        $output .= "<td>".$engg_5th_sem[2]."</td>";
                        $output .= "<td>".$engg_5th_sem[3]."</td>";
                        $output .= "<td>".$engg_5th_sem[4]."</td>";

                        $engg_6th_sem = explode(",",$rows['engg_6th_sem']);

                        $output .= "<td>".$engg_6th_sem[0]."</td>";
                        $output .= "<td>".$engg_6th_sem[1]."</td>";
                        $output .= "<td>".$engg_6th_sem[2]."</td>";
                        $output .= "<td>".$engg_6th_sem[3]."</td>";
                        $output .= "<td>".$engg_6th_sem[4]."</td>";

                        $engg_7th_sem = explode(",",$rows['engg_7th_sem']);

                        $output .= "<td>".$engg_7th_sem[0]."</td>";
                        $output .= "<td>".$engg_7th_sem[1]."</td>";
                        $output .= "<td>".$engg_7th_sem[2]."</td>";
                        $output .= "<td>".$engg_7th_sem[3]."</td>";
                        $output .= "<td>".$engg_7th_sem[4]."</td>";

                        $engg_8th_sem = explode(",",$rows['engg_8th_sem']);

                        $output .= "<td>".$engg_8th_sem[0]."</td>";
                        $output .= "<td>".$engg_8th_sem[1]."</td>";
                        $output .= "<td>".$engg_8th_sem[2]."</td>";
                        $output .= "<td>".$engg_8th_sem[3]."</td>";
                        $output .= "<td>".$engg_8th_sem[4]."</td>";

                        $output .= "<td>".$rows['backlog']."</td>";

                        $internship_1 = explode(",",$rows['internship_1']);

                        $output .= "<td>".$internship_1[0]."</td>";
                        $output .= "<td>".$internship_1[1].$internship_1[2]."</td>";
                        $output .= "<td>".$internship_1[3].$internship_1[4]."</td>";
                        $output .= "<td>";
                        $output .= '<a href="" onclick="window.open(\'http://localhost/Web/Placement_project/Placement_Project/internship_1.php?id='.$rows["id"].'\')">Click</a>';
                        $output .= "</td>";

                        $internship_2 = explode(",",$rows['internship_2']);

                        $output .= "<td>".$internship_2[0]."</td>";
                        $output .= "<td>".$internship_2[1].$internship_2[2]."</td>";
                        $output .= "<td>".$internship_2[3].$internship_2[4]."</td>";
                        $output .= "<td>";
                        $output .= '<a href="" onclick="window.open(\'http://localhost/Web/Placement_project/Placement_Project/internship_2.php?id='.$rows["id"].'\')">Click</a>';
                        $output .= "</td>";

                        $internship_3 = explode(",",$rows['internship_3']);

                        $output .= "<td>".$internship_3[0]."</td>";
                        $output .= "<td>".$internship_3[1].$internship_3[2]."</td>";
                        $output .= "<td>".$internship_3[3].$internship_3[4]."</td>";
                        $output .= "<td>";
                        $output .= '<a href="" onclick="window.open(\'http://localhost/Web/Placement_project/Placement_Project/internship_3.php?id='.$rows["id"].'\')">Click</a>';
                        $output .= "</td>";

                        $output .= "<td>".$rows['activities']."</td>";
                        $output .= "<td>".$rows['hobbies']."</td>";
                        $output .= "<td>".$rows['language_1']."</td>";
                        $output .= "<td>".$rows['language_2']."</td>";
                        $output .= "<td>".$rows['language_3']."</td>";
                        $output .= "<td>".$rows['language_4']."</td>";

                        $minor_project = explode("-",$rows['minor_project']);

                        $output .= "<td>".$minor_project[0]."</td>";
                        $output .= "<td>".$minor_project[1]."</td>";
                        $output .= "<td>".$minor_project[2]."</td>";

                        $mini_project = explode("-",$rows['mini_project']);

                        $output .= "<td>".$mini_project[0]."</td>";
                        $output .= "<td>".$mini_project[1]."</td>";
                        $output .= "<td>".$mini_project[2]."</td>";

                        $major_project = explode("-",$rows['major_project']);

                        $output .= "<td>".$major_project[0]."</td>";
                        $output .= "<td>".$major_project[1]."</td>";
                        $output .= "<td>".$major_project[2]."</td>";

                        $award = explode("-",$rows['award']);
                        $output .= "<td>".$award[0]."</td>";
                        $output .= "<td>".$award[1]."</td>";
                        $output .= "<td>".$award[2]."</td>";

                        $prize = explode("-",$rows['prize']);
                        $output .= "<td>".$prize[0]."</td>";
                        $output .= "<td>".$prize[1]."</td>";
                        $output .= "<td>".$prize[2]."</td>";

                        $scholarship = explode("-",$rows['scholarship']);
                        $output .= "<td>".$scholarship[0]."</td>";
                        $output .= "<td>".$scholarship[1]."</td>";
                        $output .= "<td>".$scholarship[2]."</td>";

                        $output .= "<td>".$rows['certificate']."</td>";

                        $output .= "<td>";
                        $output .= '<a href="" onclick="window.open(\'http://localhost/Web/Placement_project/Placement_Project/certificate_view.php?id='.$rows["id"].'\')">Click</a>';
                        $output .= "</td>";


                        $output .= "</tr>";
                }
            }
            
            $output .= "</tbody>";
            $output .= "</table>";
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=download.xls');
            echo $output;
    }
?>