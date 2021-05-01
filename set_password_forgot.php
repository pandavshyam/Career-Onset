<?php 
    require 'API/db.php';
    if (isset($_GET['fp_code'])){
        $p = $_GET['fp_code'];
        $p = base64_decode($p);
    }

    
    if(isset($_POST['submit'])){

        $pas1 = $_POST['pass1'];
        $pas2 = $_POST['pass2'];
        $email = $_POST['email'];
        if($pas1 == $pas2){
            $password = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
            $sql = "update sign_up set password = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss",$password,$email);
            if ($stmt->execute()){
                echo "Password Changed Successfully";
            } else {
                echo "Problem Occured";
            }
        }
        else{
            echo "Password Not Match";
        }
    }
?>
<html>
    <head>
        <title>Set Password</title>
    </head>


<style>

</style>

<body>
    
   <form action="set_password_forgot.php" method="post">
       <input type="hidden" name="email" value="<?php echo $p;?>">
        <input type="text" name="pass1" placeholder="Enter the Password"><br>
        <input type="text" name="pass2" placeholder="Confirm the Password"><br>
        <button name="submit" type="submit">Submit</button>
   </form>
</body>

</html>