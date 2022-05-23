FROM php:8.1-fpm


RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring pdo_mysql


WORKDIR /app/backend
COPY . .
RUN composer install
Run php artisan migrate --force --seed
EXPOSE 8080

CMD php artisan serve --host=0.0.0.0

