FROM php:8.5-apache

RUN a2enmod rewrite
RUN a2enmod headers
