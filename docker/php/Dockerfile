FROM php:7.4-fpm-alpine

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

RUN apk add --no-cache \
    libzip-dev \
    freetype \
    libjpeg-turbo \
    libpng \
    libxml2-dev \
    icu-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && docker-php-ext-configure gd \
    && docker-php-ext-configure zip  \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable gd \
    && docker-php-ext-install pdo pdo_mysql soap intl zip bcmath sockets \
    &&  docker-php-ext-install mysqli && docker-php-ext-enable mysqli \
    && rm -rf /tmp/*

WORKDIR /usr/src/app

COPY ./ /usr/src/app/

# RUN COMPOSER_MEMORY_LIMIT=-1 composer install
