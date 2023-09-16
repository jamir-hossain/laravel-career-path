#! /usr/bin/env php

<?php

$options = getopt('', ['min::', 'max::']);

$min = (int) $options['min'];
$max = (int) $options['max'];
$number = rand($min, $max);


while (true) {
   $user_input = (int) readline("Enter a number: ");

   if ($user_input > $number) {
      printf("Try a lower number\n");
   } else if ($user_input < $number) {
      printf("Try a bigger number\n");
   } else {
      printf("Congrats! You guessed it right");
      break;
   }
}
