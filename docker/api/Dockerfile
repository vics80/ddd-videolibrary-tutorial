FROM php:7.4-fpm

WORKDIR /var/www/html/videolibrary/api

RUN apt-get update && apt-get install -y \
    zip \
    vim \
    unzip \
    git \
    curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

RUN usermod -u 1001 www-data

RUN chown -R www-data:www-data /var/www

USER www-data