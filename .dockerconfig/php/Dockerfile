FROM php:fpm

# RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl
RUN docker-php-ext-install bcmath pdo_mysql
# RUN apt-get -y curl
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# WORKDIR /app
# COPY . /app
# RUN composer install

# CMD php artisan serve --host=0.0.0.0 --port=8000
# EXPOSE 8000