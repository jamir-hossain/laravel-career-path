<?php

$contents = fopen('income.txt', 'a+');

var_dump($contents);
while (!feof($contents)) {
   echo fgets($contents);
}

// $txt = "\nJohn Doe";
// fwrite($contents, $txt);

// fclose($contents);
