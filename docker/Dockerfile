FROM php:8.0-apache

# Instala as dependências necessárias
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    unzip \
    git \
    curl

# Habilita extensões PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql zip opcache && docker-php-ext-enable pdo_mysql

# Instalar o nano
RUN apt-get install nano -y

# Instala o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configura o Apache
RUN a2enmod rewrite

# Define o diretório de trabalho
WORKDIR /var/www/html

# Instala o Composer
RUN composer global require laravel/installer \
    && export PATH="$PATH:$HOME/.composer/vendor/bin"

# Inicia o Apache em modo foreground
CMD ["apache2-foreground"]

EXPOSE 80
