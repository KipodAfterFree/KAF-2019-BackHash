FROM php:7.0-apache

COPY src/challenge/ /var/www/html/
RUN chmod 775 /var/www/html -R
RUN chown www-data /var/www/html -R
