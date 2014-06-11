<?php

namespace P4pmvc\Factory;

use P4pmvc\Dealership\Dealership;

class DealershipManagerTest extends \PHPUnit_Framework_TestCase {
    
    public function testAddDealershipWithName() {
        $dealershipManager = new DealershipManager();
        
        $this->assertEmpty($dealershipManager->getDealerships());

        $dealershipManager->with("Foobar Exotics");

        $actual = $dealershipManager->getDealerships();

        $this->assertEquals(1, count($actual));

    }

    public function testAddDealershipInstanceOfDealership() {
        
        $dealershipManager = new DealershipManager();
        
        $dealershipManager->add('Foobar Exotics');
        $actual = $dealershipManager->getDealership('Foobar Exotics');
        
        $this->assertInstanceOf('P4pmvc\Dealership\Dealership', $actual);

    }

    public function testAddDealershipOnlyAddsOneDealership() {
        $dealershipManager = new DealershipManager();

        $this->assertEmpty($dealershipManager->getDealerships());

        $dealershipManager->add('Foobar Exotics');

        $actual = $dealershipManager->getDealerships();

        $this->assertEquals(1, count($actual));

    }

    public function testAddDealershipHasArrayKeyAfterAddDealership() {
        $dealershipManager = new DealershipManager();

        $dealershipManager->add('Foobar Exotics');

        $this->assertArrayHasKey('Foobar_Exotics', $dealershipManager->getDealerships());
        
    }

    public function testGetDealershipsArrayEmpty() {

        $dealershipManager = new DealershipManager();
        
        $this->assertEmpty($dealershipManager->getDealerships());    
    }

    public function testGetDealershipByNameNotNull() {
        $dealershipManager = new DealershipManager();

        $dealershipManager->add('Foobar Exotics');

        $actual = $dealershipManager->getDealership('Foobar Exotics');

        $this->assertInstanceOf('P4pmvc\Dealership\Dealership', $actual);
        $this->assertEquals('Foobar Exotics', $actual->getDealership());

    }

    public function testGetDealershipByNameNull() {
        $dealershipManager = new DealershipManager();

        $actual = $dealershipManager->getDealership('Foobar Exotics');

        $this->assertEquals(null, $actual);    
    }
}