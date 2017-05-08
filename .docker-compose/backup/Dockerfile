# --------------------------------------------------------------------
# |
# |
# |
FROM ubuntu:latest

MAINTAINER Payam Naderi <naderi.payam@gmail.com>

RUN rm /var/lib/apt/lists/* -vrf \
    && apt-get clean && apt-get update \
    && apt-get install -yq --fix-missing \
            mongodb-clients

COPY ["./sh/*.sh", "/docker/bin/"]

RUN chmod a+x /docker/bin/*.sh \
    ## compatible with windows
    && sed -i -e 's/\r$//' /docker/bin/*.sh \
    && ln -s /docker/bin/dump.sh /usr/local/bin/dump \
    && ln -s /docker/bin/restore.sh /usr/local/bin/restore

ENTRYPOINT ["/bin/sh", "-c", "while true; do sleep 3; done"]
