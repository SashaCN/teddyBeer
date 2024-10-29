#!/bin/bash

# Install PHP
apt-get update
apt-get install -y php8.2-cli php8.2-fpm php8.2-mbstring php8.2-xml php8.2-zip php8.2-mysql php8.2-curl
php -v

# Run Laravel optimization commands
php artisan config:cache
php artisan route:cache
php artisan view:cache
