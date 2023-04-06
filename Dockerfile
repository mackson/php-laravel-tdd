FROM php:8.0-apache

# Instala as dependências necessárias para o Laravel
RUN apt-get update \
    && apt-get install -y \
        libzip-dev \
        unzip \
    && docker-php-ext-install zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

## Instalar a extensão do MYSQL para PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Instalar o nano
RUN apt-get install nano -y

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite

# Define o diretório de trabalho como /var/www/html
WORKDIR /var/www/html

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala o Composer
RUN composer global require laravel/installer \
    && export PATH="$PATH:$HOME/.composer/vendor/bin"

# Expõe a porta 80 do container
EXPOSE 80

# Inicia o Apache em modo foreground
CMD ["apache2-foreground"]
