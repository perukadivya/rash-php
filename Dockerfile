FROM composer:2 as deps
WORKDIR /app
COPY composer.json composer.json
RUN composer install --no-dev --optimize-autoloader --no-scripts

FROM php:8.4-apache
RUN apt-get update && apt-get install -y libzip-dev && docker-php-ext-install zip && rm -rf /var/lib/apt/lists/*
RUN a2enmod rewrite

# Set Apache doc root to public/
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Allow .htaccess overrides
RUN echo '<Directory /var/www/html/public>\n    AllowOverride All\n</Directory>' > /etc/apache2/conf-available/laravel.conf && a2enconf laravel

WORKDIR /var/www/html
COPY . .
COPY --from=deps /app/vendor ./vendor

# Create storage directories and set permissions
RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Generate .env and app key
RUN cp .env.example .env && php artisan key:generate

EXPOSE 80
CMD ["apache2-foreground"]
