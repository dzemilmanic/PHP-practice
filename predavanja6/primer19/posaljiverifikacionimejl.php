<?php
    // session_start();
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    //Load Composer's autoloader
    //require 'vendor/autoload.php';

    //require 'config.php';
    //Load Composer's autoloader
    // require 'vendor/autoload.php';

    $recieverMail = "umarovac@gmail.com";//$_GET['mail'];
	//jedinstven kod
    $code = uniqid(true);
	//ubacujemo vezu u bazu
   // $query = mysqli_query($con, "INSERT INTO verification(Code, Email) VALUE('$code','$recieverMail')");
  
   // if(!$query){
     //   exit("Error");
    //}
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'programiranje.ia@gmail.com';                     //SMTP username //
        $mail->Password   = 'Zbirka2021+';                               //SMTP password  //
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('programiranje.ia@gmail.com', 'PIA');
        $mail->addAddress("$recieverMail");     //Add a recipient
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/verify.php?code=$code";
        
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Account verification';
        $mail->Body    = "
        <h2 style='font-weight:400;'>
            You requested a verification link.<br>
            Click
            <a href=".$url.">here</a>
            to do so verify your account. 
        </h2>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    //header('location: verificationsent.php');
    //$_SESSION['warnResult'] = 'sent';
?>
