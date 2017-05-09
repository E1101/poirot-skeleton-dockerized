#!/bin/bash

## Set Environment From Docker To Global Bash
DEBUG=$(bash -c 'echo "${DEBUG?false}"')
HOST_IP=$(bash -c 'echo "${HOST_IP?false}"')

## Server Start Up
if [ $DEBUG="true" ]; then
   printf "\033[0;32m > Server Running On Debug Mode ...\n"
else
   printf "\033[0;32m > Server Running ...\n"
fi

printf "\033[0;35m ${HOST_IP} \n"

## Boot Server
if [ ! -f /docker/initialized ]; then
   bootup
fi

printf "\033[0;32m > Start Cron ...\n"
printf "\033[0m\n"

cron

## continue with default Parent CMD
printf "\033[0;32m > Start Apache Server ...\n"
printf "\033[0m\n"

apache2-foreground