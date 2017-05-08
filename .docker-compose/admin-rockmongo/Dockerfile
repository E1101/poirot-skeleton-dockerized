# --------------------------------------------------------------------
# |
# | @depends https://github.com/E1101/docker-apache-php5
# |
## TODO using official base images
FROM payam/apache_php5

MAINTAINER Payam Naderi <naderi.payam@gmail.com>

RUN apt-get update
RUN apt-get install -yq --force-yes \
        git \
        php5-dev \
        pkg-config \
        libssl-dev \
        libsslcommon2-dev

RUN pecl install mongo \
    && echo "extension=mongo.so" >> /etc/php5/apache2/php.ini \
    && rm -rf /var/www/html && git clone https://github.com/iwind/rockmongo.git /var/www/html

COPY ["./*.sh", "/"]
COPY ["./config.php", "/var/www/html/config.php"]
RUN chmod a+x /*.sh \
    ## compatible with windows
    && sed -i -e 's/\r$//' /*.sh

## Cleanup
RUN apt-get purge -y \
    && rm -rf /var/lib/apt/lists/*


CMD ["/run-override.sh"]
