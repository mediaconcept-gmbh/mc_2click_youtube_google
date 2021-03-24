<?php
return [
    'frontend' => [
        'MC/McCookie/Middleware' => [
            'target' => MC\McCookie\Middleware\AjaxSearch::class,
            'after' => [
                'typo3/cms-frontend/prepare-tsfe-rendering'
            ]
        ],
    ],
];
