#! /usr/bin/env php

<?php

$user_input = $argv[1];
preg_match_all("/[a-zA-Z]/", $user_input, $matches);

// Count the number of matches
$alphabetCount = count($matches[0]);

// Output the count of alphabetic characters
echo "Number of alphabetic characters: " . $alphabetCount;
