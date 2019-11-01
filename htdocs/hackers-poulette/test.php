<?php
// 1. Sanitization
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// 2. Validation
$errors = [];
if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $errors['email'] = "Your email address '$email' is invalid";
}

// 3. execution
if (count($errors)> 0){
	echo "ERROR : your message was not sent!<ul>";
  foreach($errors as $error) {
      echo("<li>$error</li>");
  }
  echo "</ul>";
  exit;
}

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

echo("From : $email<br>");
echo("Subject : [Hackers Poulette] contact form - $subject<br><br>");
echo("$gender $firstName $lastName from $country wrote :<br>");
echo("<p>$message<p>");


echo("<p>Your message has been correctly sent, thank you !</p>");
echo("<p>We will answer to $email as soon as possible.</p>");
 ?>
