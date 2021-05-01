<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "placement_cell";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if (!$conn) {
        die("Connection Faild due to ". $conn->connect_error);
    }

?>