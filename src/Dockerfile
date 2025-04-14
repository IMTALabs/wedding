FROM php:8.3-fpm-alpine

# Cài đặt các dependencies cần thiết
RUN apk update && apk add --no-cache \
    zlib-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev

# Cài đặt các extensions PHP cần thiết
RUN apk update && apk add --no-cache mariadb-client
RUN docker-php-ext-install pdo_mysql

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Sao chép các file từ host vào container
COPY .. .

# Cài đặt các dependencies cho Laravel
RUN composer install --no-dev --optimize-autoloader

# Cấp quyền cho thư mục storage và bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

COPY .env .
# Chạy lệnh artisan để tạo key cho ứng dụng
RUN php artisan key:generate

# Exposed port
EXPOSE 9000

# Lệnh để chạy ứng dụng
CMD ["php-fpm"]
