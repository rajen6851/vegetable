# # Base image
# FROM php:8.2-fpm

# # Set working directory
# WORKDIR /var/www/html

# # Install dependencies including PostgreSQL driver
# RUN apt-get update && apt-get install -y \
#     git \
#     unzip \
#     libzip-dev \
#     libpng-dev \
#     libonig-dev \
#     curl \
#     libpq-dev \
#     && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd pdo_pgsql \
#     && apt-get clean && rm -rf /var/lib/apt/lists/*

# # Composer install
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# # Copy project
# COPY . .

# # Install PHP dependencies
# RUN composer install --no-dev --optimize-autoloader

# # Set permissions
# RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# # Expose port
# EXPOSE 8000

# # Run migrations and start Laravel server
# CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000


# # Base image
# FROM php:8.2-fpm

# # Set working directory
# WORKDIR /var/www/html

# # Install dependencies including PostgreSQL driver and Node.js for Vite
# RUN apt-get update && apt-get install -y \
#     git \
#     unzip \
#     libzip-dev \
#     libpng-dev \
#     libonig-dev \
#     curl \
#     libpq-dev \
#     nodejs \
#     npm \
#     && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd pdo_pgsql \
#     && apt-get clean && rm -rf /var/lib/apt/lists/*

# # Composer install
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# # Copy project
# COPY . .

# # Install PHP dependencies
# RUN composer install --no-dev --optimize-autoloader

# # Build frontend assets (CSS/JS)
# RUN npm install && npm run build



# # Set permissions
# RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# # Expose port (Render will map automatically)
# EXPOSE 8000

# # Run migrations and start Laravel server
# CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
# Build stage for Node.js
# FROM node:20 AS node_build
# WORKDIR /app
# COPY package*.json ./
# RUN npm install
# COPY . .
# RUN npm run build

# # Production stage
# FROM php:8.2-fpm
# WORKDIR /var/www/html

# # Install dependencies
# RUN apt-get update && apt-get install -y \
#     git unzip libzip-dev libpng-dev libonig-dev curl libpq-dev \
#     && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd pdo_pgsql \
#     && apt-get clean

# # Install Composer
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# # Copy application
# COPY . .

# # Copy built assets from node_build stage
# COPY --from=node_build /app/public/build ./public/build/

# # Install PHP dependencies
# RUN composer install --no-dev --optimize-autoloader

# # Set permissions
# RUN chown -R www-data:www-data storage bootstrap/cache public/build

# EXPOSE 8000
# Stage 1: Node build (for assets)
FROM node:20 AS build-stage
WORKDIR /app

# Root से package.json copy करो
COPY ../package*.json ./

# Node modules install करो
RUN npm install

# Root से baki source copy करो
COPY ../ ./

# Vite/webpack assets build करो
RUN npm run build

# Stage 2: PHP-FPM
FROM php:8.2-fpm
WORKDIR /var/www/html

# PHP dependencies install करो
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev curl libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd pdo_pgsql \
    && apt-get clean

# Composer install करो
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Laravel source copy करो
COPY ../ ./

# Build stage से assets copy करो
COPY --from=build-stage /app/public/build ./public/build

# Composer dependencies install करो
RUN composer install --no-dev --optimize-autoloader

# Permissions set करो
RUN chown -R www-data:www-data storage bootstrap/cache public/build

# Expose port
EXPOSE 8000

# Server start
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
