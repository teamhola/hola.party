FROM php:7.1-apache
RUN docker-php-ext-install pdo pdo_mysql && mkdir /var/www/html/protected && mkdir /var/www/html/protected/tmp && chmod 777 /var/www/html/protected/tmp/ -R
COPY . /var/www/html/
