#!/bin/bash
printf "\033[0;32m > Update ...\n"

if [ ! -f /docker/initialized ]; then
   bootup
fi

if [[ "${DEBUG:?}" == "true" ]]; then
    ## Debug Mode
    printf "\033[0;32m > Update Composer Packages ...\n"
    (cd /var/www/html/ && composer update --ignore-platform-reqs)
else
    printf "\033[0;32m > Update Composer Packages ...\n"
    (cd /var/www/html/ && composer update --ignore-platform-reqs --no-dev)
fi

sync