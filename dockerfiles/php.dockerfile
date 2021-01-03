# FROM php:7.4.13-fpm-alpine

# WORKDIR /app

# RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS}
# # RUN apk add --upgrade autoconf
# RUN apk add openssl
#     # libssl-dev libcurl4-openssl-dev 
# RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
# RUN curl -s -o /usr/local/bin/composer https://getcomposer.org/composer.phar \
#     && chmod 0755 /usr/local/bin/composer
# # RUN composer require mongodb/mongodb
# RUN apk del pcre-dev ${PHPIZE_DEPS}

# COPY ./app .

FROM php:7.3-fpm-alpine3.10

RUN apk --update add --no-cache freetype-dev \
    libpng libpng-dev libjpeg-turbo-dev \
    imagemagick-dev \
    libzip-dev zip \
    curl-dev

RUN apk add --no-cache --virtual \
    .phpize-deps $PHPIZE_DEPS \
    && pecl install imagick && docker-php-ext-enable imagick \
    && pecl install redis-5.1.1 && docker-php-ext-enable redis \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-configure gd \
            --with-gd \
            --with-freetype-dir=/usr/include/ \
            --with-png-dir=/usr/include/ \
            --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install curl zip mbstring pdo_mysql gd sockets \
    && apk del .phpize-deps

RUN curl -s -o /usr/local/bin/composer https://getcomposer.org/composer.phar \
    && chmod 0755 /usr/local/bin/composer

RUN curl -LsS https://codeception.com/codecept.phar -o /usr/local/bin/codecept \
    && chmod 0755 /usr/local/bin/codecept

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

WORKDIR /app