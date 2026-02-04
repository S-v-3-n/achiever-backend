FROM php:8.3-cli

ENV COMPOSER_PLATFORM_PHP=8.3.0

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    librabbitmq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && pecl install amqp \
    && docker-php-ext-enable amqp

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
