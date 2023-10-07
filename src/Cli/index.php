<?php

use Cli\User;


while (true) {
   // Display menu options
   echo "\n-----------------------\n";
   echo "What do you want to do?\n";
   echo " 1. Login\n";
   echo " 2. Register\n";
   echo " 3. Exit\n";

   // Read user input
   $choice = readline("Enter your choice: ");
   echo "\n";

   // Perform actions based on user's choice
   switch ($choice) {
      case '1':
         $user = new User;
         $logged = $user->login();
         break;

      case '2':
         $user = new User;
         $user->register('customer');
         break;

      case '3':
         exit;

      default:
         echo "Invalid choice. Please try again.\n";
   }
}
