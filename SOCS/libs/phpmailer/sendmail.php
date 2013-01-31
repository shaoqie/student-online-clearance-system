<?php
require_once('class.phpmailer.php');

//sendMail("Biloy", "kristofferkrisanore@gmail.com", "http://somewhere.com/gsuigubegs");

function sendMail($studentName, $studentEmail, $verificationLink){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host       = "mail.yourdomain.com"; // SMTP server
    $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
    $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
    $mail->Username   = "yasaka.nyaruko@gmail.com";  // GMAIL username
    $mail->Password   = "4212012yasakanyaruko";            // GMAIL password
    
    
    $mail->SetFrom('yasaka.nyaruko@gmail.com', 'Yasaka Nyaruko');
    $mail->AddReplyTo("yasaka.nyaruko@gmail.com","Yasaka Nyaruko");

    $mail->Subject    = "SOCS email verification ";
    
    $body = "Welcome to Student Online Clearance System(SOCS)! " . "</br>" .
            "<br/>Hello $studentName, <br/>" .
            "You have chosen to register an account on Student Online Clearance System. <br/>".
            "<a href=\"$verificationLink\">$verificationLink<a/> <br/>" .
            "Please click on above's link to confirm your registration..".
            "Thank you :)";
    
    $mail->MsgHTML($body);

    $address = $studentEmail;
    $mail->AddAddress($address, $studentName);
    //$mail->Send();
    
    if(!$mail->Send()) {
      return false;
    } else {
      return true;
    }

}

?>
