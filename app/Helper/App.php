<?php

namespace App\Helper;

class App
{
   public static function view($name, $variables = [])
   {
      extract($variables);
      require_once "resources/views/$name.php";
   }
}
