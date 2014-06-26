<?php
/**
 * Kittencup Module
 *
 * @date 2014 14-5-14 下午5:57
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

return [

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'template_map'=>[
            'kp-user-layout'=> __DIR__ .'/../view/layout/layout.phtml',
            'kp-user-pagination'=>__DIR__ .'/../view/layout/pagination.phtml'
        ]
    ],

    'router' => [
        'routes' => [
            'KpUser-user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user[/:action].html',
                    'defaults' => [
                        '__NAMESPACE__' => 'KpUser\Controller',
                        'controller' => 'User',
                        'action' => 'register'
                    ],
                ]
            ],
            'KpUser-user-center' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user-center[/:action].html',
                    'defaults' => [
                        '__NAMESPACE__' => 'KpUser\Controller',
                        'controller' => 'UserCenter',
                        'action' => 'index'
                    ],
                ]
            ],
        ]
    ],

    'kp_user' => [
        'disabled_register' => false,
        'disabled_login' => false
    ],

    'service_manager' => [

    ]

];