# Stage 1: Install Composer Dependencies
FROM composer:2 AS composer-build

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Stage 2: Apache + PHP Environment
FROM php:8.2-apache

RUN a2enmod rewrite

# Install PHP Extensions
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    && docker-php-ext-install pdo_mysql zip

# Copy project files
COPY . /var/www/html

# Copy vendor directory from Composer build stage
COPY --from=composer-build /app/vendor /var/www/html/vendor

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Update Apache DocumentRoot
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
