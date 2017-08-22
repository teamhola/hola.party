FROM php:7.1-apache
RUN docker-php-ext-install pdo pdo_mysql && chown -R www-data:www-data /var/www/html/
COPY . /var/www/html/
