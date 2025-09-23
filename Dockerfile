FROM php:8.2-cli

# Install estensioni utili
RUN docker-php-ext-install session

WORKDIR /var/www/html
COPY sp/ /var/www/html/

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080", "-t", "/var/www/html"]