FROM php:8.0-apache

# Instala as dependências necessárias para o Laravel
RUN apt-get update \
    && apt-get install -y \
        libzip-dev \
        unzip \
    && docker-php-ext-install zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Copia o arquivo php.ini para o container
COPY .docker/php.ini /usr/local/etc/php/

# Define o diretório de trabalho como /var/www/html
WORKDIR /var/www/html

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala o Laravel
RUN composer global require laravel/installer \
    && export PATH="$PATH:$HOME/.composer/vendor/bin" \
    && composer create-project --prefer-dist laravel/laravel .

# Expõe a porta 80 do container
EXPOSE 80

# Inicia o Apache
CMD ["apache2-foreground"]
