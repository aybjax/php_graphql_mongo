FROM php:7.4.13-fpm-alpine

WORKDIR /app

# RUN pecl install mongodb

# RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
#     && apk add openssl libssl-dev libcurl4-openssl-dev \ 
#     && pecl install mongodb && docker-php-ext-enable mongodb \
#     && apk del pcre-dev ${PHPIZE_DEPS} \
#     && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
#     && echo "\n" >> "$PHP_INI_DIR/php.ini" && extension=mongodb.so" >> "$PHP_INI_DIR/php.ini"

###################################
# RUN sudo apk update \
#       fetch http://nl.alpinelinux.org/alpine/v3.7/community/x86_64/APKINDEX.tar.gz \
#       fetch http://nl.alpinelinux.org/alpine/edge/main/x86_64/APKINDEX.tar.gz \
#       fetch http://nl.alpinelinux.org/alpine/edge/community/x86_64/APKINDEX.tar.gz \
#       v3.7.3-183-gcc9ad2b48d [http://nl.alpinelinux.org/alpine/v3.7/community] \
#       v20200626-2349-g06046a5a3e [http://nl.alpinelinux.org/alpine/edge/main] \
#       v20200626-2353-g8dcf96ab2b [http://nl.alpinelinux.org/alpine/edge/community]
RUN sudo apk upgrade

RUN sudo apk --update add \
        php7 \
        php7-bcmath \
        php7-ctype \
        php7-curl \
        php7-fpm \
        php7-gd \
        php7-iconv \
        php7-intl \
        php7-json \
        php7-mbstring \
        php7-mcrypt \
        php7-mysqlnd \
        php7-opcache \
        php7-openssl \
        php7-pdo \
        php7-pdo_mysql \
        php7-pdo_pgsql \
        php7-pdo_sqlite \
        php7-phar \
        php7-posix \
        php7-session \
        php7-soap \
        php7-xml \
        php7-zip


RUN curl -s -o /usr/local/bin/composer https://getcomposer.org/composer.phar \
    && chmod 0755 /usr/local/bin/composerZ

RUN composer require mongodb/mongodb

# COPY ./app .