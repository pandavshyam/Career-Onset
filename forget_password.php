<?php 
    require 'API/db.php';
    $error = "";
    if(isset($_POST['forgotSubmit'])){
        $arrayEmail =  $_POST['email'];

        $sql = "select email from sign_up where email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$arrayEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0){

            $setPassLink = 'http://localhost/Web/Placement_project/Placement_Project/set_password_forgot.php?fp_code='.base64_encode($arrayEmail);

            require 'API/phpmailer/class.smtp.php';
                require 'API/phpmailer/PHPMailerAutoload.php';

                $mail = new PHPMailer();
                $mail->setFrom('admin@example.com');
                $mail->addAddress($arrayEmail);
                $mail->Subject = "MITAOE Placement Cell SET Password";
                $mail->Body = 'Dear "'.$arrayEmail.'", 
                Request has been made to change the password associated with your account. Please click below to reset password
                 <a href="'.$setPassLink.'">'.$setPassLink.'</a>
                 <br/><br/>Regards,
                 <br/>MITAOE Placement Cell';

                $mail->isHTML(true);
                $mail->AltBody = "This message is generated by plain text !";
                $mail->IsSMTP();
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'ssl://smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Port = 465;
                $mail->Username = 'pandavshyam@gmail.com';
                $mail->Password = 'Shyam@1998';
                if(!$mail->send()) {
                    $error = "Problem Occured";
                } else {
                    $error = 'Email has been sent. Please check your mail to reset password';
                }
            $error = "Please Check Your Email to Reset Password";
        } else {
            $error = "No account Found!";
        }
    }
?>


<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MITAOE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

</head>
<body>
    
<center>
      
      <div class="contact" id="contact">
          <section style="margin-top: 50px;" id="contact">
  
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">
             
                  <div class="card">
                  <span class="card-title center" style="font-weight: 500;font-size: 36px;">Forgot Password</span>
                  
      
    <div class="card-body">
      <form action="forget_password.php" method="POST">
          <?php echo $error;?>
      <div class="input-field col s8 offset-s2 blue-text">
      <i class="material-icons prefix">email</i>
      <input type="email"  name="email" Placeholder="Enter EmailAddress" required>
</div>
<div class="input-field col s8 offset-s2 blue-text">
      <button type="submit" class="btn btn-primary" name="forgotSubmit">Submit<i class="material-icons right">send</i></button>
     <br><br>
</div>
</form>
  </center>  
</body>
  </html>