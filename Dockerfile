# ===== PHP Base Image =====
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www/html

# Install system dependencies including PostgreSQL client libraries
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libpq-dev \
    curl \
    && docker-php-ext-install pdo_pgsql pdo_mysql mbstring zip exif \
    && rm -rf /var/lib/apt/lists/*

# Copy project files
COPY . .

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
RUN composer install

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 8000 for artisan serve
EXPOSE 8000

# Start Laravel development server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
