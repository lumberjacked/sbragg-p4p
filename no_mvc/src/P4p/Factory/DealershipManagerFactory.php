<?php
namespace P4p\Factory;

use P4p\Dealership\DealershipManager;

class DealershipManagerFactory {
    
    public function createService() {
   		
        return new DealershipManager();
    }
}