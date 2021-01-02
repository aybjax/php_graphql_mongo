FROM php:7.4.13-fpm-alpine

WORKDIR /app

RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS}
# RUN apk add --upgrade autoconf
RUN apk add openssl
    # libssl-dev libcurl4-openssl-dev 
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN pecl install mongodb
RUN docker-php-ext-enable mongodb
RUN echo "\n" >> "$PHP_INI_DIR/php.ini" && echo "extension=mongodb.so" >> "$PHP_INI_DIR/php.ini"
RUN curl -s -o /usr/local/bin/composer https://getcomposer.org/composer.phar \
    && chmod 0755 /usr/local/bin/composer
# RUN composer require mongodb/mongodb
RUN apk del pcre-dev ${PHPIZE_DEPS}

COPY ./app .