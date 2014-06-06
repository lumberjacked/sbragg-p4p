<?php
namespace P4p\Dealership;

class Dealership extends AbstractDealership {
    
    public function __construct($name) {
        $this->setDealership($name);
        $this->initialize();
    }   
}