<?php

return [

    Module\MongoDriver\Module::CONF_KEY
    => [
        \Module\MongoDriver\Services\aServiceRepository::CONF_REPOSITORIES => [
            \Module\OAuth2\Services\Repository\ServiceRepoAccessTokens::class => [
                'collection' => [
                    // query on which collection
                    'name' => 'oauth.token_access',
                    // which client to connect and query with
                    'client' => 'master',
                    // ensure indexes
                    'indexes' => [
                        ['key' => ['identifier' => 1],],
                        // db.database_name.collection_name.createIndex({"date_mongo_expiration": 1}, {expireAfterSeconds: 0});
                        ['key' => ['date_mongo_expiration' => 1], 'expireAfterSeconds' => 0 ],
                    ],],],

            \Module\OAuth2\Services\Repository\ServiceRepoRefreshTokens::class => [
                'collection' => [
                    // query on which collection
                    'name' => 'oauth.token_refresh',
                    // which client to connect and query with
                    'client' => 'master',
                    // ensure indexes
                    'indexes' => [
                        ['key' => ['identifier' => 1],],
                        // db.database_name.collection_name.createIndex({"date_mongo_expiration": 1}, {expireAfterSeconds: 0});
                        ['key' => ['date_mongo_expiration' => 1], 'expireAfterSeconds' => 0 ],
                    ],],],

        ],
    ],
];
