<?php
// config/l5-swagger.php

return [
    'swagger' => [
        'paths' => base_path('app/Http/Controllers/'), // or wherever your controllers are
    ],

    'generator' => [
        'info' => [
            'title' => 'Translation Management API',
            'description' => 'API to manage translations with multiple locales.',
            'version' => '1.0.0',
            'contact' => [
                'email' => 'support@example.com',
            ],
            'license' => [
                'name' => 'MIT',
                'url' => 'https://opensource.org/licenses/MIT',
            ]
        ]
    ],
];

