<?php
    if(isset($_COOKIE['sid'])){
        require 'API/db.php';

        $sql = "select sid,type from session where sid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$_COOKIE['sid']);
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($row['type'] == "Teacher"){
                header("refresh:0;url=teacher_index.php");
            } else {
                header("refresh:0;url=student_index.php");            
            }
        }
    }
?>
<?php
    session_start();
    require 'API/db.php';
    if (isset($_GET['cn'])){
        $_SESSION['company_name'] = $_GET['cn'];
    }
    $user_exists = $email = $password = "";
    if (isset($_SESSION['msg'])){
        $user_exists = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    if (isset($_POST['action'])){
        $email = $_POST['email'];

        $sql = "select full_name,email,password,status from sign_up where email= ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if (password_verify($_POST['password'], $row['password'])){
                if ($row['status'] == 1){
                    $session_id = md5(uniqid(mt_rand(), true));
                    $sql1 = "insert into session (sid,type,email) values (?,?,?)";
                    $stmt = $conn->prepare($sql1);
                    $type = "Student";
                    $stmt->bind_param("sss",$session_id,$type,$email);
                    if ($stmt->execute()){
                        setcookie('sid', $session_id , time()+60*60*7 , '/');
                        if (isset($_SESSION['company_name'])){
                            $company_name = $_SESSION['company_name'];
                            unset($_SESSION['company_name']);
                            
                            header("refresh:0;url=dyanamic_form.php?company_name=$company_name");
                        } else {
                            
                            header("refresh:0;url=student_index.php");
                        }
                        // 
                    }
                        
                     else {
                        $user_exists = "Problem occured! Please try again";
                    }
                } else{
                    $user_exists = "Please Verify Your Email";
                }
                
            } else {
                $user_exists = "Enter Correct Password";
            }
        } 
        else if ($result->num_rows == 0){
            $sql1 = "select email,password from sign_up_teacher where email= ?";

            $stmt1 = $conn->prepare($sql1);
            $stmt1->bind_param("s",$email);
            $stmt1->execute();
            $result1 = $stmt1->get_result();

            if($result1->num_rows > 0){
                $row1 = $result1->fetch_assoc();
                if ($_POST['password'] == $row1['password']){
                    $session_id = md5(uniqid(mt_rand(), true));
                    $sql1 = "insert into session (sid,type,email) values (?,?,?)";
                    $stmt = $conn->prepare($sql1);
                    $type = "Teacher";
                    $stmt->bind_param("sss",$session_id,$type,$email);
                    if ($stmt->execute()){
                        setcookie('sid', $session_id , time()+60*60*7 , '/');
                        header("refresh:0;url=teacher_index.php");
                    } else {
                        
                        $user_exists = "Problem occured! Please try again";
                    }
                }
                else
                {
                    $user_exists = "Enter Correct Password";
                }
            }
        }
        
        else {
            $user_exists = "";
            $user_exists = "Sorry, but account not found";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

</head>
<style>
    body {
        height: 100%;
        width: 100%;
    }
    header {
        border-radius: 400px;
    }
    
    .p {
        width: 100%;
        display: grid;
        grid-template-columns: auto auto;
    }
    
    .itm1 {
        width: 100%;
        background: #94bbe9;
        height: 667px;
    }
    
    .itm2 {
        width: 100%;
    }
    
    .card {
        height: 500px;
    }
    
    .pp {
        width: 400px;
        /* border: 2px solid black; */
        height: 200px;
        margin-left: 160px;
        margin-top: 50px;
    }
    
    .g {
        width: 100%;
        margin-left: 60px;
    }
    .g img {
        width: 500px;
        height: 100%;
    }
    
    #pass {
        display: inline;
    }
    
    @media screen and (max-width: 670px) {
        .itm1 {
            display: none;
        }
        .pp {
            margin-left: 60px;
            width: 100%;
        }
    }
</style>

<body>


    <div class="p">
        <div class="itm1">
            <div class="g">
            <br><br><br><br>
            <img src="public/img/login.svg" alt="">
            </div>
        </div>
        <div class="itm2">
            <div class="cc">
                <div class="pp">
                    <center>
                        <h3>Login</h3>
                        <b style="color: red;"><?php echo $user_exists;?></b>
                    </center><br><br><br>
                    <div class="form">

                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input id="email" type="email" name="email" class="validate" required value="<?php echo $email;?>">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" type="password" name="password" class="validate" required>

                                <label for="password">Password</label>
                            </div>
                            <p>
                                <label>
                                    <input type="checkbox" onclick="myFunction()" />
                                    <span>Show Password</span>
                                </label>
                            </p>
                            <center><button type="submit" class="btn waves-effect waves-light blue darken-1" id="submit" name="action">Login
                                <i class="material-icons right">send</i>
                            </button></center><br><br>
                            <center><a href="forget_password.php">Forgot Password?</a> </center>
                            <br><br>
                            <center>Don't Have an Account? <a href="signup.php">Signup</a></center>
                            <hr><br>
                            <center><img height="30px" src="public/img/google.png" alt=""> &nbsp;&nbsp;&nbsp;
                                
                                <img height="40px;" src="public/img/twitter.jpg" alt=""> &nbsp;
                                
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("password");

            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>
<?php
    $conn->close();
?>