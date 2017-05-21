#!/bin/bash
printf "\033[0;32m > Bootup ...\n"

if [ -f /docker/initialized ]; then
   rm /docker/initialized
fi

chmod 0777 -R /v-share/

if [[ "${DEBUG:?}" == "true" ]]; then
    ## Debug Mode
    printf "\033[0;32m > Installing XDebug ...\n"

    ## install xdebug
    # old
    #PHPCONF="/etc/php/7.0/apache2/conf.d/20-xdebug.ini"
    #apt-get install -yq --force-yes --fix-missing php-xdebug

    pecl install xdebug-2.5.0 && docker-php-ext-enable xdebug

    PHPCONF="/usr/local/etc/php/conf.d/200-xdebug.ini"
    echo "xdebug.remote_enable=1" >> ${PHPCONF}
    echo "xdebug.remote_host=${HOST_IP}" >> ${PHPCONF}
    echo "xdebug.profiler_enable=0" >> ${PHPCONF}
    # ?XDEBUG_PROFILE
    echo "xdebug.profiler_enable_trigger=1" >> ${PHPCONF}
    echo "xdebug.profiler_output_dir=\"/v-share\"" >> ${PHPCONF}

    ## install composer
    printf "\033[0;32m > Installing Composer Packages ...\n"
    (cd /var/www/html/ && composer install --ignore-platform-reqs)
else
    printf "\033[0;32m > Installing Composer Packages ...\n"
    (cd /var/www/html/ && composer install --ignore-platform-reqs --no-dev)
fi

chmod 0777 -R /data/poirot/

touch /docker/initialized

sync
