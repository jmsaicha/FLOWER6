<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try{
        //smtp settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "example@gmail.com"; //Gmail address which you want to use as SMTP server
        $mail->Password = 'password'; //Gmail address Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' =>true
            )
            );

        //email settings
        $mail->isHTML(true);
        $mail->setFrom('example@gmail.com'); //Gmail address which you used as SMTP server
        $mail->addAddress("example@gmail.com"); //Email address where you want to receive emails{ can be any gmail address}
        $mail->Subject = ('Message Received (Contact Page)');
        $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message </h3>";

        $mail->send();
        $alert = '<div class="alert alert-success" role="alert">
                       <span>Message sent! Thank you for contacting us.</span>
                  </div>';

    }catch (Exception $e){
        $alert ='<div class="alert-error">
                      <span>'.$e->getMessage().'</span>
                </div>';
    }
}
?>
