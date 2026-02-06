<?php

$email = "lupucatalina400@gmail.com";
$to = "lupucatalina400@gmail.com";
$subject = "Un nou contact s-a inregistrat";
$headers = "From: $email\n";
$message = "A visitor to your site has sent the following email adress to be added to your mailing list.\n";

mail($to,$subject,$message,$headers);

if(isset($_POST['send_message_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $usersubject = $_POST['subject'];
    $msg = $_POST['msg'];

    $userheaders = "From: lupucatalina400@gmail.com\n";
    $userheaders .= "MIME-Version: 1.0" . "\n";
    $userheaders .= "Content-type: text/html;charset=UTF-8" . "\r\n";
    $usermessage = "Thank you for subscribing to our mailing list.";
    $usermessage = "
    <html>
    <head>
        <title>HTML email</title>
    </head>
    <body>
        <h2> Mail trimis </h2>
        <p>This email contains HTML Tags!</p>
        <table>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            </tr>
            <tr>
            <td>$name</td>
            <td>$email</td>
            <td>$usersubject</td>
            </tr>
        </table>
        <p>$msg</p>
    </body>
    </html>
    
    ";
    mail($email, $usersubject, $usermessage, $userheaders);
    echo "<h2>Mail trimis</h2>";
}?>