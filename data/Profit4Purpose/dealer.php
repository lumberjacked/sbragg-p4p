<?php
	
	class vehicle  {
		
		private $type;
		
		public function __construct($type) {
			$this->type = $type;
		}
		
		public function describe() {
			return "I am a vehicle";
		}
		
	}
	
	class car extends vehicle  {
		
		public function __construct() {
			parent::__construct("car");
		}
		
		public function describe() {
			return "I am a car";
		}
		
	}
	
	class bike extends vehicle  {
		
		public function __construct() {
			parent::__construct("bike");
		}
		
		public function describe() {
			return "I am a bike";
		}
		
	}
	
	class dealer  {
		
		private $name;
		
		public function __construct($name) {
			$this->name = $name;
		}
		
		public function addVehicle(vehicle $vehicle) {
			// impementation here
		}
		
		public function getBrochureSortedBy($firstSortedBy, $secondSortedBy) {
			// impementation here
		}
		
	}
	
	
	
	// EXAMPLE IMPLEMENTATIONS
	
	
	// create a new dealer
	$myDealer = new dealer("Exotic Vehicles");
	
	// add bikes to the dealer's inventory (make, year, model, color)
	$myDealer->addVehicle(new bike("honda", 2014, "G1", "black"));
	$myDealer->addVehicle(new bike("ducatti", 2012, "Fastv1", "red"));
	$myDealer->addVehicle(new bike("ducatti", 2014, "H7", "green"));
	
	// add cars to the dealer's inventory (make, year, model, color)
	$myDealer->addVehicle(new car("ford", 2013, "f150", "yellow"));
	$myDealer->addVehicle(new car("vw", 2013, "passat", "red"));
	
	// add trucks to the dealer's inventory (make, year, model, color)
	$myDealer->addVehicle(new truck("mercedes", 2014, "class4", "black"));
	
	
	
	// get a brochure first sorted by type, then by make
	$myBrochure1 = $myDealer->getBrochureSortedBy("type", "make");
	// see out: dealer_brochure1.json
	
	// get a brochure first sorted by color, then by type
	$myBrochure2 = $myDealer->getBrochureSortedBy("color", "type");
	// see out: dealer_brochure2.json
	
	// get a brochure first sorted by year, then by make
	$myBrochure3 = $myDealer->getBrochureSortedBy("year", "make");
	// see out: dealer_brochure3.json
	
	// get a brochure sorted by make only
	$myBrochure4 = $myDealer->getBrochureSortedBy("make");
	// see out: dealer_brochure4.json
	
	
?>