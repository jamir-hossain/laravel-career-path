<?php

namespace App;

trait GetData
{
   public function getData($path)
   {
      // Load existing JSON data from the file
      $jsonData = file_get_contents($path);
      $dataList = json_decode($jsonData, true);

      return $dataList;
   }
}
