<?php
$name = "Michael";
$age = 36;
$eyes_colour = "brown";
$family_members = array(
  0 => 'Laurence',
  1 => 'Emilien',
  2 => 'Violette',
  3 => 'Jeanne');
$hungry = TRUE;
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>PHP Exercices</title>
   </head>
   <body>
     <p>Hi! My name is <?php echo $name; ?>.</p>
     <p>I am <?php echo $age; ?> years old.</p>
     <p>My eyes are <?php echo $eyes_colour; ?>.</p>
     <p>The first person in my family is <?php echo $family_members[0]; ?></p>
     <p>Am I hungry ?
      <?php
      if($hungry){
        echo 'Yes';
      } else {
        echo 'No';
      };
      ?>
    </p>
   </body>
 </html>
