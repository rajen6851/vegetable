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


# =====================
# Stage 1: Build frontend
# =====================
FROM node:20 AS build-stage
WORKDIR /app

# Copy package.json and install dependencies
COPY package*.json ./
RUN npm install

# Copy rest of frontend files and build assets
COPY . .
RUN npm run build

# =====================
# Stage 2: PHP + Laravel
# =====================
FROM php:8.2-fpm

WORKDIR /var/www/html

# Install PHP extensions + system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libpq-dev \
    unzip \
    git \
    curl \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy Laravel backend code
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy built frontend assets from build-stage
COPY --from=build-stage /app/public/build ./public/build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/build

# Expose port
EXPOSE 8000

# Run migrations and start Laravel server
CMD php artisan migrate --force; php artisan serve --host=0.0.0.0 --port=8000
