FROM php:7.1-apache
RUN docker-php-ext-install pdo pdo_mysql && chmod +w /var/www/html
COPY . /var/www/html/
