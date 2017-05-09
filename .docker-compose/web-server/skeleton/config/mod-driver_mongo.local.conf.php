<?php
return [
    Module\MongoDriver\Module::CONF_KEY
    => [

        ## Your extended repository settings can be add as an item into this:
        \Module\MongoDriver\Services\aServiceRepository::CONF_REPOSITORIES => [
            ## Configuration of Repository Service To Register And Retrieve From IOC,
            #- Usually Implemented with modules that implement mongo usage
            #- with specific key name as repo name.
            // @see aServiceRepository bellow
            \Module\MongoDriver\Services\aServiceRepository::class
            => [
                // default db name
                'db_name' => 'papioniha',
            ],
        ],

        // Client Connections By Name:
        /** @see MongoDriverManagementFacade::getClient */
        'clients' => [

            'master' => [
                'host' => 'mongodb://db-master-mongo:27017/',
            ],

            /*'anar_production'  => array(
                ## mongodb://[username:password@]host1[:port1][,host2[:port2],...[,hostN[:portN]]][/[database][?options]]
                #- anything that is a special URL character needs to be URL encoded.
                ## This is particularly something to take into account for the password,
                #- as that is likely to have characters such as % in it.
                'host' => 'mongodb://91.98.28.230:27017',

                ## Required Database Name To Client Connect To
                'db'   => 'kookoja',  ),*/
        ],
    ],
];
