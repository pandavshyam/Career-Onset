<?php

    require_once 'API/db.php';
    if (isset($_GET['id'])){
        $stmt = $conn->prepare("SELECT internship1_cer FROM master_database WHERE id = ? ");
        $stmt->bind_param("s",$_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1){
            $rows = $result->fetch_assoc();
            $t = str_split($rows['internship1_cer'],strpos($rows['internship1_cer'],"upload"));
            echo "<img src='$t[1]' height='700px' width='500px' style='margin-left: 10px;'>";
        }
    }

    // From teacher__company_submissions.php (To get company name (table name) and id of perticular row)
    if (isset($_GET['did'])){
        $company_name = base64_decode($_GET['cn']);
        $id = $_GET['did'];
        
        $stmt1 = $conn->prepare("SELECT internship1_cer FROM $company_name WHERE id = ? ");
        $stmt1->bind_param("s",$_GET['did']);
        $stmt1->execute();
        $result = $stmt1->get_result();
        if ($result->num_rows == 1){
            $rows = $result->fetch_assoc();
            $t = str_split($rows['internship1_cer'],strpos($rows['internship1_cer'],"upload"));
            echo "<img src='$t[1]' height='700px' width='500px' style='margin-left: 10px;'>";
            print_r($t);
        }
    }
?>