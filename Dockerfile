FROM php:8.2-apache

# Habilita o módulo de reescrita do Apache
RUN a2enmod rewrite

# Instala as extensões necessárias do PHP
RUN docker-php-ext-install pdo pdo_mysql mysqli && docker-php-ext-enable mysqli

# Atualiza os pacotes do sistema
RUN apt-get update && apt-get upgrade -y && apt-get clean

# Adiciona a configuração personalizada do Apache se necessário
# COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

# Copia os arquivos do projeto para o diretório do servidor web
# COPY . /var/www/html
