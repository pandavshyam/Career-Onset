<?php
    session_start();
    require_once 'API/db.php';

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function addFileToDatabase($nameGivenToFileTag) {
        $newname = "";
        $flag = 0;
        $returnArray = array();
        if((!empty($_FILES["$nameGivenToFileTag"])) && ($_FILES["$nameGivenToFileTag"]['error'] == 0)) {
            //Check if the file is JPEG image and it's size is less than 100Kb
           $filename = basename($_FILES["$nameGivenToFileTag"]['name']);
           $ext = substr($filename, strrpos($filename, '.') + 1);
           if (($ext == "jpg" or "png" or "jpeg") && ($_FILES["$nameGivenToFileTag"]["size"] < 200000)) {
               //Determine the path to which we want to save this file
               $random=rand(1111,9999);
               $newname = dirname(__FILE__).'/upload/'.$random.$filename;
               //Check if the file with the same name is already exists on the server
               if (!file_exists($newname)) {
                   move_uploaded_file($_FILES["$nameGivenToFileTag"]['tmp_name'],$newname);
               } else {
                   $flag = 1;
               }
           } else {
               $flag = 1;
           }
       } else {
           $flag = 1;
       }
       array_push($returnArray,$flag);
       array_push($returnArray,$newname);
       return $returnArray;
    }

    // Handling form data

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $company_name = $conn->real_escape_string($_POST['company_name']);
        $arrayOfColumn = $_SESSION['columns'];
        unset($_SESSION['columns']);

        $question = str_repeat("?,",count($arrayOfColumn)-2);
        $question = substr($question,0,-1);
        $string = str_repeat("s",count($arrayOfColumn)-2);
        
        unset($arrayOfColumn[0]);
        unset($arrayOfColumn[1]);
        $colums = implode(",",$arrayOfColumn);

        $final = array();
        
        if (isset($_POST['prn'])){
            $prn = test_input($_POST['prn']);
            $salutation = test_input($_POST['salutation']);
            $firstName = test_input($_POST['firstname']);
            $lastName = test_input($_POST['lastname']);
            $fatherName = test_input($_POST['fathername']);
            $motherName = test_input($_POST['mothername']);
            $gender = test_input($_POST['gender']);
            $dob = test_input($_POST['dob']);
            $branch = test_input($_POST['branch']);

            $photoError = addFileToDatabase("userPhoto");
            $newname = $photoError[1];  

            $full_name = $salutation." ".$firstName." ".$lastName;
            array_push($final,$prn,$full_name,$branch,$fatherName,$motherName,$gender,$dob,$newname);
        }

        if (isset($_POST['presentaddress'])){
            $presentAddress = $_POST['presentaddress'].",".$_POST['pcity'].",".$_POST['pstate'].",".$_POST['pcountry'];
            $permanentAddress = $_POST['permanentaddress'].",".$_POST['ppcity'].",".$_POST['ppstate'].",".$_POST['ppcountry'];
            $mobileNumbers = $_POST['mobilenumber1'].",".$_POST['mobilenumber2'];
            $emails = $_POST['pemail'].",".$_POST['cemail'];

            array_push($final,$presentAddress,$permanentAddress,$mobileNumbers,$emails);
        }

        if (isset($_POST['institutionssc'])){
            $ssc = $_POST['institutionssc'].",".$_POST['yocssc'].",".$_POST['yopssc'].",".$_POST['classssc'].",".$_POST['perssc'];
            $hsc = $_POST['institutionhsc'].",".$_POST['yochsc'].",".$_POST['yophsc'].",".$_POST['classhsc'].",".$_POST['perhsc'];
            $diploma = $_POST['institutiondip'].",".$_POST['yocdip'].",".$_POST['yopdip'].",".$_POST['classdip'].",".$_POST['perdip'];

            $engg1stSem = $_POST['institutionfysem1'].",".$_POST['yocfysem1'].",".$_POST['yopfysem1'].",".$_POST['classfysem1'].",".$_POST['perfysem1'];
            $engg2stSem = $_POST['institutionfysem2'].",".$_POST['yocfysem2'].",".$_POST['yopfysem2'].",".$_POST['classfysem2'].",".$_POST['perfysem2'];
            $engg3stSem = $_POST['institutionsysem1'].",".$_POST['yocsysem1'].",".$_POST['yopsysem1'].",".$_POST['classsysem1'].",".$_POST['persysem1'];
            $engg4stSem = $_POST['institutionsysem2'].",".$_POST['yocsysem2'].",".$_POST['yopsysem2'].",".$_POST['classsysem2'].",".$_POST['persysem2'];
            $engg5stSem = $_POST['institutiontysem1'].",".$_POST['yoctysem1'].",".$_POST['yoptysem1'].",".$_POST['classtysem1'].",".$_POST['pertysem1'];
            $engg6stSem = $_POST['institutiontysem2'].",".$_POST['yoctysem2'].",".$_POST['yoptysem2'].",".$_POST['classtysem2'].",".$_POST['pertysem2'];
            $engg7stSem = $_POST['institutionfinalsem1'].",".$_POST['yocfinalsem1'].",".$_POST['yopfinalsem1'].",".$_POST['classfinalsem1'].",".$_POST['perfinalsem1'];
            $engg8stSem = $_POST['institutionfinalsem2'].",".$_POST['yocfinalsem2'].",".$_POST['yopfinalsem2'].",".$_POST['classfinalsem2'].",".$_POST['perfinalsem2'];

            $backlog = $_POST['noOfBacklog'];

            array_push($final,$ssc,$hsc,$diploma,$engg1stSem,$engg2stSem,$engg3stSem,$engg4stSem,$engg5stSem,$engg6stSem,$engg7stSem,$engg8stSem,$backlog);
        }
        if (isset($_POST['internship1cname'])){
            $internship1 = $_POST['internship1cname'].",".$_POST['internship1startdate'].",".$_POST['internship1enddate'];
            $internship2 = $_POST['internship2cname'].",".$_POST['internship2startdate'].",".$_POST['internship2enddate'];
            $internship3 = $_POST['internship3cname'].",".$_POST['internship3startdate'].",".$_POST['internship3enddate'];
            $internship1FileError = addFileToDatabase("internship1certificate");
            $internship1File = $internship1FileError[1];

            $internship2FileError = addFileToDatabase("internship2certificate");
            $internship2File = $internship2FileError[1];

            $internship3FileError = addFileToDatabase("internship3certificate");
            $internship3File = $internship3FileError[1];

            array_push($final,$internship1,$internship1File,$internship2,$internship2File,$internship3,$internship3File);
        }

        if (isset($_POST['activities'])){
            $activities = implode(",",$_POST['activities']);
            $hobbies = implode(",",$_POST['hobbies']);
            $language1 = implode(",",$_POST['language1']);
            $language2 = implode(",",$_POST['language2']);
            $language3 = implode(",",$_POST['language3']);
            $language4 = implode(",",$_POST['language4']);

            array_push($final,$activities,$hobbies,$language1,$language2,$language3,$language4);        
        }
        
        if (isset($_POST['minor'])){
            // Projects Detail
            $minor = implode("-",$_POST['minor']);
            $mini = implode("-",$_POST['mini']);
            $major = implode("-",$_POST['major']);

            array_push($final,$minor,$mini,$major);
        }

        if (isset($_POST['schoolAward'])){
                // Awards and Achivement
            $awardSchool = implode(",",$_POST['schoolAward']);
            $awardJrCollege = implode(",",$_POST['jrcollegeAward']);
            $awardEnggCollege = implode(",",$_POST['enggcollegeAward']);

            $finalAward = $awardSchool."-".$awardJrCollege."-".$awardEnggCollege;

            $prizeSchool = implode(",",$_POST['schoolPrize']);
            $prizeJrCollege = implode(",",$_POST['jrCollegePrize']);
            $prizeEnggCollege = implode(",",$_POST['enggCollegePrize']);

            $finalPrize = $prizeSchool."-".$prizeJrCollege."-".$prizeEnggCollege;

            $scholarshipSchool = implode(",",$_POST['schoolScholar']);
            $scholarshipJrCollege = implode(",",$_POST['jrCollegeScholar']);
            $scholarshipEnggCollege = implode(",",$_POST['enggCollegeScholar']);

            $finalScholarship = $scholarshipSchool."-".$scholarshipJrCollege."-".$scholarshipEnggCollege;

            array_push($final,$finalAward,$finalPrize,$finalScholarship);
        }

        if (isset($_POST['certificate'])){
            // Certificate
            $certificate = implode(",",$_POST['certificate']);
            $countForFile =  count($_POST['certificate']);
            $certificatePathArray = array();


            for ($i = 0; $i < $countForFile; $i++ ){
                $certificateFileError = addFileToDatabase("certificatefile$i");
                $certificateFile = $certificateFileError[1];
                array_push($certificatePathArray,$certificateFile);
            }
            $finalCertificateArray = implode(",",$certificatePathArray);

            array_push($final,$certificate,$finalCertificateArray);
        }
        // echo count($final);
        // echo "<br>";
        array_walk($final, function(&$x) {$x = "'$x'";});
        $final = implode(',',$final);
        // echo $final;
        // echo "<br>";
        // echo "insert into $company_name ($colums) values ($question)";
        // echo "<br>";
        // $string = "$string";
        // echo $string;
        // echo "<br>";
        // $stmt = $conn->prepare("insert into $company_name ($colums) values ($question)");
        // $stmt->bind_param($string,$final);

        // if ($stmt->execute()){
        //     echo "Correct";
        // } else {
        //     echo $conn->error;
        // }


        // Do this using prepared statement

        $sql = "insert into $company_name ($colums) values ($final)";
        if ($conn->query($sql)){
            // Session to view_company_student
            $_SESSION['success'] = "Successfully Applied for $company_name";
            header("refresh:0;url=view_company_student.php");
        } else {
            echo "Error Occured";
        }
     }
?>