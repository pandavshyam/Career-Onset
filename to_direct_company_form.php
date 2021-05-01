<?php
    $company_name = base64_decode($_GET['cn']);
    header("refresh:0;url=login.php?cn=$company_name");
?>