<?php
namespace P4pmvc\Dealership;

use Zend\Config\Reader\Json as JsonReader;
use Zend\Validator\File\Exists as FileValidator;

abstract class AbstractDealership implements DealershipInterface {

    protected $dealership;

    protected $inventory = array();

    public function setDealership($name) {
        $this->dealership = $name;
    }

    public function getDealership() {
        return $this->dealership;
    }

    public function initialize() {
        
        $location = getcwd() . '/data';
        
        $validator = new FileValidator($location);
        
        $brochure = str_replace(' ', '_', $this->getDealership()) . '.json';
        
        if($validator->isValid($brochure)) {
            
            $jReader  = new JsonReader(); 
            $brochure = $jReader->fromFile($location . '/' . $brochure);   
            
            foreach($brochure['inventory'] as $index => $spec) {
                $this->addToInventory($spec);
            }
        }

        return $this;

    }

    public function addToInventory(array $spec) {
        $vehicle = new Vehicle();
        
        $methods = array_keys($spec);       
        
        foreach($methods as $index => $setter) {
            $method = 'set' . ucfirst($setter);
            
            if(method_exists($vehicle, $method)) {
                $vehicle->$method($spec[$setter]);
            }
        }
        
        $this->addVehicle($vehicle);
        
        return $vehicle;    
    }

    protected function addVehicle($vehicle) {
        $this->inventory[] = $vehicle;
    }

    public function get(array $search) {
    
        if(!empty($search)) {
            $list = $this->search($this->inventory, key($search), reset($search));
            unset($search[key($search)]);       
        }

        if(!empty($list)) {

            foreach($search as $key => $value) {
                $list = $this->search($list, $key, $value);

            }
        }
        
        return $list;        
   
    }

    protected function search(array $inventory, $key, $value) {
        $list = array();
        
        foreach($inventory as $index => $vehicle) {
            $method = 'get' . ucfirst($key);
            
            if($vehicle->$method() == $value) {
                $list[] = $vehicle;
            }
        }

        return $list;
    }
    

}