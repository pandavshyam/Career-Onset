<?php

    require_once 'API/db.php';
    if (isset($_GET['id'])){
        $stmt = $conn->prepare("SELECT certificate_files FROM master_database WHERE id = ? ");
        $stmt->bind_param("s",$_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1){
            $rows = $result->fetch_assoc();
            $fileArray = explode(",",$rows['certificate_files']);
            $count = count(explode(",",$rows['certificate_files']));
            for ($i = 0; $i < $count; $i++){
                echo $fileArray[$i];

                $t = str_split($fileArray[$i],strpos($fileArray[$i],"upload"));
                echo "<img src='$t[1]' height='700px' width='500px' style='margin-left: 10px;'>";
            }
        }
    }

    // From teacher__company_submissions.php (To get company name (table name) and id of perticular row)
    if (isset($_GET['did'])){
        $company_name = base64_decode($_GET['cn']);
        $stmt = $conn->prepare("SELECT certificate_files FROM $company_name WHERE id = ? ");
        $stmt->bind_param("s",$_GET['did']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1){
            $rows = $result->fetch_assoc();
            
            $fileArray = explode(",",$rows['certificate_files']);
            $count = count(explode(",",$rows['certificate_files']));
            for ($i = 0; $i < $count; $i++){
                echo $fileArray[$i];

                $t = str_split($fileArray[$i],strpos($fileArray[$i],"upload"));
                echo "<img src='$t[1]' height='700px' width='500px' style='margin-left: 10px;'>";
            }
        }
    }
    
?>