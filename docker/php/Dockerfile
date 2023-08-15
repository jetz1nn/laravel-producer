# Use an official PHP-FPM image as the base
FROM php:8.1-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip sockets

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory to /var/www
WORKDIR /var/www/html

# Copy the local codebase into the container
COPY . /var/www/html

# Install application dependencies using Composer
RUN composer install

# Expose port 9000 and start the PHP-FPM server
EXPOSE 9000
CMD ["php-fpm"]