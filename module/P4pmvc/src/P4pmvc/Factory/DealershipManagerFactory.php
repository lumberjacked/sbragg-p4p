<?php
namespace P4pmvc\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DealershipManagerFactory implements FactoryInterface {
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
   		
        $manager = $serviceLocator->get('P4pmvc\Factory\DealershipManager');
        
        return $manager;
    }
}