<?php
namespace P4pmvc\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class DealerController extends AbstractActionController {

    public function indexAction() {
    	
    	$dealerships = $this->plugin('p4p.dealership.manager')->getDealershipManager();
    	
        echo "After getting dealership manager look at dealerships available";
    	var_dump($dealerships->getDealerships());

        echo "Add dealership to our manager";
        var_dump($dealerships->add('Foobar Exotics'));
    	
        echo "Look at available dealerships again after adding dealership";
        var_dump($dealerships->getDealerships());
    	
    	die('finished -- blocking before view is dispatched');
    }

    public function searchAction() {
        
        $dealerships = $this->plugin('p4p.dealership.manager')->getDealershipManager();
        
        echo "Add dealership to our manager";
        $dealerships = $dealerships->add('Foobar Exotics');
        var_dump($dealerships);

        echo "Get new dealership to search inventory";
        $dealership = $dealerships->getDealership('Foobar Exotics');
        var_dump($dealership);

        echo 'Setup search criteria for our dealership';
        $criteria = array('color' => 'red');
        var_dump($criteria);

        $inventory = $dealership->get($criteria);
        var_dump($inventory);

        echo "List Inventory available at 'Foobar Exotics'";
        foreach($inventory as $index => $vehicle) {
            echo "<br>";
            echo "###########################";
            var_dump("Description" . '--  ' . $vehicle->describe());
            var_dump("Type" . '--  ' . $vehicle->getType());
            var_dump("Make" . '--  ' . $vehicle->getMake());
            var_dump("Model" . '--  ' . $vehicle->getModel());
            var_dump("Year" . '--  ' . $vehicle->getYear());
            var_dump("Color" . '--  ' . $vehicle->getColor());
            echo "###########################";
        }

        echo "<p>";
        echo 'Using $dealership search inventory by stricter criteria';
        $criteria = array('color' => 'black', 'year' => '2014');
        var_dump($criteria);

        $inventory = $dealership->get($criteria);
        var_dump($inventory);

        echo "List Inventory available at 'Foobar Exotics'";
        foreach($inventory as $index => $vehicle) {
            echo "<br>";
            echo "###########################";
            var_dump("Description" . '--  ' . $vehicle->describe());
            var_dump("Type" . '--  ' . $vehicle->getType());
            var_dump("Make" . '--  ' . $vehicle->getMake());
            var_dump("Model" . '--  ' . $vehicle->getModel());
            var_dump("Year" . '--  ' . $vehicle->getYear());
            var_dump("Color" . '--  ' . $vehicle->getColor());
            echo "###########################";
        }
        

        echo "<p>";
        echo 'Using $dealership search inventory by even stricter criteria';
        $criteria = array('color' => 'black', 'year' => '2014', 'type' => 'truck');
        var_dump($criteria);

        $inventory = $dealership->get($criteria);
        var_dump($inventory);

        echo "List Inventory available at 'Foobar Exotics'";
        foreach($inventory as $index => $vehicle) {
            echo "<br>";
            echo "###########################";
            var_dump("Description" . '--  ' . $vehicle->describe());
            var_dump("Type" . '--  ' . $vehicle->getType());
            var_dump("Make" . '--  ' . $vehicle->getMake());
            var_dump("Model" . '--  ' . $vehicle->getModel());
            var_dump("Year" . '--  ' . $vehicle->getYear());
            var_dump("Color" . '--  ' . $vehicle->getColor());
            echo "###########################";
        }

        echo "<p>";
        echo 'Using $dealership add vehicle to inventory.';
        $new_vehicle = array('type' => 'truck', 'make' => 'Chevy', 'model' => '2500', 'year' => '2014', 'color' => 'black');
        var_dump($new_vehicle);

        var_dump($dealership->addToInventory($new_vehicle));

        echo "<p>";
        echo 'Using $dealership search inventory by stricter criteria used from above';
        $criteria = array('color' => 'black', 'year' => '2014', 'type' => 'truck');
        var_dump($criteria);

        $inventory = $dealership->get($criteria);
        var_dump($inventory);

        echo "List Inventory available at 'Foobar Exotics'";
        foreach($inventory as $index => $vehicle) {
            echo "<br>";
            echo "###########################";
            var_dump("Description" . '--  ' . $vehicle->describe());
            var_dump("Type" . '--  ' . $vehicle->getType());
            var_dump("Make" . '--  ' . $vehicle->getMake());
            var_dump("Model" . '--  ' . $vehicle->getModel());
            var_dump("Year" . '--  ' . $vehicle->getYear());
            var_dump("Color" . '--  ' . $vehicle->getColor());
            echo "###########################";
        }

        echo '<br>';
        die('finished -- blocking before view is dispatched');
    }    
} 
