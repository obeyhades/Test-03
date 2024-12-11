FROM php:8.3.14-apache
RUN docker-php-ext-install pdo pdo_mysql    