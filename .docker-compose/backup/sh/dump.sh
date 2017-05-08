#!/bin/bash
printf "\033[0;32m > Container Backup Running ...\n"

printf "\033[0;32m > Dumping ...\n"
printf "\033[0m\n"

for var in "$@"
do
    mongodump -vvv --host db-master-mongo:27017 -d "$var" -o /v-administration/dump/"$var"__mongo-dump__"$(date '+%d-%b-%Y')"/
done
