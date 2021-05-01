<?php

    require 'API/db.php';
    if(!empty($_GET['code']) && isset($_GET['code'])){
        $code = $_GET['code'];
        $sql = "select * from sign_up WHERE activationcode = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$code);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $num = $result->fetch_assoc();
        if(count($num) > 0)
        {
            $st = 0;

            $sql = "SELECT id FROM sign_up WHERE activationcode = ? and status = ? ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss",$code,$st);
            $stmt->execute();
            $result = $stmt->get_result();
            $result4 = $result->fetch_assoc();
            if($result4>0)
            {
                $st=1;
                
                $sql = "UPDATE sign_up SET status = ? WHERE activationcode = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss",$st,$code);
                $stmt->execute();
                $msg="Your account is activated";
                echo $msg;
            }
            else
            {
            $msg ="Your account is already active, no need to activate again";
            echo $msg;
            }
        }
        else
        {
            $msg ="Wrong activation code.";
            echo $msg;
        }
    }
?>