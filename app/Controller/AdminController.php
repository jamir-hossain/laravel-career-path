<?php

namespace App\Controller;

use App\Helper\App;
use App\Middleware\AuthMiddleware;
use App\Model\CustomerModel;
use App\Model\TransactionModel;

class AdminController
{
   use RegisterController;

   private $customer;

   function __construct()
   {
      $this->customer = (new AuthMiddleware)->user();
   }

   public function createAdmin($email, $password)
   {
      $customer = ['name' => 'Admin', 'email' => $email, 'password' => $password];
      $result = $this->customerRegister($customer, 'admin', 'admin/create');

      if (!$result) {
         header("Location: /register");
      } else {
         header("Location: /login");
      }
   }

   public function createCustomer($customer)
   {
      $email = $customer['email'];
      $password = $customer['password'];
      $name = $customer['first-name'] . " " . $customer['last-name'];
      $customer = ['name' => $name, 'email' => $email, 'password' => $password];

      $result = $this->customerRegister($customer, 'customer', 'admin/add_customer');
      if ($result) {
         header("Location: /admin/customers");
      } else {
         header("Location: /admin/add-customer");
      }
   }

   public function customers()
   {
      $customers = (new CustomerModel)->getAll();
      App::view('admin/customers', ['user' => $this->customer, 'customers' => $customers]);
   }

   public function transactions()
   {
      $transactions = (new TransactionModel)->getAllWithRelation();
      App::view('admin/transactions', ['user' => $this->customer, 'transactions' => $transactions]);
   }

   public function customerTransactions($id)
   {
      $customer = (new CustomerModel)->find($id);
      $transactions = (new TransactionModel)->whereWithRelation('customer_id', $id);
      App::view(
         'admin/customer_transactions',
         ['user' => $this->customer, 'customer' => $customer, 'transactions' => $transactions]
      );
   }
}
