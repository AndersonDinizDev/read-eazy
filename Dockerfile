FROM php:7.4-apache
RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y && apt-get clean
# COPY . /var/www/html