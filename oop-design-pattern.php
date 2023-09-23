<?php

class User
{
   public $name;
   public $email;

   function __construct()
   {
      $this->name = 'Jamir';
      $this->email = 'jamir@gmail.com';
   }
}

class BlogPost
{
   public User $author;
   public string $content;
   public string $title;

   function __construct()
   {
      $this->author = new User;
      $this->content = 'Content';
      $this->title = 'Title';
   }

   public function publish()
   {
      // Publish logic here
   }

   public function edit()
   {
      // Edit logic here
   }

   public function delete()
   {
      // Edit logic here
   }
}

class Comment
{
   public User $author;
   public string $content;

   function __construct()
   {
      $this->author = new User;
      $this->content = 'Content';
   }

   public function publish()
   {
      // Publish logic here
   }

   public function edit()
   {
      // Edit logic here
   }

   public function delete()
   {
      // Edit logic here
   }
}
