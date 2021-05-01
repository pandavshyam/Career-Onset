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
    // Varibale for increasing row number
    $count = 0;
    // Query to retrive all the data

    $stmt = $conn->prepare("select * from master_database");
    $stmt->execute();
    $result = $stmt->get_result();
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
    <link rel="stylesheet" href="public/css/register_form_submission.css">
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
    <br>

<div class="datatable">

<center><h1 style="font-size: 35px;">Student Registration Data</h1></center>
        <hr style="border-bottom:3px solid #e75480;width:50px;">

<br><br>
<style>
#searchform{
    width:100%;
}
#col1{
    width:400px;
}
</style>
                <div class="row" id="searchform">
                <div class="col" id="col1">
                <input type="text" id="myInput" onkeyup="myFunction()" class="searchtext" placeholder="Enter the Name">
          <a style="float:right;position:absolute" href="#" id="searchbutt" title="Click to Search" style="cursor:pointer;" class="search-toggle waves-effect nopadding"><i class="material-icons">search</i></a>
                </div>
                 
                <div class="col" style="margin-top:17px;">
                <form action="excel_registration_form.php" method="POST">
                    <input type="submit" name="export_excel" class="btn blue darken-1" value="Export to Excel">
                    <div class="col" style="width:500px;margin-left:160px;">
                <div class="input-field col s6">
                    <select id="mylist" onchange="serFunction()"  class="btn blue darken-1" style="color: white;" name="school">
                        <option style="color: black">Select School</option>
                        <option value="All">All</option>
                        <option value="SCET">SCET</option>
                        <option value="SEE">SEE</option>
                        <option value="SMCE">SMCE</option>
                        <option value="SCE">SCE</option>
                    </select>
                </div>
                </div>
                </form>
                </div>

                </div>

</div>
</div>

<br><br>
    <div class="tablescrol">
    
    
	    <table cellpadding="1" cellspacing="1" class="card material-table" id="myTable">
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
        </thead>
        <tbody>
        <?php
            if ($result->num_rows > 0) {
                while (($rows = $result->fetch_assoc())) {
                ?>
                <tr>
                    <td><?php $count = $count+1; echo $count;?></td>
                    <td><?php $time = str_split($rows['entry_time'],10); echo $time[0];?></td>
                    <td><?php $time = str_split($rows['entry_time'],10); echo $time[1];?></td>
                    <td><?php echo $rows['prn'];?></td>
                    <td><?php echo $rows['student_name'];?></td>
                    <td><?php echo $rows['student_branch'];?></td>
                    <td><?php echo $rows['father_name'];?></td>
                    <td><?php echo $rows['mother_name'];?></td>
                    <td><?php echo $rows['gender'];?></td>
                    <td><?php echo $rows['date_of_birth'];?></td>
                    <td><a href="" onclick="window.open('http://localhost/Web/Placement_project/Placement_Project/view_student_photo.php?id=<?php echo $rows["id"];?>')">Click</a></td>
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

                    <td><?php $internship_1 = explode(",",$rows['internship_1']); echo $internship_1[0];?></td>
                    <td><?php echo $internship_1[1].$internship_1[2];?></td>
                    <td><?php echo $internship_1[3].$internship_1[4];?></td>
                    <td><a href="" onclick="window.open('http://localhost/Web/Placement_project/Placement_Project/internship_1.php?id=<?php echo $rows["id"];?>')">Click</a></td>

                    <td><?php $internship_2 = explode(",",$rows['internship_2']); echo $internship_2[0];?></td>
                    <td><?php echo $internship_2[1].$internship_2[2];?></td>
                    <td><?php echo $internship_2[3].$internship_2[4];?></td>
                    <td><a href="" onclick="window.open('http://localhost/Web/Placement_project/Placement_Project/internship_2.php?id=<?php echo $rows["id"];?>')">Click</a></td>

                    <td><?php $internship_3 = explode(",",$rows['internship_3']); echo $internship_3[0];?></td>
                    <td><?php echo $internship_3[1].$internship_3[2];?></td>
                    <td><?php echo $internship_3[3].$internship_3[4];?></td>
                    <td><a href="" onclick="window.open('http://localhost/Web/Placement_project/Placement_Project/internship_3.php?id=<?php echo $rows["id"];?>')">Click</a></td>

                    <td><?php echo $rows['activities'];?></td>
                    <td><?php echo $rows['hobbies'];?></td>

                    <td><?php echo $rows['language_1'];?></td>
                    <td><?php echo $rows['language_2'];?></td>
                    <td><?php echo $rows['language_3'];?></td>
                    <td><?php echo $rows['language_4'];?></td>

                    <td><?php $minor_project = explode("-",$rows['minor_project']); echo $minor_project[0];?></td>
                    <td><?php echo $minor_project[1];?></td>
                    <td><?php echo $minor_project[2];?></td>

                    <td><?php $mini_project = explode("-",$rows['mini_project']); echo $mini_project[0];?></td>
                    <td><?php echo $mini_project[1];?></td>
                    <td><?php echo $mini_project[2];?></td>

                    <td><?php $major_project = explode("-",$rows['major_project']); echo $major_project[0];?></td>
                    <td><?php echo $major_project[1];?></td>
                    <td><?php echo $major_project[2];?></td>

                    <td><?php $award = explode("-",$rows['award']); echo $award[0];?></td>
                    <td><?php echo $award[1];?></td>
                    <td><?php echo $award[2];?></td>

                    <td><?php $prize = explode("-",$rows['prize']); echo $prize[0];?></td>
                    <td><?php echo $prize[1];?></td>
                    <td><?php echo $prize[2];?></td>

                    <td><?php $scholarship = explode("-",$rows['scholarship']); echo $scholarship[0];?></td>
                    <td><?php echo $scholarship[1];?></td>
                    <td><?php echo $scholarship[2];?></td>

                    <td><?php echo $rows['certificate'];?></td>
                    <td><a href="" onclick="window.open('http://localhost/Web/Placement_project/Placement_Project/certificate_view.php?id=<?php echo $rows["id"];?>')">Click</a></td>
                </tr>
                <?php
                }
            }
        ?>
        </tbody>
    </table>
    
    </div>
    <div class="col-md-12 center text-center">
	  
            <ul class="pagination pager" id="myPager"></ul>
          </div>
      </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#myTable').pageMe({
          pagerSelector:'#myPager',
          activeColor: 'green',
          prevText:'Anterior',
          nextText:'Siguiente',
          showPrevNext:true,
          hidePageNumbers:false,
          perPage:1
        });
				
	    

      });
    </script>

<script>

</script>

    <br>
    </div>
    </div>
 
    <br><br>
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


</body>
<script>
    $(document).ready(function() {
        $('.sidenav').sidenav();
        $('select').formSelect();
        $('.modal').modal();
    });
</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function serFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("mylist");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }

//   if(input.value == "All"){
//     location.reload();
//   }
}
</script>

<script>
$(document).ready(function(){
    $(".searchtext").hide();
    $("#searchbutt").click(function(){
    $(".searchtext").show(1000);
    });

    $('#clss').click(function(){
            alert("hii");
    })
})
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


