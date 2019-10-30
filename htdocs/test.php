<?php
$arr = [];
for ($letter = 'a'; $letter <= 'z'; $letter++) {
    array_push($arr, $letter);
    if ($letter == 'z') {
          break; // et tu te casses
      }

}

print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alfabetical array
 ?>
