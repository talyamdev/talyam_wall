FROM php:8.3.4-apache as main

# Copy composer binary
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Copy the rest of the application
COPY ./ /var/www/html

# Set working directory
WORKDIR /var/www/html

# Update package lists
RUN apt-get update

# Install necessary packages and PHP extensions
RUN apt-get install -y \
    git \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo_mysql

# Create directory for generated classes
RUN mkdir generated-classes

# Install dependencies using Composer
RUN composer install

# Run script to generate database (assuming it's in your project directory)
RUN sh /var/www/html/generate_db.sh

RUN rm generate_db.sh
