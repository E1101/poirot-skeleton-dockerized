FROM php:7.1.4-apache

MAINTAINER Payam Naderi <naderi.payam@gmail.com>

# Install base packages
## install python-software-properties package on your system which
## provides add-apt-repository command then use the following set of
## commands to add PPA for PHP 7 in your Ubuntu system and install it
RUN apt-get update && apt-get install -yq --fix-missing \
        alien \
        cron \
        curl \
        git

RUN apt-get install -yq pkg-config libssl-dev libcurl4-openssl-dev \
    && git clone https://github.com/mongodb/mongo-php-driver.git \
    && ( \
        cd mongo-php-driver \
        && git checkout tags/1.2.5 -b build \
        && git submodule sync && git submodule update --init \
        && phpize && ./configure && make all -j 5 && make install \
    ) \
    && rm -rf mongo-php-driver \
    && docker-php-ext-enable mongodb

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

## --------------------------------------------
## | Setup Poirot
## --------------------------------------------

COPY ["./*.sh", "/docker/bin/"]
COPY ["./skeleton/config/", "/docker/config/"]

RUN chmod a+x /docker/bin/*.sh \
    ## compatible with windows
    && sed -i -e 's/\r$//' /docker/bin/*.sh \
    && ln -s /docker/bin/update.sh /usr/local/bin/update \
    && ln -s /docker/bin/bootup.sh /usr/local/bin/bootup \
    && ln -s /docker/bin/sync.sh /usr/local/bin/sync
ENV PATH="$PATH:/docker/bin/"


## --------------------------------------------
## | Setup Object Storage Crons
## --------------------------------------------

COPY ["./etc/cron.d/", "/etc/cron.d/"]
# Give execution rights on the cron job
# Create the log file to be able to run tail
RUN chmod -R 0644 /etc/cron.d/.

## --------------------------------------------
## | Setup Apache Specific Config
## --------------------------------------------
RUN a2enmod rewrite


WORKDIR /var/www/html/
CMD ["/docker/bin/run.sh"]