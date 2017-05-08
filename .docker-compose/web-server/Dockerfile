# --------------------------------------------------------------------
# | composer installed globally; available as "composer" command.
# |
# | @depends https://github.com/E1101/docker-apache-php7
# |
## TODO using official base images
FROM payam/apache_php7

MAINTAINER Payam Naderi <naderi.payam@gmail.com>

# Install base packages
## install python-software-properties package on your system which
## provides add-apt-repository command then use the following set of
## commands to add PPA for PHP 7 in your Ubuntu system and install it
RUN rm /var/lib/apt/lists/* -vrf \
    && apt-get clean && apt-get update \
    && apt-get install -yq --fix-missing \
            python-software-properties \
	        software-properties-common \
	&& LC_ALL=C.UTF-8 && add-apt-repository ppa:ondrej/php \
	&& add-apt-repository ppa:ondrej/apache2

RUN apt-get install -yq --force-yes --fix-missing \
        alien \
        cron \
        curl \
        git \
        php7.0-dev \
        pkg-config libssl-dev libsslcommon2-dev \
        && git clone https://github.com/mongodb/mongo-php-driver.git \
        && cd mongo-php-driver \
        && git checkout tags/1.1.9 -b build \
        && git submodule sync && git submodule update --init \
        && phpize && ./configure && make all -j 5 && make install \
        && echo "extension=mongodb.so" >> /etc/php/7.0/apache2/php.ini

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

## Cleanup
RUN apt-get purge -y \
    php7.0-dev

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


COPY ["./etc/cron.d/", "/etc/cron.d/"]
# Give execution rights on the cron job
# Create the log file to be able to run tail
RUN chmod -R 0644 /etc/cron.d/.

ENV PATH="$PATH:/docker/bin/"
WORKDIR /var/www/html/
CMD ["/docker/bin/run-override.sh"]