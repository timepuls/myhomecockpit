<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Buildinglist\Controller\Building' => 'Buildinglist\Controller\BuildingController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'building' => array(
                'type'    => 'Segment',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/building[/:action[/:id]]',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Buildinglist\Controller',
                        'controller'    => 'Building',
                        'action'        => 'index',
                    ),
                    'constraints' => array(
                        'action' => '(add|edit|delete)',
                        'id'     => '[0-9]+',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Buildinglist' => __DIR__ . '/../view',
        ),
    ),
);
