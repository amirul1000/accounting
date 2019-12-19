<?php
 
//this functin processes the server return codes and generates errors if needed
function server_parse($socket, $expected_response)
{
    $server_response = '';
    while (substr($server_response, 3, 1) != ' ')
    {
        if (!($server_response = fgets($socket, 256)))
            echo 'Couldn\'t get mail server response codes. Please contact the forum administrator.', __FILE__, __LINE__;
    }
 
    if (!(substr($server_response, 0, 3) == $expected_response))
        echo 'Unable to send e-mail. Please contact the forum administrator with the following error message reported by the SMTP server: "'.$server_response.'"', __FILE__, __LINE__;
}
 
//
// This function was originally a part of the phpBB Group forum software phpBB2 (http://www.phpbb.com).
// They deserve all the credit for writing it. I made small modifications for it to suit PunBB and it's coding standards.
// -------> This message is from punBB developer
//
function smtp_mail($to, $subject, $message, $headers = '')
{
    $headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									

    $recipients = explode(',', $to);
    $user = 'doe.dhaka.division@gmail.com';
    $pass = 'doe123456';
    $smtp_host = 'ssl://smtp.gmail.com';
    $smtp_port = 465;
 
    if (!($socket = fsockopen($smtp_host, $smtp_port, $errno, $errstr, 15)))
        echo "Could not connect to smtp host '$smtp_host' ($errno) ($errstr)", __FILE__, __LINE__;
 
    server_parse($socket, '220');
 
    fwrite($socket, 'EHLO '.$smtp_host."\r\n");
    server_parse($socket, '250');
 
    fwrite($socket, 'AUTH LOGIN'."\r\n");
    server_parse($socket, '334');
 
    fwrite($socket, base64_encode($user)."\r\n");
    server_parse($socket, '334');
 
    fwrite($socket, base64_encode($pass)."\r\n");
    server_parse($socket, '235');
 
    fwrite($socket, 'MAIL FROM: <hadproportal@gmail.com>'."\r\n");
    server_parse($socket, '250');
 
    foreach ($recipients as $email)
    {
        fwrite($socket, 'RCPT TO: <'.$email.'>'."\r\n");
        server_parse($socket, '250');
    }
 
    fwrite($socket, 'DATA'."\r\n");
    server_parse($socket, '354');
 
    fwrite($socket, 'Subject: '.$subject."\r\n".'To: <'.implode('>, <', $recipients).'>'."\r\n".$headers."\r\n\r\n".$message."\r\n");
 
    fwrite($socket, '.'."\r\n");
    server_parse($socket, '250');
 
    fwrite($socket, 'QUIT'."\r\n");
    fclose($socket);
 
    return true;
}
 
// Send the mail
//if(smtp_mail('amirrucst@gmail.com', 'Hi! Test Mail', 'This is a test mail from xampp with fsockopen()'))
//{
 //   echo "Mail sent";
//}
//else
//{
  //  echo "Some error occured";
//}
?>