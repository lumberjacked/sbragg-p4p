<?php

return array(
	'controller_plugins' => array(
        'factories' => array(
            'p4p.dealership.manager' => 'P4pmvc\Controller\Plugin\DealershipPluginFactory'
        )
    ),


    'controllers' => include 'controller.config.php',

    'router' => include 'router.config.php',

    'service_manager' => include 'service.config.php',

    'view_manager' => array(
        'template_map' => array(

        )
    )
);