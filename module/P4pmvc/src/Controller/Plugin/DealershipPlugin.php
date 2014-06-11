<?php
namespace P4pmvc\Controller\Plugin; 

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use P4pmvc\Factory\DealershipManager;

class DealershipPlugin extends AbstractPlugin {
    /**
     * @var DealershipManager
     */
    protected $manager;

    /**
     * @param DealershipManager $manager
     */
    public function __construct(DealershipManager $manager) {
        $this->manager = $manager;
    }

    public function getDealershipManager() {
        return $this->manager;
    }

     /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, array $arguments) {
        return call_user_func_array(array($this->manager, $name), $arguments);
    }
}