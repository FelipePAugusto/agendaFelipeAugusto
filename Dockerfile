FROM php:latest
RUN apt-get update -y && apt-get install -y openssl zip unzip
RUN docker-php-ext-install pdo_mysql
ENV APT_KEY_DONT_WARN_ON_DANGEROUS_USAGE=DontWarn
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /app
COPY . /app
RUN composer install --no-interaction --ansi
RUN composer dump-autoload
CMD php artisan serve --host=0.0.0.0 --port=8080
EXPOSE 8080