<?php

// Base class Vehicle
class Vehicle {
    protected $make;
    protected $model;
    protected $year;
 
    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // This method cannot be overridden in child classes
    final public function getDetails() {
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    // Method to be overridden by child classes
    public function describe() {
        return "This is a vehicle.";
    }
}

// Derived class Car
class Car extends Vehicle {
    private $numberOfDoors;

    public function __construct($make, $model, $year, $numberOfDoors) {
        parent::__construct($make, $model, $year);
        $this->numberOfDoors = $numberOfDoors;
    }

    public function describe() {
        return "This is a car with $this->numberOfDoors doors.";
    }
}

// Derived class Motorcycle, marked as final
final class Motorcycle extends Vehicle {

    public function describe() {
        return "This is a motorcycle.";
    }
}

// Interface for ElectricVehicle
interface ElectricVehicle {
    public function chargeBattery();
}

// ElectricCar class that extends Car and implements ElectricVehicle interface
class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;

    public function __construct($make, $model, $year, $numberOfDoors, $batteryLevel) {
        parent::__construct($make, $model, $year, $numberOfDoors);
        $this->batteryLevel = $batteryLevel;
    }

    public function chargeBattery() {
        $this->batteryLevel = 100;
        return "Battery is charging.";
    }

    public function describe() {
        return "This is an electric car with $this->batteryLevel% battery.";
    }
}

// Testing the implementation

// Create a Car object
$car = new Car("Honda", "Civic", 2024, 4);
echo $car->getDetails() . "\n";
echo $car->describe() . "\n";

// Create a Motorcycle object
$motorcycle = new Motorcycle("Yamnaha", "YTX 125", 2024);
echo $motorcycle->getDetails() . "\n";
echo $motorcycle->describe() . "\n";

// Create an ElectricCar object
$electricCar = new ElectricCar("Tesla", "Model S", 2012, 4, 75);
echo $electricCar->getDetails() . "\n";
echo $electricCar->describe() . "\n";
echo $electricCar->chargeBattery() . "\n";
echo $electricCar->describe() . "\n";
?>
