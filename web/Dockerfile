FROM php:7.2.2-apache
RUN docker-php-ext-install mysqli
RUN apt-get update && apt-get install nano
COPY ./web/ /var/www/html/