FROM php:7.2-apache

RUN apt-get install bash

WORKDIR /var/www/html

COPY ./src /var/www/html

#docker build -t php-image .
#docker run -p 8080:80 --rm --name php-container php-image