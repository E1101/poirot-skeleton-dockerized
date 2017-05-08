#!/bin/bash
printf "\033[0;32m > Sync ...\n"

if [ ! -f /docker/initialized ]; then
   bootup
fi

printf "\033[0;32m > Sync Poirot Environment and Configuration Files ...\n"
cp /docker/.env.php ./vendor/poirot/skeleton/
cp -a /docker/config/. ./vendor/poirot/skeleton/src/config/
