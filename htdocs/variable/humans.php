<?php
  $variable_name = "This is the variable's value";
  $us_president = 'Donald Trump';
  $birth_year = 1973;
  $is_raining = false;
  $team_players = array('Jean','Jeanne','Dirk');
?>

<html>
  <head><title>Hi!</title></head>
  <body>
  	<?php if (isset($_GET['name'])){ ?>
    	<h1>Aloha <?php echo $_GET['name']; ?>!</h1>
   	<?php } ?>

  </body>
</html>

<?php
// STRINGS
  $message = "I need pizza !";

// INTEGER
  $a = 5;
  $a = $a + 37;
  echo $a; // display 42

// FLOATING NUMBER
  $total = 42 + 4.34543;

// BOOLEAN
  $is_old_enough_to_vote = true;

// NULL
  $donald_trump_humanity = NULL;

// ARRAY
  $team = array(
  0 => 'Cindy',
  1 => 'Jean',
  2 => 'Mustapha',
  3 => 'Pierre',
  4 => '',
  5=>'Eric');
 ?>
