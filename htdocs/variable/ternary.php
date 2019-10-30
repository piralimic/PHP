<?php
// TERNARY VERSION
$age = 24;
$is_adult = ($age >= 18) ? true : false;
// $is_adult is true


// CLASSIC VERSION
$age = 24;
if ($age >= 18)
{
	$is_adult = true;
} else {
	$is_adult = false;
}
// $is_adult is true



$gender = "M";

$hello = ($gender == 'M') ? 'Bonjour Poulet' : 'Bonjour Poulette';

echo $hello.'<br><br>';





// NESTED TERNARY
// https://stackoverflow.com/questions/6224330/understanding-nested-php-ternary-operator/6224398

$newGender = 3;
// utilisation correcte des parenthèses et tu peux enchaîner les brochettes
$greeting = ($newGender === 1 ? 'Hi Unicorn' : ($newGender === 2 ? 'Hello Kitty' : 'Wake up Neo'));

echo $greeting;
 ?>
