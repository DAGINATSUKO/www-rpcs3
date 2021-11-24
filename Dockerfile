FROM php:7.4-apache

RUN a2enmod rewrite
RUN a2enmod headers
