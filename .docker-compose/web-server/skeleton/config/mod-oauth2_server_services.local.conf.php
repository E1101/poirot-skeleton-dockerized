<?php
/**
 * Default OAuth2 IOC Services
 *
 * @see \Poirot\Ioc\Container\BuildContainer
 *
 * ! These Services Can Be Override By Name (also from other modules).
 *   Nested in IOC here at: /module/oauth2/services
 *
 *
 * @see \Module\OAuth2::getServices()
 */
use Module\OAuth2\Services\BuildServices;

return [
    'nested' => [
        'repository' => [
            // Define Default Services
            'services' =>
                [
                    // Override AccessToken Repository (Persist in Mongo)
                    BuildServices::ACCESS_TOKENS => Module\OAuth2\Services\Repository\ServiceRepoAccessTokens::class,

                    // Override RefreshToken Repository (Persist In Mongo)
                    BuildServices::REFRESH_TOKENS => Module\OAuth2\Services\Repository\ServiceRepoRefreshTokens::class,
                ],
        ],
    ],
];
