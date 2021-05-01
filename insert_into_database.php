<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    session_start();
    require_once 'API/db.php';

    function addFileToDatabase($nameGivenToFileTag) {
        $newname = "";
        $flag = 0;
        $returnArray = array();
        if((!empty($_FILES["$nameGivenToFileTag"])) && ($_FILES["$nameGivenToFileTag"]['error'] == 0)) {
            //Check if the file is JPEG image and it's size is less than 100Kb
           $filename = basename($_FILES["$nameGivenToFileTag"]['name']);
           $ext = substr($filename, strrpos($filename, '.') + 1);
           if (($ext == "jpg" or "png" or "jpeg" or "pdf") && ($_FILES["$nameGivenToFileTag"]["size"] < 200000)) {
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

    if (isset($_POST['submit'])){
        $company_name = $_POST['company_name'];
        $company_name1 = str_replace(' ', '', $company_name);
        $company_name1 = base64_encode($company_name1);
        $company_description = $_POST['company_description'];

        $company_details_file_error = addFileToDatabase("company_details_file");
        $company_details_file = $company_details_file_error[1];

        // Entering company_name and description into database

        $url = "http://localhost/Web/Placement_project/Placement_Project/dyanamic_form.php?company_name=$company_name1";
        $stmt = $conn->prepare("insert into company_details (company_name,company_description,url,company_file) values (?,?,?,?)");
        $stmt->bind_param("ssss",$company_name,$company_description,$url,$company_details_file);
        if ($stmt->execute()){
            echo "Company Details added Successfully";
            echo "<br>";
        }

        $queryColumnArray = array("id int(5) NOT NULL AUTO_INCREMENT","PRIMARY KEY (id)","entry_time varchar(20) NOT NULL DEFAULT current_timestamp()");
        // Creating dyanamic table

        // Create table of basic details

        if (isset($_SESSION['basicDetails'])){
            array_push($queryColumnArray,"`prn` varchar(11) NOT NULL DEFAULT 'NOT GIVEN'",
            "`student_name` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`student_branch` varchar(50) NOT NULL DEFAULT 'NOT GIVEN'",
            "`father_name` varchar(50) NOT NULL DEFAULT 'NOT GIVEN'",
            "`mother_name` varchar(50) NOT NULL DEFAULT 'NOT GIVEN'",
            "`gender` varchar(10) NOT NULL DEFAULT 'NOT GIVEN'",
            "`date_of_birth` varchar(20) NOT NULL DEFAULT 'NOT GIVEN'",
            "`student_photo` varchar(100) NOT NULL DEFAULT 'NOT GIVEN'");
            unset($_SESSION['basicDetails']);
        }

        // Create table for communincation details

        if (isset($_SESSION['communicationDetails'])){
            array_push($queryColumnArray,"`present_address` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`permanent_address` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`mobile_number` varchar(50) NOT NULL DEFAULT 'NOT GIVEN'",
            "`email` varchar(100) NOT NULL DEFAULT 'NOT GIVEN'");
            unset($_SESSION['communicationDetails']);
        }

        // Create table for educationalDetails

        if (isset($_SESSION['educationalDetails'])){
            array_push($queryColumnArray,"`SSC` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`HSC` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`diploma` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`engg_1st_sem` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`engg_2nd_sem` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`engg_3rd_sem` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`engg_4th_sem` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`engg_5th_sem` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`engg_6th_sem` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`engg_7th_sem` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`engg_8th_sem` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`backlog` varchar(5) NOT NULL DEFAULT 'NOT'");
            unset($_SESSION['educationalDetails']);
        }

        // Create table for internshipDetail

        if (isset($_SESSION['internshipDetail'])){
            array_push($queryColumnArray,"`internship_1` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`internship1_cer` varchar(200) NOT NULL DEFAULT 'NOT GIVEN'",
            "`internship_2` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`internship2_cer` varchar(200) NOT NULL DEFAULT 'NOT GIVEN'",
            "`internship_3` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`internship3_cer` varchar(200) NOT NULL DEFAULT 'NOT GIVEN'");
            unset($_SESSION['internshipDetail']);
        }

        // Create table for personalSkill

        if (isset($_SESSION['personalSkill'])){
            array_push($queryColumnArray,"`activities` varchar(100) NOT NULL DEFAULT 'NOT GIVEN'",
            "`hobbies` varchar(100) NOT NULL DEFAULT 'NOT GIVEN'",
            "`language_1` varchar(200) NOT NULL DEFAULT 'NOT GIVEN'",
            "`language_2` varchar(200) NOT NULL DEFAULT 'NOT GIVEN'",
            "`language_3` varchar(200) NOT NULL DEFAULT 'NOT GIVEN'",
            "`language_4` varchar(200) NOT NULL DEFAULT 'NOT GIVEN'");
            unset($_SESSION['personalSkill']);
        }

        // Create table for projectDetail

        if (isset($_SESSION['projectDetail'])){
            array_push($queryColumnArray,"`minor_project` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`mini_project` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`major_project` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'");
            unset($_SESSION['projectDetail']);
        }

        // Create table for awardsAndAchievment

        if (isset($_SESSION['awardsAndAchievment'])){
            array_push($queryColumnArray,"`award` varchar(200) NOT NULL DEFAULT 'NOT GIVEN'",
            "`prize` varchar(200) NOT NULL DEFAULT 'NOT GIVEN'",
            "`scholarship` varchar(200) NOT NULL DEFAULT 'NOT GIVEN'");
            unset($_SESSION['awardsAndAchievment']);
        }

        // Create table for certificate

        if (isset($_SESSION['certificate'])){
            array_push($queryColumnArray,"`certificate` varchar(255) NOT NULL DEFAULT 'NOT GIVEN'",
            "`certificate_files` varchar(400) NOT NULL DEFAULT 'NOT GIVEN'");
            unset($_SESSION['certificate']);
        }

    $company_name = str_replace(' ', '', $company_name);

    $queryColumnFinal = implode(",",$queryColumnArray);
    $stmt1 = $conn->prepare("create table if not exists $company_name ($queryColumnFinal)");
    if ($stmt1->execute()){
        echo "Table Created Successfully accoording to your choice";
    }
    $stmt->close();
    $stmt1->close();
    $conn->close();
    }
?>