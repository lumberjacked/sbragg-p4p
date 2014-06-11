<?php
namespace P4pmvc\Factory;

use Zend\ServiceManager\ServiceManager;

class DealershipManagerFactoryTest extends \PHPUnit_Framework_TestCase {
    
    public function testCreateDealershipManager() {
        
        $factory = new DealershipManagerFactory();

        $dealershipManager = $factory->createService(new ServiceManager());

        $this->assertInstanceOf('P4pmvc\Factory\DealershipManager', $dealershipManager);
    }

    
}