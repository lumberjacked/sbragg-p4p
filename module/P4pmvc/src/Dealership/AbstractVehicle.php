<?php
namespace P4pmvc\Dealership;

abstract class AbstractVehicle implements VehicleInterface {

	protected $id;

    protected $type;

    protected $make;

    protected $model;

    protected $year;

    protected $color;

    protected $describe = array('car' => 'I am a car', 'bike' => 'I am a bike', 'truck' => 'I am a truck');

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setMake($make) {
        $this->make = $make;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getType() {
        return $this->type;
    }

    public function getMake() {
        return $this->make;
    }

    public function getModel() {
        return $this->model;
    }

    public function getYear() {
        return $this->year;
    }

    public function getColor() {
        return $this->color;
    }

    public function describe() {
        return $this->describe[$this->type];
    }

}