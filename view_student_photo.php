<?php

    require_once 'API/db.php';
    // From master form (main registration form)
    if (isset($_GET['id'])){
        $stmt = $conn->prepare("SELECT student_photo FROM master_database WHERE id = ? ");
        $stmt->bind_param("s",$_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1){
            $rows = $result->fetch_assoc();
            $t = str_split($rows['student_photo'],strpos($rows['student_photo'],"upload"));
            echo "<img src='$t[1]' height='250px' width='250px' style='margin-left: 10px;'>";
        }
    }
    // From teacher__company_submissions.php (To get company name (table name) and id of perticular row)
    if (isset($_GET['did'])){
        $company_name = base64_decode($_GET['cn']);
        $id = $_GET['did'];
        
        $stmt1 = $conn->prepare("SELECT student_photo FROM $company_name WHERE id = ? ");
        $stmt1->bind_param("s",$_GET['did']);
        $stmt1->execute();
        $result = $stmt1->get_result();
        if ($result->num_rows == 1){
            $rows = $result->fetch_assoc();
            $t = str_split($rows['student_photo'],strpos($rows['student_photo'],"upload"));
            echo "<img src='$t[1]' height='250px' width='250px' style='margin-left: 10px;'>";
        }
    }
?>