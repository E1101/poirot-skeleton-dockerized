<?php
use Module\OAuth2Client\Actions\ServiceAssertTokenAction;

return [

    # Mongo Driver:

    Module\MongoDriver\Module::CONF_KEY =>
    [
        \Module\MongoDriver\Services\aServiceRepository::CONF_REPOSITORIES =>
            [
                \Module\TenderBin\Model\Driver\Mongo\BindataRepoService::class => [
                    
                    // Generate Unique ID While Persis Bin Data
                    // with different situation we need vary id generated;
                    // when we use storage as URL shortener we need more comfortable hash_id
                    // but consider when we store lots of files

                    // (callable) null = using default ObjectID
                    \Module\TenderBin\Model\Driver\Mongo\BindataRepoService::CONF_GENERATOR_KEY => null,

                    // ..
                ],
            ],
    ],
];
