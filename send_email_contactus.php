<?php
// Start or resume the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['submit_contactus'])){

    // echo "<script>alert('Your contact form has been submitted');</script>";
  

    $name = $_POST['customer_name'];
    $email = $_POST['customer_emailaddress'];
    $contact_number = $_POST['customer_contact_number'];
    $message = $_POST['customer_message'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    
    $mail->Username   = 'sandeepacharithwebdev@gmail.com';                     //SMTP username
    $mail->Password   = 'ygjbdxaxttbkufok';                               //SMTP password
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to;465 use  if you have set `SMTPSecure = PHPMailer::ENCRYPTION_SMTPS`

    //Recipients
    $mail->setFrom('sandeepacharithwebdev@gmail.com', 'D&SE_Company Admin');
    $mail->addAddress('sandeepacharithwebdev@gmail.com', 'Joe User');     //Add a recipient
    
    
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contact Us --- D & SE Tradings';
    $mail->Body    = '<h1>You got a new Contact Email from D & SE Trading web Page</h1>
    <h4>Full name :'.$name.'</h4>
    <h4>Mobile Number :'.$contact_number.' </h4>
    <h4>Email address: '.$email.'</h4>
    <h4>Message :'.$message.'</h4>
    
    ';


    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

   if($mail->send()){

    $_SESSION['email_status']="Thank you for contact Us-D & SE Tradings.";
    header("Location:{$_SERVER["HTTP_REFERER"]}");
    // echo "<script>alert('Message has been sent');</script>";
    exit(0);
   
   }else{
    $_SESSION['email_status']="There was an error sending your message. Please try again later-D & SE Tradings.";
    echo "<script>alert('Message has not been sent ,Please Try again later');</script>";
    header('Location:index.php');
    
   }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}
else{
   header('Location:index.php');
   exit(0);
}


?>
