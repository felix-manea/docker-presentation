FROM php:7.2-apache

RUN apt-get install bash

COPY src /var/www/html

WORKDIR /var/www/html
