# Sử dụng image PHP 8.x với các extension cần thiết
FROM php:8.2-fpm

# Cài đặt các dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip
# Cài đặt Node.js và npm
#RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
#    && apt-get install -y nodejs

# Cài đặt Composer trực tiếp
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Cài đặt các extension PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Tạo thư mục làm việc
WORKDIR /var/www

# Sao chép file project vào container
COPY . .

# Cài đặt các thư viện PHP trong Laravel
RUN composer install

# Chạy npm install và build assets
#RUN npm install && npm run build

# Gán quyền cho storage và bootstrap
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Copy file cấu hình Nginx vào container
#COPY ./.docker/server/nginx.conf /etc/nginx/nginx.conf

EXPOSE 80

CMD ["php-fpm"]
