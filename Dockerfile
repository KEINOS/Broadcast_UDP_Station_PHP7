FROM php:7-cli-alpine

USER root

RUN php -m | grep sockets || docker-php-ext-install sockets

ARG port_udp_broadcast=5963
ARG name_host_self='broadcaster_php7'
ARG time_interval_send=5

ENV NAME_HOST_SELF=$name_host_self\
    PORT_UDP_BROADCAST=$port_udp_broadcast \
    TIME_INTERVAL_SEND=$time_interval_send

COPY ./broadcaster.php /app/broadcaster.php

ENTRYPOINT [ "/usr/local/bin/php", "/app/broadcaster.php" ]
