FROM php:8.1-apache

RUN docker-php-ext-install -j$(nproc) pdo_mysql

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git && \
    apt-get install -y libxml2-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN /usr/sbin/a2enmod rewrite
COPY docker/dev/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN chmod -R 765 /var/www/html


WORKDIR /var/www/html
