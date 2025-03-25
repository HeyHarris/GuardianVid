FROM php:8.4-fpm-alpine

# Install system dependencies & PHP extensions
RUN apk add --no-cache \
    nginx \
    wget \
    bash \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    freetype-dev \
    zip \
    unzip \
    curl \
    mysql-client \
    icu-dev \
    libxml2-dev \
    oniguruma-dev \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        intl \
        mbstring \
        xml \
        opcache

# Make nginx run directory
RUN mkdir -p /run/nginx

# Copy nginx config
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Copy app files
RUN mkdir -p /app
COPY . /app
COPY ./src /app

# Install Composer
RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"

# Install PHP dependencies
RUN cd /app && composer install --no-dev --no-interaction

# Set correct permissions
RUN chown -R www-data: /app

# Set working directory
WORKDIR /app

# Startup script
CMD sh /app/docker/startup.sh