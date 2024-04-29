# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

ENV COMPOSER_ALLOW_SUPERUSER=1
# Instala las extensiones de PHP necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql
# Actualizar repositorios e instalar dependencias
RUN apt-get update && apt-get install -y \
    libicu-dev \
    git \
    unzip \
    curl \
    gnupg \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

# Habilitar mod_rewrite y headers para .htaccess
RUN a2enmod rewrite headers

# Copia los archivos de tu aplicación a la carpeta /var/www/
COPY . /var/www/
# Ajuste para asegurarse de que Apache sepa sobre la carpeta public/

RUN chown -R www-data:www-data /var/www
RUN sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    gnupg

# Instalar Node.js y npm
RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y nodejs \
    npm 

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json /var/www/html/composer.json

RUN npm install

RUN composer install --no-interaction --no-plugins --no-scripts

RUN cp vendor/codeigniter4/framework/public/index.php public/index.php

RUN cp vendor/codeigniter4/framework/spark spark

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Expone el puerto 80 para acceder a la aplicación desde fuera del contenedor
EXPOSE 80