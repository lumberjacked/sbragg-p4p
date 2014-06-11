<?php
namespace P4pmvc\Dealership;

interface DealershipInterface  {
    
    public function setDealership($name);

    public function getDealership();

    public function initialize();

    public function addToInventory(array $spec);

    public function get(array $search);

}