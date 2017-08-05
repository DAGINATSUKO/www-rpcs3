FROM php:7.0-apache

RUN a2enmod rewrite
RUN a2enmod headers
