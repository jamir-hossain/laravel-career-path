<?php

class IncomeExpense
{
   // Properties
   private $income;
   private $expense;
   private $categories;

   // Constructor
   public function __construct()
   {
      $this->income = fopen('income.txt', 'a+');
      $this->expense = fopen('expense.txt', 'a+');
      $this->categories = [
         'Income Category' => ['Salary', 'Business'],
         'Expense Category' => ['Family', 'Personal']
      ];
   }

   // Insert new income 
   public function addIncome()
   {
      $amount = (int) readline("Enter a amount: ");
      $category = readline("Enter a category: ");

      fwrite($this->income, "$category - $amount\n");
   }

   // Insert new expense 
   public function addExpense()
   {
      $amount = (int) readline("Enter a amount: ");
      $category = readline("Enter a category: ");

      fwrite($this->expense, "$category - $amount\n");
   }

   // Get income list
   public function viewIncome()
   {
      while (!feof($this->income)) {
         echo fgets($this->income);
      }
   }

   // Get expense list
   public function viewExpense()
   {
      while (!feof($this->expense)) {
         echo fgets($this->expense);
      }
   }

   // Get total amount after income and expense
   public function getTotal()
   {
      $total_income = 0;
      while (!feof($this->income)) {
         $line = fgets($this->income);

         if (strlen($line) > 0) {
            preg_match('/\d+/', $line, $matches);
            $amount = (int) $matches[0];
            $total_income += $amount;
         } else {
            continue;
         }
      }

      $total_expense = 0;
      while (!feof($this->expense)) {
         $line = fgets($this->expense);

         if (strlen($line) > 0) {
            preg_match('/\d+/', $line, $matches);
            $amount = (int) $matches[0];
            $total_expense += $amount;
         } else {
            continue;
         }
      }

      $total = $total_income - $total_expense;
      echo "Total : $total\n";
   }

   // Get category list
   public function getCategories()
   {
      foreach ($this->categories as $key => $value) {
         echo "$key\n";
         foreach ($value as $key => $category) {
            echo "$key. $category\n";
         }
      }
   }


   public function __destruct()
   {
      fclose($this->income);
      fclose($this->expense);
   }
}


while (true) {
   $status = new IncomeExpense();

   // Display menu options
   echo "\n-----------------------\n";
   echo "What do you want to do?\n";
   echo " 1. Add Income\n";
   echo " 2. Add Expense\n";
   echo " 3. View Income\n";
   echo " 4. View Expense\n";
   echo " 5. View Total\n";
   echo " 6. View Categories\n";
   echo " 7. Exit\n";

   // Read user input
   $choice = readline("Enter your choice: ");
   echo "\n";

   // Perform actions based on user's choice
   switch ($choice) {
      case '1':
         $status->addIncome();
         break;

      case '2':
         $status->addExpense();
         break;

      case '3':
         $status->viewIncome();
         break;

      case '4':
         $status->viewExpense();
         break;

      case '5':
         $status->getTotal();
         break;

      case '6':
         $status->getCategories();
         break;

      case '7':
         exit;

      default:
         echo "Invalid choice. Please try again.\n";
   }
}
