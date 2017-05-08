#!/bin/bash
## restore dump from given directory
## docker-compose exec papion_admin restore /v-administration/dump/mongo-dump__08-May-2017 oauth

printf "\033[0;32m > Restore From Dump $1...\n"

printf "\033[0;32m > restoring ...\n"
printf "\033[0m\n"


mongorestore -vvv --host db-master-mongo:27017 --db "$2" "$1"
