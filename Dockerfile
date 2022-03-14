FROM php:7.2-apache
# Install php mysql driver
RUN docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli
# Install php debugger
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
