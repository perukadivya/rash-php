<?php

return [
    'default' => env('SESSION_DRIVER', 'array'),
    'lifetime' => 120,
    'encrypt' => false,
    'cookie' => 'portfolio_session',
    'path' => '/',
    'domain' => null,
    'secure' => null,
    'http_only' => true,
    'same_site' => 'lax',
];
