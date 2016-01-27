<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Building\Controller\Item' => 'Building\Controller\ItemController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'item' => array(
                'type'    => 'Segment',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/item[/:action[/:id]]',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Building\Controller',
                        'controller'    => 'Item',
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
            'Building' => __DIR__ . '/../view',
        ),
    ),
);
