<?php

return [
    'role_structure' => [
        'administrator' => [
            'users' => 'c,r,u,d',
            'permissions' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'profile' => 'r,u',
            'settings' => 'c,r,u,d',
            'site-settings' => 'c,r,u,d',
            'sliders' => 'c,r,u,d',
            'district' =>'c,r,u,d',
            'goods' => 'c,r,u,d',
            'sales'=>'c,r,u,d',
            'purchases'=>'c,r,u,d'

        ],
    ],
    'permission_structure' => [

    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
