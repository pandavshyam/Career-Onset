<?php
    require_once 'API/db.php';

    $sql = "delete from session where sid= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$_COOKIE['sid']);
    if ($stmt->execute()){
        setcookie("sid",$_COOKIE['sid'] , time()-3600 , '/');
        header("refresh:0;url=index.php");
    } else {
        echo "Problem occured! Please try again";
    }
?>