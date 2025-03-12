FROM php:8.2-apache

RUN a2enmod rewrite
RUN a2enmod headers
