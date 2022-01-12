<?php

$name=$_POST['name']; 
$email=$_POST['email'];  
$subject = $_POST['subject'];
$message=$_POST['message'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                 //SMTP username
    $mail->Password   = '';                      //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->setFrom('admin@radoncosmos.in', 'Radon Cosmos');
    $mail->addAddress('ranjan.rashmi2016@outlook.com', 'Rashh');
    $mail->addReplyTo('admin@radoncosmos.in', 'Rashh');
    $mail->addCC('adyarath1@gmail.com');
    $mail->addCC($email);

    $mail->isHTML(true);
    $mail->Subject = 'Message from Radon Cosmos Quiz Portal';
    $mail->Body    = '

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="display: flex;
justify-content: center;
align-items: center;
font-family: Verdana, Geneva, Tahoma, sans-serif;">
<table>
    <caption style="
    text-align: center;
    font-size: 20px;
    background-color: purple;
    color: white;
    padding: 20px 20px 20px 20px;
    border-radius: 5px;">Thanks for reaching us</caption>

        <tr style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;">
                 <td style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;
        padding: 10px 10px 10px 10px;"> Name : </td>
                <td style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;
        padding: 10px 10px 10px 10px;">'.$name.'</td>
            </td>
        </tr>
        
        <tr style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;">
                 <td style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;
        padding: 10px 10px 10px 10px;"> Email : </td>
                <td style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;
        padding: 10px 10px 10px 10px;">'.$email.'</td>
            </td>
        </tr>
        <tr style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;">
                 <td style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;
        padding: 10px 10px 10px 10px;"> Subject : </td>
                <td style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;
        padding: 10px 10px 10px 10px;">'.$subject.'</td>
            </td>
        </tr>
        
        <tr style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;">
                 <td style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;
        padding: 10px 10px 10px 10px;"> Message : </td>
                <td style="
        border: 2px solid red;
        border-radius: 5px;
        border-collapse: collapse;
        padding: 10px 10px 10px 10px;">'.$message.'</td>
            </td>
        </tr>
</table>
</body>
</html>

';

    $mail->send();
    echo '<script>alert("Your message has been sent successfully!")</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

<head><meta http-equiv="refresh" content="0; URL='https://radoncosmos.in/'"/> </head>