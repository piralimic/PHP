<?php
// EXEMPLE 1
if( $temperature >= 15 ) {
   // code to execute if the condition results TRUE
   $clothes = "T-shirt";
   $should_i_wear_a_scarf = false;
 } else {
   // code to execute if the condition results FALSE
   $clothes = "Pull-over";
   $should_i_wear_a_scarf = true;
 }

 if ($should_i_wear_a_scarf == true){
	 // this is a "fake" function for the sake of the example
	 // that function is only executed in the condition is true
	 // grab_scarf_from_door_hanger();
 }
 // The following function will be executed everytime,
 // but its $clothes argument changes according to the result
 // of our previous conditional structure
 // cover_my_chest_with($clothes);

// EXEMPLE 2
if ( $age <= 12 AND $language == "English" ) {
	echo "Hello kiddo!";
} else {
	echo "Good day stranger !";
  echo "<br>";
}



/****************************************************
 * Series of exercises on PHP conditional structures.
*****************************************************/
// 1.1 Clean your room Exercise

$possible_states = array(
  0 => 'health',
  1 => 'hazard',
  2 => 'filthy',
  3 => 'dirty',
  4 => 'clean',
  5 => 'immaculate');

$room_filthiness = $possible_states[0];

if($room_filthiness == 'hazard' OR $room_filthiness == 'filthy' OR $room_filthiness == 'dirty'){
	echo "Yuk, Room is dirty : let's clean it up !";
	//cleanup_room();
	echo "<br>Room is now clean!";
	$room_filthiness = 'clean';
} else {
	echo "<br>Nothing to do, room is neat.<br><br><br>";
}


// 2. "Different greetings according to time" Exercise


date_default_timezone_set("Europe/Brussels");
$now = date('Gi'); // How to get the current time in PHP ? Google is your friend ;-)

// Test the value of $now and display the right message according to the specifications.
if($now >= '500' AND $now <= '900'){
  echo "Good morning !<br><br>";
} elseif ($now >= '901' AND $now <= '1200') {
  echo "Good day !<br><br>";
} elseif ($now >= '1201' AND $now <= '1600') {
  echo "Good afternoon !<br><br>";
} elseif ($now >= '1601' AND $now <= '2100') {
  echo "Good evening !<br><br>";
} elseif ($now >= '2101' OR $now <= '459') {
  echo "Good night !<br><br>";
}


// 3. "Different greetings according to age" Exercise
$lang = array(
  0 => 'Hello',
  1 => 'Aloha');


if (isset($_GET['english']) AND $_GET['submit'] == 'Greet me now') {
  $i = $_GET['english'];
  if (isset($_GET['age'])){
  	// Form processing
    if (isset($_GET['gender'])) {
      $gender = $_GET['gender'];
    }
    if ($gender == '') {
      echo 'Please chose a gender';
    } else {
      if($_GET['age'] == ''){
        echo 'Please enter a valid number';
      } else {
        $age = $_GET['age'];

        if($age < '12'){
          if ($gender == 'man') {
            echo $lang[$i].' Mister kiddo!';
          } else {
            echo $lang[$i].' Miss kiddo!';
          }
        } elseif ($age >= '12' AND $age < '18') {
          if ($gender == 'man') {
            echo $lang[$i].' Mister Teenager !';
          } else {
            echo $lang[$i].' Miss Teenager !';
          }
        } elseif ($age >= '18' AND $age < '115') {
          if ($gender == 'man') {
            echo $lang[$i].' Mister Adult !';
          } else {
            echo $lang[$i].' Miss Adult !';
          }
        } else {
          echo 'Wow! Still alive ? Are you a robot, like me ? Can I hug you ?';
        }
      }
    }
  }
} else {
  echo 'Please complete all the form before sending';
}
// Form (incomplete)
?>
<form method="get" action="">
  <label for="gender">GENDER : </label>
  <input type="radio" name="gender" value="man">Man</input>
  <input type="radio" name="gender" value="value">Woman</input>
  <br>
  <label for="english">DO YOU SPEAK ENGLISH ? </label>
  <input type="radio" name="english" value="0">Yes</input>
  <input type="radio" name="english" value="1">No</input>
  <br>
	<label for="age">AGE : </label>
	<input type="" name="age">
	<input type="submit" name="submit" value="Greet me now">
</form>

<hr>

<?php
// verifie si c'est bien le formulaire d'inscription
// test si la valeur pour 'gender' existe
if (isset($_GET['gender']) AND $_GET['submit'] == 'Subscribe') {
  $gender = $_GET['gender'];

  if(isset($_GET['age'])){
    $age = $_GET['age'];

    if ($age == '') {
      echo 'Please enter a valid number';
    } else {

      if ($gender == 'man' OR $age < '21' OR $age > '40') {
        echo 'Sorry you don\'t fit the criteria';
        } else {

          if (isset($_GET['name'])) {
            $name = ', '.$_GET['name'];
            echo 'Welcome to the team'.$name.' !';
          } else {
            echo 'welcome to the team !';
          }
        }
      }
    }
} else {
  // echo 'Please chose a gender';
}
// same exercice
// only using IF condition
$welcome = 'Please complete the form';

if ($_GET['submit'] == 'Sign up' && isset($_GET['gender']) && isset($_GET['age'])) {
  $welcome = 'Sorry you don\'t fit the criteria';
  $age = $_GET['age'];
  $name = $_GET['name'];
  if ($_GET['gender'] == 'woman' && $age > '20' && $age < '41') {
    $welcome = 'Welcome to the team '.$name.'!';
  }
}

echo $welcome;

 ?>

<form method="get" action="">
  <label for="gender">Gender : </label>
  <input type="radio" name="gender" value="man">Man</input>
  <input type="radio" name="gender" value="woman">Woman</input>
  <br>
  <label for="name">Name : </label>
	<input type="text" name="name">
  <br>
	<label for="age">Age : </label>
	<input type="text" name="age">
	<input type="submit" name="submit" value="Sign up">
</form>


<?php

// FORM VALIDATION

$fullname = $_GET['fullname'];

if ( strlen($fullname) == 0 ){
  echo "Ahem. You forgot to enter your name.";
  exit;
}

 ?>
