FROM php:7.2-apache

MAINTAINER Wilker Andrade Viana <wilker.info@gmail.com>

RUN docker-php-ext-install mysqli

WORKDIR /var/www/html/

COPY . /var/www/html/

EXPOSE 80