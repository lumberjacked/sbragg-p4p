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
            include __DIR__ . '/../module/P4pmvc/config/module.config.php',
            $this->module->getConfig()
        );
    }
}