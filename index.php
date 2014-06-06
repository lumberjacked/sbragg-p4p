<?php
require_once __DIR__ . '/vendor/autoload.php';

use P4p\Factory\DealershipManagerFactory;

$factory     = new DealershipManagerFactory();

echo "Of cource I would never do this on an actual page, but to show the objects and methods it is using I output different scenarios below.";
echo '<br>';
echo "Ideally the objects would be used in a controller (keeping it lean) only returning Data for the view template.";
echo "<p>";

echo "I changed the design of the original sample code.  The reason for this is because the sample code in my opinion has a design flaw.";
echo "<br>";
echo "-----------------------------------------------------------------------------------------------------------------------------------------------------------------";

echo "<p>";
echo "1)  All the vehicle objects are creating duplicate code.  There is no difference between these objects besides constructing a different type.";
echo "<br>";
echo "New design strategy is to use an Abstract Vehicle that all vehicles extend from and in the event you need to add something specific to a vehicle";
echo "<br>";
echo "implement it in the concrete instantiated vehicle.";

echo "<p>";
echo "2)  I understand that the json files were setup to act similar to a database, and vehicles are actually a model that would be returned from the DB.";
echo "<br>";
echo "New design strategy by removing the nested fields in the json files and only listing the vehicles this mimics a database call closer to what would be returned.";
echo "<br>";
echo 'Now by changing getBrochureSortedBy($one, $two) to $dealership->get($criteria), you can search over multiple selectors, removing the two selector limit.';
echo "<br>";
echo '$dealership->get($criteria) searches for vehicles with the first selector, if any are found it starts refining the search based on returned inventory.';
echo "<br>";
echo 'In the event the first selector returns no inventory then the search stops because it hasnt met the criteria, the criteria would need to be widened.';

echo "<p>";
echo "Dealerships Object created with 1 Dealership 'Foobar Exotics";
$dealerships = $factory->createService()->add('Foobar Exotics');
var_dump($dealerships);

echo "Using the DealershipManager get 'Foobar Exotics' dealership";
$foobarDealer = $dealerships->getDealership('Foobar Exotics');
var_dump($foobarDealer->getDealership());
var_dump($foobarDealer);

echo "<p>";
echo "Add new dealership to DealershipManager 'Foobar Extreme";
$fooExtreme = $dealerships->add('Foobar Extreme');
var_dump($fooExtreme);

echo "Using the DealershipManager get 'Foobar Extreme' dealership";
$fooExtreme = $dealerships->getDealership('Foobar Extreme');
var_dump($fooExtreme->getDealership());
var_dump($fooExtreme);;



echo 'Using $foobarDealer search inventory by criteria';
$criteria = array('color' => 'red');
var_dump($criteria);

$inventory = $foobarDealer->get($criteria);
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
echo 'Using $foobarDealer search inventory by stricter criteria';
$criteria = array('color' => 'black', 'year' => '2014');
var_dump($criteria);

$inventory = $foobarDealer->get($criteria);
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
echo 'Using $foobarDealer search inventory by even stricter criteria';
$criteria = array('color' => 'black', 'year' => '2014', 'type' => 'truck');
var_dump($criteria);

$inventory = $foobarDealer->get($criteria);
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
echo 'Using $foobarDealer add vehicle to inventory.';
$new_vehicle = array('type' => 'truck', 'make' => 'Chevy', 'model' => '2500', 'year' => '2014', 'color' => 'black');
var_dump($new_vehicle);

var_dump($foobarDealer->addToInventory($new_vehicle));

echo "<p>";
echo 'Using $foobarDealer search inventory by stricter criteria used from above';
$criteria = array('color' => 'black', 'year' => '2014', 'type' => 'truck');
var_dump($criteria);

$inventory = $foobarDealer->get($criteria);
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









