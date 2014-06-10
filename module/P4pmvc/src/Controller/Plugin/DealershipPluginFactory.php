<?php
namespace P4pmvc\Controller\Plugin;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DealershipPluginFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        
        $dealerships   = $serviceLocator->getServiceLocator()->get('P4pmvc\Dealership\Dealerships');
        
        $plugin = new DealershipPlugin($dealerships);
        
        return $plugin;
    }

}