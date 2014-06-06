<?php

return array(
    'factories' => array(
         'P4pmvc\Dealership\Dealerships' => 'P4pmvc\Factory\DealershipManagerFactory',
         
    ),

    'invokables' => array(
        'P4pmvc\Factory\DealershipManager' => 'P4pmvc\Factory\DealershipManager'
         
    )
);