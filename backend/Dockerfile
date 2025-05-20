FROM php:8.2-fpm

# ติดตั้ง dependencies
RUN apt-get update && apt-get install -y \
    build-essential libpng-dev libjpeg-dev libonig-dev libxml2-dev zip unzip git curl

# PHP extensions ที่ Laravel ใช้
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# ติดตั้ง Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install
