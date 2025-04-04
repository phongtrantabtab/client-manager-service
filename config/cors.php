<?php

return [
    'paths' => ['api/*'],  // Cho phép tất cả các route API

    'allowed_methods' => ['*'],  // Cho phép tất cả các phương thức HTTP

    'allowed_origins' => ['*'],  // Cho phép tất cả các domain

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],  // Cho phép tất cả các headers

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,
];
