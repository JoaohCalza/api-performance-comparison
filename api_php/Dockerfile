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

# Copia tudo para dentro do container
COPY . /var/www/html

# A pasta correta do Lumen
WORKDIR /var/www/html/lumen

# Instala dependências
RUN composer install --no-dev --optimize-autoloader

# Garante que existam os diretórios necessários
RUN mkdir -p bootstrap/cache

# Permissões
RUN chown -R www-data:www-data storage bootstrap/cache vendor

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
