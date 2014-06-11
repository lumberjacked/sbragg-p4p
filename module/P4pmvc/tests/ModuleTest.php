<?php
namespace P4pmvc;

class ModuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Module
     */
    protected $module;

    public function setUp()
    {
        $this->module = new Module();
    }

    public function testGetConfig()
    {
        $this->assertEquals(
            include __DIR__ . '/../config/module.config.php',
            $this->module->getConfig()
        );
    }

    public function testGetServiceConfig()
    {
        $this->assertEquals(
            include __DIR__ . '/../config/service.config.php',
            $this->module->getServiceConfig()
        );
    }
}