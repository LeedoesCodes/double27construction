# syntax=docker/dockerfile:1

# ---------- Stage 1: build front-end assets (Vite + Tailwind) ----------
FROM node:22-alpine AS assets
WORKDIR /app
COPY . .
RUN npm install && npm run build

# ---------- Stage 2: PHP application ----------
FROM php:8.3-cli AS app

# System libraries + PHP extensions Filament / Laravel need
RUN apt-get update && apt-get install -y --no-install-recommends \
        git unzip libzip-dev libpng-dev libjpeg-dev libfreetype6-dev \
        libonig-dev libicu-dev libsqlite3-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" pdo_sqlite zip gd mbstring intl bcmath exif \
    && rm -rf /var/lib/apt/lists/*

# Composer (from the official composer image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# App source + built assets from stage 1
COPY . .
COPY --from=assets /app/public/build ./public/build

# A config file must exist for Composer's post-install artisan scripts.
# Real values are supplied by the platform's env vars / the entrypoint at runtime.
RUN cp .env.example .env

# PHP dependencies (production only)
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Writable dirs + executable entrypoint
RUN chmod +x docker/entrypoint.sh \
    && mkdir -p storage/framework/{cache,sessions,views} storage/logs database \
    && chmod -R 775 storage bootstrap/cache

ENV APP_ENV=production \
    APP_DEBUG=false

EXPOSE 8080
CMD ["sh", "docker/entrypoint.sh"]
