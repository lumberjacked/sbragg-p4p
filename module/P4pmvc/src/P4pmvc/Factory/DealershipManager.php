<?php
namespace P4pmvc\Factory;

use P4pmvc\Dealership\Dealership;

class DealershipManager {
    
	protected $dealerships = array();

    public function __construct() {
        $this->identifiers[] = get_called_class();
    }

    public function with($name) {
        $this->add($name);
        return $this->dealerships[str_replace(' ', '_', $name)];
    }

    public function add($name) {
        
        if(!array_key_exists(str_replace(' ', '_', $name), $this->dealerships)) {
            
            $dealership = new Dealership($name);
            
            $this->addDealership($dealership);

        }

        return $this;
    }

    public function getDealership($name) {
        $name = str_replace(' ', '_', $name);
        if(array_key_exists($name, $this->dealerships)) {
            return $this->dealerships[$name];
        } else {
            return null;
        }
        
    }

    public function getDealerships() {
        return $this->dealerships;
    }

    protected function addDealership($dealership) {
        $this->dealerships[str_replace(' ', '_', $dealership->getDealership())] = $dealership;
    }
}