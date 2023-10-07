<?php

namespace App\Model;

interface Model
{
   public function create(array $data);
   public function update(string $id, array $data);
   public function find(string $id);
   public function where(string $key, $value);
}
