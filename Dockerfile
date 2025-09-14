# Base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies including PostgreSQL driver
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    curl \
    libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer install
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 8000

# Run migrations and start Laravel server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
