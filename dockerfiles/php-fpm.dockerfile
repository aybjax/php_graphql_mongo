FROM php:7.4.13-fpm-alpine

WORKDIR /app

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# COPY ./app .