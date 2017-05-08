<?php
return array(
    Module\MongoDriver\Module::CONF_KEY
    => array(

        // Client Connections By Name:
        /** @see MongoDriverManagementFacade::getClient */
        'clients' => array(

            'master' => array(
                'host' => 'mongodb://db-master-mongo:27017/',
                'db'   => 'tenderbin',
            ),

            /*'anar_production'  => array(
                ## mongodb://[username:password@]host1[:port1][,host2[:port2],...[,hostN[:portN]]][/[database][?options]]
                #- anything that is a special URL character needs to be URL encoded.
                ## This is particularly something to take into account for the password,
                #- as that is likely to have characters such as % in it.
                'host' => 'mongodb://91.98.28.230:27017',

                ## Required Database Name To Client Connect To
                'db'   => 'kookoja',  ),*/
        ),
    ),
);
