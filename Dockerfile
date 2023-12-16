FROM php:8.2-apache
RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y && apt-get clean
# COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf
# COPY . /var/www/html
