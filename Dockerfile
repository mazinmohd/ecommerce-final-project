FROM php:8.2-apache

# Enable MySQL support
RUN docker-php-ext-install mysqli

# Copy project into Apache server folder
COPY . /var/www/html/

# Enable Apache rewrite (optional but useful)
RUN a2enmod rewrite

EXPOSE 80