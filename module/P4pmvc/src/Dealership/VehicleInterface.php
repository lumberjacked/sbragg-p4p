<?php
namespace P4pmvc\Dealership;

interface VehicleInterface  {
    
    public function setId($id);

    public function getId();

    public function setType($type);

    public function setMake($make);

    public function setModel($model);

    public function setYear($year);

    public function setColor($color);

    public function getType();

    public function getMake();

    public function getModel();

    public function getYear();

    public function getColor();

    public function describe();

}