# Stage 1
FROM php:8.3-cli AS build

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


RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin \
    --filename=composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --prefer-dist --no-interaction
RUN npm install && npm run build

COPY .env.example .env
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan key:generate

# Stage 2
FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    libpng16-16 \
    libjpeg62-turbo \
    libfreetype6 \
    libzip-dev \
    ca-certificates \
    && rm -rf /var/lib/apt/lists/*

COPY --from=build /app /app
WORKDIR /app
EXPOSE 8100

CMD ["php", "-S", "0.0.0.0:8100", "-t", "public"]
