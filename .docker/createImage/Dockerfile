FROM php:8.2-apache

# Active mod_rewrite (utile si tu l'utilises)
RUN a2enmod rewrite

# Installe le module SSL
RUN a2enmod ssl
# Activer les modules nécessaires
#RUN a2enmod rewrite ssl

# Installe l'extension pdo_mysql

#COPY apache2_PV.conf /etc/apache2/sites-available/apache2_PV.conf
#RUN a2ensite apache2_PV

RUN docker-php-ext-install pdo pdo_mysql
