FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Instala composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia tudo da pasta api_php
COPY . /var/www/html

# SETA o diretório *dentro da pasta LARAVEL*
WORKDIR /var/www/html/laravel

# Instala as dependências do Laravel
RUN composer install

# Ajusta permissões
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
