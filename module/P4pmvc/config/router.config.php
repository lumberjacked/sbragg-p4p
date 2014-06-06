<?php 

return array(
    'routes' => array(
        'dealer' => array(
            'type' => 'segment',
            'options' => array(
                'route'    => '/dealerships[/:action]',
                'defaults' => array(
                    'controller' => 'p4p.controller.dealer',
                    'action'     => 'index',
                ),
            )
        )
    )
);