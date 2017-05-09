<?php
use Module\OAuth2Client\Actions\ServiceAssertTokenAction;

return [
    \Module\OAuth2Client\Module::CONF => [

        // Connect To OAuth Server To Assert Token
        \Module\OAuth2Client\Services\ServiceOAuthClient::CONF => [
            'base_url'      => getenv('OAUTH_BASE_URL'), // http://172.19.0.1:8000/
            'client_id'     => getenv('OAUTH_CLIENT_ID'),
            'client_secret' => getenv('OAUTH_CLIENT_SECRET'),

            /** @see \Poirot\OAuth2Client\Authorization */
        ],

        ServiceAssertTokenAction::CONF => [
            'debug_mode' => [
                // Not Connect to OAuth Server and Used Asserted Token With OwnerObject Below
                'enabled' => filter_var(getenv('OAUTH_DEBUG_MODE'), FILTER_VALIDATE_BOOLEAN),
                'token_settings'   => [
                    'client_identifier' => getenv('OAUTH_DEBUG_CLIENTID'),
                    'owner_identifier'  => getenv('OAUTH_DEBUG_OWNERID'),
                    'scopes'            => explode(' ', getenv('OAUTH_DEBUG_SCOPES')),

                    /** @see \Poirot\OAuth2Client\Model\Entity\AccessToken */
                ],
            ],

            /** @see OAuth2\Services\ServiceAssertToken */
            // aAssertion Instance Or Registered Service
            // AssertByInternalServer
            'assertion_rig' => '/module/oauth2/services/AssertToken',
        ],
    ],
];
