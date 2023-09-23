<?php

class Content
{
   public User $author;
   public string $content;

   public function publish()
   {
      // Publish logic here
   }

   public function edit()
   {
      // Edit logic here
   }
}


class User
{
   public $name;
   public $email;
}

class BlogPost extends Content
{
   public string $title;
}

class Comment extends Content
{
}

class EmailContent extends Content
{
   // Method overriding
   public function publish()
   {
   }

   // Method overriding
   public function edit()
   {
      throw new Exception('Email content not editable.');
   }
}


class CMS
{
   public function editContent(Content $content)
   {
      $content->edit();
   }
}

$cms = new CMS;
$cms->editContent(new EmailContent);
