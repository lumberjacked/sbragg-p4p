<?php
namespace P4pmvc\Dealership;

use Zend\Config\Reader\Json as JsonReader;
use Zend\Validator\File\Exists as FileValidator;

class Dealership extends AbstractDealership {
    
    protected $dealership;

    protected $inventory = array();

    public function __construct($name) {
    	$this->setDealership($name);
    	$this->initialize();
    }
}