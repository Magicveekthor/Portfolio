<?php 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function registerUser($email, $fullname){ 
//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->SMTPKeepAlive = true; // Set mailer to use SMTP                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@lauraamah.com';                     //SMTP username
    $mail->Password   = 'indbpffleedmswao';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@lauraamah.com', 'LAURA AMAH');
    $mail->addAddress($email);     //Add a recipient

    // //Attachments
    // $mail->addAttachment('img.jpeg', 'new.jpg');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '\fly.gif', 'logo');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '\soul.png', 'lauraamah');  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Account Registration Successful';
    $mail->Body    = "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <link href='https://fonts.googleapis.com/css2?family=Federo&display=swap' rel='stylesheet'>
    
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background: #f1f1f1;
        }
    
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
    
        div[style*='margin: 16px 0'] {
            margin: 0 !important;
        }
    
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
    
        img {
            -ms-interpolation-mode:bicubic;
        }
    
        a {
            text-decoration: none;
        }
    
        *[x-apple-data-detectors], 
        .unstyle-auto-detected-links *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
    
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }
    
        .im {
            color: inherit !important;
        }
    
        img.g-img + div {
            display: none !important;
        }
    
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u ~ div .email-container {
                min-width: 320px !important;
            }
        }
    
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u ~ div .email-container {
                min-width: 375px !important;
            }
        }
    
        @media only screen and (min-device-width: 414px) {
            u ~ div .email-container {
                min-width: 414px !important;
            }
        }
    
    </style>
    
    
    <style>
    
        .primary{
            background: #30e3ca;
        }
        .bg_white{
            background: #ffffff;
        }
        .bg_light{
            background: #fafafa;
        }
        .bg_black{
            background: #000000;
        }
        .bg_dark{
            background: rgba(0,0,0,.8);
        }
        .email-section{
            padding:2.5em;
        }
    
    
        .btn{
            padding: 10px 15px;
            display: inline-block;
        }
        .btn.btn-primary{
            border-radius: 5px;
            background: #30e3ca;
            color: #ffffff;
        }
        .btn.btn-white{
            border-radius: 5px;
            background: #ffffff;
            color: #000000;
        }
        .btn.btn-white-outline{
            border-radius: 5px;
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }
        .btn.btn-black-outline{
            border-radius: 0px;
            background: transparent;
            border: 2px solid #000;
            color: #000;
            font-weight: 700;
        }
    
        h1,h2,h3,h4,h5,h6{
            font-family: 'Federo', sans-serif;
            color: #000000;
            margin-top: 0;
            font-weight: 400;
        }
    
        body{
            font-family: 'Federo', sans-serif;
            font-weight: 400;
            font-size: 15px;
            line-height: 1.8;
            color: rgba(0,0,0,.4);
        }
    
        a{
            color: #30e3ca;
        }
    
    
        .logo img{
            width: 175px;
            height: auto;
        }
    
    
        .hero{
            position: relative;
            z-index: 0;
        }
    
        .hero .text{
            color: rgba(0,0,0,.3);
        }
        .hero .text h2{
            color: #000;
            font-size: 40px;
            margin-bottom: 0;
            font-weight: 400;
            line-height: 1.4;
        }
        .hero .text h3{
            font-size: 24px;
            font-weight: 300;
        }
        .hero .text h2 span{
            font-weight: 600;
            color: #30e3ca;
        }
    
    
    
        .heading-section h2{
            color: #000000;
            font-size: 28px;
            margin-top: 0;
            line-height: 1.4;
            font-weight: 400;
        }
        .heading-section .subheading{
            margin-bottom: 20px !important;
            display: inline-block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(0,0,0,.4);
            position: relative;
        }
        .heading-section .subheading::after{
            position: absolute;
            left: 0;
            right: 0;
            bottom: -10px;
            content: '';
            width: 100%;
            height: 2px;
            background: #30e3ca;
            margin: 0 auto;
        }
    
        .heading-section-white{
            color: rgba(255,255,255,.8);
        }
        .heading-section-white h2{
            line-height: 1;
            padding-bottom: 0;
        }
        .heading-section-white h2{
            color: #ffffff;
        }
        .heading-section-white .subheading{
            margin-bottom: 0;
            display: inline-block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,.4);
        }
    
        ul.social{
            padding: 0;
        }
        ul.social li{
            display: inline-block;
            margin-right: 10px;
        }
    
        .footer{
            border-top: 1px solid rgba(0,0,0,.05);
            color: rgba(0,0,0,.5);
        }
        .footer .heading{
            color: #000;
            font-size: 20px;
        }
        .footer ul{
            margin: 0;
            padding: 0;
        }
        .footer ul li{
            list-style: none;
            margin-bottom: 10px;
        }
        .footer ul li a{
            color: rgba(0,0,0,1);
        }
    
    </style>
    </head>
    
    <body width='100%' style='margin: 0; padding: 0 !important; background-color: #f1f1f1;'>
        <center style='width: 100%; background-color: #f1f1f1;'>
            <div style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; font-family: 'Federo', sans-serif;'>
                &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
            </div>
    
            <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
                <!-- BEGIN BODY -->
                <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
                    <tr>
                        <td valign='top' class='bg_white' style='padding: 1em 2.5em 0 2.5em;'>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                <tr>
                                    <td class='logo' style='text-align: center;'>
                                        <a href='#'><img src='cid:lauraamah'></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr><!-- end tr -->
    
                    <tr>
                        <td valign='middle' class='hero bg_white' style='padding: 3em 0 2em 0;'>
                            <img src='cid:logo' alt='' style='width: 300px; max-width: 600px; height: auto; margin: auto; display: block;'>
                        </td>
                    </tr><!-- end tr -->
    
                    <tr>
                        <td valign='middle' class='hero bg_white' style='padding: 2em 0 4em 0;'>
                            <table>
                                <tr>
                                    <td>
                                        <div class='text' style='padding: 0 2.5em; text-align: center;'>
                                            <h2>Hello, $fullname</h2>
                                            <h3>Your account registration is successful!</h3>
                                            <p><a href='lauraamah.com/shop.php' class='btn btn-primary'>Continue Shopping!</a></p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr><!-- end tr -->
                </table>
    
    
                <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
                    <tr>
                        <td valign='middle' class='bg_light footer email-section'>
                            <table>
                                <tr>
                                    <td valign='top' width='50%' style='padding-top: 20px;'>
                                        <table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
                                            <tr>
                                                <td style='text-align: left; padding-left: 5px; padding-right: 5px;'>
                                                    <h3 class='heading'>Contact Info</h3>
                                                    <ul>
                                                        <li><span class='text'>203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                                        <li><span class='text'>+2 392 3929 210</span></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
    
                                    <td valign='top' width='50%' style='padding-top: 20px;'>
                                        <table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
                                            <tr>
                                                <td style='text-align: left; padding-left: 10px;'>
                                                    <h3 class='heading'>Useful Links</h3>
                                                    <ul>
                                                        <li><a href='#'>Home</a></li>
                                                        <li><a href='#'>About</a></li>
                                                        <li><a href='#'>Services</a></li>
                                                        <li><a href='#'>Work</a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr><!-- end: tr -->
    
                    <tr>
                        <td class='bg_light' style='text-align: center;'>
                            <p>No longer want to receive these email? You can <a href='#' style='color: rgba(0,0,0,.8);'>Unsubscribe here</a></p>
                        </td>
                    </tr>
                </table>
    
            </div>
          </center>
    </body>
    </html>";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}




























function orderComplete($user_email){ 
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();
        $mail->SMTPKeepAlive = true; // Set mailer to use SMTP                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'info@lauraamah.com';                     //SMTP username
        $mail->Password   = 'indbpffleedmswao';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('info@lauraamah.com', 'LAURA AMAH');
        $mail->addAddress($user_email);     //Add a recipient
    
        // //Attachments
        // $mail->addAttachment('img.jpeg', 'new.jpg');
        $mail->AddEmbeddedImage(dirname(__FILE__) . '\fly.gif', 'logo');
        $mail->AddEmbeddedImage(dirname(__FILE__) . '\soul.png', 'lauraamah');  
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'LAURA AMAH - Payment Successful';
        $mail->Body    = "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <link href='https://fonts.googleapis.com/css2?family=Federo&display=swap' rel='stylesheet'>
        
        <style>
            html,
            body {
                margin: 0 auto !important;
                padding: 0 !important;
                height: 100% !important;
                width: 100% !important;
                background: #f1f1f1;
            }
        
            * {
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }
        
            div[style*='margin: 16px 0'] {
                margin: 0 !important;
            }
        
            table {
                border-spacing: 0 !important;
                border-collapse: collapse !important;
                table-layout: fixed !important;
                margin: 0 auto !important;
            }
        
            img {
                -ms-interpolation-mode:bicubic;
            }
        
            a {
                text-decoration: none;
            }
        
            *[x-apple-data-detectors], 
            .unstyle-auto-detected-links *,
            .aBn {
                border-bottom: 0 !important;
                cursor: default !important;
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }
        
            .a6S {
                display: none !important;
                opacity: 0.01 !important;
            }
        
            .im {
                color: inherit !important;
            }
        
            img.g-img + div {
                display: none !important;
            }
        
            @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                u ~ div .email-container {
                    min-width: 320px !important;
                }
            }
        
            @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                u ~ div .email-container {
                    min-width: 375px !important;
                }
            }
        
            @media only screen and (min-device-width: 414px) {
                u ~ div .email-container {
                    min-width: 414px !important;
                }
            }
        
        </style>
        
        
        <style>
        
            .primary{
                background: #30e3ca;
            }
            .bg_white{
                background: #ffffff;
            }
            .bg_light{
                background: #fafafa;
            }
            .bg_black{
                background: #000000;
            }
            .bg_dark{
                background: rgba(0,0,0,.8);
            }
            .email-section{
                padding:2.5em;
            }
        
        
            .btn{
                padding: 10px 15px;
                display: inline-block;
            }
            .btn.btn-primary{
                border-radius: 5px;
                background: #30e3ca;
                color: #ffffff;
            }
            .btn.btn-white{
                border-radius: 5px;
                background: #ffffff;
                color: #000000;
            }
            .btn.btn-white-outline{
                border-radius: 5px;
                background: transparent;
                border: 1px solid #fff;
                color: #fff;
            }
            .btn.btn-black-outline{
                border-radius: 0px;
                background: transparent;
                border: 2px solid #000;
                color: #000;
                font-weight: 700;
            }
        
            h1,h2,h3,h4,h5,h6{
                font-family: 'Federo', sans-serif;
                color: #000000;
                margin-top: 0;
                font-weight: 400;
            }
        
            body{
                font-family: 'Federo', sans-serif;
                font-weight: 400;
                font-size: 15px;
                line-height: 1.8;
                color: rgba(0,0,0,.4);
            }
        
            a{
                color: #30e3ca;
            }
        
        
            .logo img{
                width: 175px;
                height: auto;
            }
        
        
            .hero{
                position: relative;
                z-index: 0;
            }
        
            .hero .text{
                color: rgba(0,0,0,.3);
            }
            .hero .text h2{
                color: #000;
                font-size: 40px;
                margin-bottom: 0;
                font-weight: 400;
                line-height: 1.4;
            }
            .hero .text h3{
                font-size: 24px;
                font-weight: 300;
            }
            .hero .text h2 span{
                font-weight: 600;
                color: #30e3ca;
            }
        
        
        
            .heading-section h2{
                color: #000000;
                font-size: 28px;
                margin-top: 0;
                line-height: 1.4;
                font-weight: 400;
            }
            .heading-section .subheading{
                margin-bottom: 20px !important;
                display: inline-block;
                font-size: 13px;
                text-transform: uppercase;
                letter-spacing: 2px;
                color: rgba(0,0,0,.4);
                position: relative;
            }
            .heading-section .subheading::after{
                position: absolute;
                left: 0;
                right: 0;
                bottom: -10px;
                content: '';
                width: 100%;
                height: 2px;
                background: #30e3ca;
                margin: 0 auto;
            }
        
            .heading-section-white{
                color: rgba(255,255,255,.8);
            }
            .heading-section-white h2{
                line-height: 1;
                padding-bottom: 0;
            }
            .heading-section-white h2{
                color: #ffffff;
            }
            .heading-section-white .subheading{
                margin-bottom: 0;
                display: inline-block;
                font-size: 13px;
                text-transform: uppercase;
                letter-spacing: 2px;
                color: rgba(255,255,255,.4);
            }
        
            ul.social{
                padding: 0;
            }
            ul.social li{
                display: inline-block;
                margin-right: 10px;
            }
        
            .footer{
                border-top: 1px solid rgba(0,0,0,.05);
                color: rgba(0,0,0,.5);
            }
            .footer .heading{
                color: #000;
                font-size: 20px;
            }
            .footer ul{
                margin: 0;
                padding: 0;
            }
            .footer ul li{
                list-style: none;
                margin-bottom: 10px;
            }
            .footer ul li a{
                color: rgba(0,0,0,1);
            }
        
        </style>
        </head>
        
        <body width='100%' style='margin: 0; padding: 0 !important; background-color: #f1f1f1;'>
            <center style='width: 100%; background-color: #f1f1f1;'>
                <div style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; font-family: 'Federo', sans-serif;'>
                    &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                </div>
        
                <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
                    <!-- BEGIN BODY -->
                    <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
                        <tr>
                            <td valign='top' class='bg_white' style='padding: 1em 2.5em 0 2.5em;'>
                                <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td class='logo' style='text-align: center;'>
                                            <a href='#'><img src='cid:lauraamah'></a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr><!-- end tr -->
        
                        <tr>
                            <td valign='middle' class='hero bg_white' style='padding: 3em 0 2em 0;'>
                                <img src='cid:logo' alt='' style='width: 300px; max-width: 600px; height: auto; margin: auto; display: block;'>
                            </td>
                        </tr><!-- end tr -->
        
                        <tr>
                            <td valign='middle' class='hero bg_white' style='padding: 2em 0 4em 0;'>
                                <table>
                                    <tr>
                                        <td>
                                            <div class='text' style='padding: 0 2.5em; text-align: center;'>
                                                <h2>Congratulations</h2>
                                                <h3>Your order is confirmed and payment successful!</h3>
                                                <p><a href='lauraamah.com/shop.php' class='btn btn-primary'>Continue Shopping!</a></p>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr><!-- end tr -->
                    </table>
        
        
                    <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
                        <tr>
                            <td valign='middle' class='bg_light footer email-section'>
                                <table>
                                    <tr>
                                        <td valign='top' width='50%' style='padding-top: 20px;'>
                                            <table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
                                                <tr>
                                                    <td style='text-align: left; padding-left: 5px; padding-right: 5px;'>
                                                        <h3 class='heading'>Contact Info</h3>
                                                        <ul>
                                                            <li><span class='text'>203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                                            <li><span class='text'>+2 392 3929 210</span></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
        
                                        <td valign='top' width='50%' style='padding-top: 20px;'>
                                            <table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
                                                <tr>
                                                    <td style='text-align: left; padding-left: 10px;'>
                                                        <h3 class='heading'>Useful Links</h3>
                                                        <ul>
                                                            <li><a href='#'>Home</a></li>
                                                            <li><a href='#'>About</a></li>
                                                            <li><a href='#'>Services</a></li>
                                                            <li><a href='#'>Work</a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr><!-- end: tr -->
        
                        <tr>
                            <td class='bg_light' style='text-align: center;'>
                                <p>If you have any issues with payment, kindly send an email to <a href='#' style='color: rgba(0,0,0,.8);'>info@lauraamah.com</a></p>
                            </td>
                        </tr>
                    </table>
        
                </div>
              </center>
        </body>
        </html>";
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    }
    
?>