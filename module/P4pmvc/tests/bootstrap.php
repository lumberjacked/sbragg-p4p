<?php

require_once __DIR__ . "/../../../vendor/autoload.php";

Zend\Mvc\Application::init(require '/../config/application.config.php')->run();