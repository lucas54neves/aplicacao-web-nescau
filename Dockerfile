FROM php:7.4-apache
RUN apt-get update && apt-get install -y
RUN docker-php-ext-install pdo pdo_mysql
