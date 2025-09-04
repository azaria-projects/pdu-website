# Stage 1: Build Stage
FROM php:8.3-cli AS build

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    zip unzip git curl \
    nodejs npm \
    pkg-config \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring zip \
    && rm -rf /var/lib/apt/lists/*


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin \
    --filename=composer

# Set working directory
WORKDIR /app

# Copy app files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --prefer-dist --no-interaction

# Build front-end assets
RUN npm install && npm run build

# Laravel setup (config clear and key generation only)
COPY .env.example .env
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan key:generate

# Stage 2: Production Image
FROM php:8.3-cli

# Install required runtime packages
RUN apt-get update && apt-get install -y \
    libpng16-16 \
    libjpeg62-turbo \
    libfreetype6 \
    libzip-dev \
    ca-certificates \
    && rm -rf /var/lib/apt/lists/*

# Copy built app from the build stage
COPY --from=build /app /app

WORKDIR /app

EXPOSE 8100

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8100"]
