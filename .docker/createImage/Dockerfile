FROM php:8.2-apache

# Active mod_rewrite (utile si tu l'utilises)
RUN a2enmod rewrite

# Installe l'extension pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql
