<?php

class Vehicle
{
   public $name;
   public $color;

   public function start()
   {
      // start login
   }

   public function stop()
   {
      // stop login
   }
}

class Car extends Vehicle
{
   function __construct(string $name, string $color)
   {
      $this->name  = $name;
      $this->color = $color;
   }

   public function carInfo()
   {
      echo "Car name: $this->name\n";
      echo "Car color: $this->color\n";
   }
}

class ElectricCar extends Car
{
   private $batteryCapacity;

   function __construct(string $name, string $color, int $batteryCapacity)
   {
      $this->name  = $name;
      $this->color = $color;
      $this->batteryCapacity = $batteryCapacity;
   }

   public function electricCarInfo()
   {
      echo "Electric Car name: $this->name\n";
      echo "Electric Car color: $this->color\n";
      echo "Battery Capacity: {$this->batteryCapacity} kWh\n";
   }
}

$teslaModelS = new ElectricCar('Tesla Model S', 'Black', 100);
$teslaModelS->start();
$teslaModelS->electricCarInfo();
$teslaModelS->stop();
