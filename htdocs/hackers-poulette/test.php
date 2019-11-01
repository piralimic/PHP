<?php
$email = $_POST['email'];
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

 ?>
