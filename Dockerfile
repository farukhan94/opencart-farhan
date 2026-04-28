FROM php:7.4-apache

# Install required packages and PHP extensions for OpenCart 3
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Setup appropriate document root permissions
RUN chown -R www-data:www-data /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Run composer installation
WORKDIR /var/www/html
# Note: We run this with || true because the vendor folder might be partially present or missing
RUN composer install --no-dev --optimize-autoloader || true
