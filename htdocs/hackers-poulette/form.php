<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './src/lib/Exception.php';
require './src/lib/PHPMailer.php';
require './src/lib/SMTP.php';

// 1. Sanitization
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// 2. Validation
$errors = [];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors['email'] = "Your email address '$email' is invalid";
}

// 3. Execution
if (count($errors)> 0){
  $phpFilterEmail = '<h5>ERROR : contact form not sent!</h5><ul>';
  foreach($errors as $error) {
    $phpFilterEmail = $phpFilterEmail."<li>$error</li>";
  }
  $phpFilterEmail = $phpFilterEmail.'</ul><br>';

} else {
  $phpFilterEmail = '0';
  $gender = ($_POST['gender'] == '1') ? 'Miss' : 'Mister';
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $country = $_POST['country'];
  switch ($_POST['subject']) {
    case '1':
    $subject = "customer service";
    break;
    case '2':
    $subject = "question about product";
    break;
    default:
    $subject = "others";
  };
  $message = $_POST['message'];

}
/**
* This example shows settings to use when sending via Google's Gmail servers.
* This uses traditional id & password authentication - look at the gmail_xoauth.phps
* example to see how to use XOAUTH2.
* The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
*/
if ($phpFilterEmail == '0') {
  //Create a new PHPMailer instance
  $mail = new PHPMailer;

  //Tell PHPMailer to use SMTP
  $mail->isSMTP();

  //Enable SMTP debugging
  // SMTP::DEBUG_OFF = off (for production use)
  // SMTP::DEBUG_CLIENT = client messages
  // SMTP::DEBUG_SERVER = client and server messages
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  // use
  // $mail->Host = gethostbyname('smtp.gmail.com');
  // if your network does not support SMTP over IPv6

  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
  $mail->Port = 587;

  //Set the encryption mechanism to use - STARTTLS or SMTPS
//  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->SMTPSecure = 'tls';


  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;

  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = 'becode.liege.jepsen2.14@gmail.com';

  //Password to use for SMTP authentication
  $mail->Password = 'BeCode@Liege+Jepsen-2.14';

  //Set who the message is to be sent from
  $mail->setFrom('becode.liege.jepsen2.14@gmail.com', 'Hackers Poulette');

  //Set an alternative reply-to address
  //$mail->addReplyTo('jfs.tech.a5@gmail.com', 'Visitor');
  $mail->addReplyTo($email, $email);

  //Set who the message is to be sent to
  //$mail->addAddress('####@gmail.com', 'mic');
  $mail->addAddress($email, $email);

  //Set the subject line
  //$mail->Subject = 'Contact Form Hackers Poulette';
  $mail->Subject = "[Hackers Poulette] contact form - $subject";

  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

  $mail->isHTML(true);
  $mail->Body = "<p>$gender<br>$firstName $lastName,<br>from $country</p><p>$message</p>";

  //Replace the plain text body with one created manually
  $mail->AltBody = "$gender $firstName $lastName from $country wrote : $message";

  //Attach an image file
  // $mail->addAttachment('images/phpmailer_mini.png');

  //send the message, check for errors
  if (!$mail->send()) {
    $phpMailerError = 'Mailer Error: '. $mail->ErrorInfo;
    //echo 'Mailer Error: '. $mail->ErrorInfo;
  } else {
    //echo 'Message sent!';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
  }

  //Section 2: IMAP
  //IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
  //Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
  //You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
  //be useful if you are trying to get this working on a non-Gmail IMAP server.
  function save_mail($mail)
  {
    //You can change 'Sent Mail' to any other folder or tag
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
  }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="./src/css/main.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" href="./src/favicon.ico" type="image/png">
  <title>Hackers Poulette</title>
</head>
<body>
  <!-- BODY > Header > logo + page title -->
  <header>
    <div class="row">
      <div class="col s10 m6 offset-s1 offset-m3 center-align">
        <a href="http://localhost/hackers-poulette/">
          <img class="responsive-img" src="./src/img/hackers-poulette-logo.png" alt="Hackers Poulette text with a teal colour triumphal crown and five little stars at the bottom">
        </a>
      </div>
    </div>
  </header>
  <!-- END OF Header -->
  <!-- SECTION > Contact form -->
  <section>
    <div class="row">
      <div class="col s10 m6 offset-s1 offset-m3 center-align">
          <?php
          if ($phpFilterEmail) {
            echo($phpFilterEmail);
          } else {
            echo("<h5>Your message has been correctly sent, thank you !</h5>");
            echo("We will answer to $email as soon as possible.<br><br><br>");
            echo('<div class="tenor-gif-embed" data-postid="15139559" data-share-method="host" data-width="100%" data-aspect-ratio="1.1857142857142857"><a href="https://tenor.com/view/chicken-chicken-bro-juggling-gif-15139559">Chicken Chicken Bro GIF</a> from <a href="https://tenor.com/search/chicken-gifs">Chicken GIFs</a></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script>');
          }
          if ($phpFilterEmail OR $phpMailerError) {
            echo('<div class="tenor-gif-embed" data-postid="14109607" data-share-method="host" data-width="100%" data-aspect-ratio="1.1851851851851851"><a href="https://tenor.com/view/chicken-chicken-bro-gif-14109607">Chicken Chicken Bro GIF</a> from <a href="https://tenor.com/search/chicken-gifs">Chicken GIFs</a></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script>');
          }
          ?>
      </div>
    </div>
  </section>
  <!-- END OF Contact form -->
  <!-- BODY > Footer > copyight + privacy policy -->
  <footer class="page-footer grey darken-4">
    <div class="footer-copyright">
      <div class="container">
        © 2017 Hackers Poulette
        <a class="grey-text text-lighten-4 right" href="#">Privacy policy</a>
      </div>
    </div>
  </footer>
  <!--JavaScript at end of body for optimized loading-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script type="text/javascript" src="./src/js/main.js"></script>
</body>
</html>
