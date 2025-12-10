#!/usr/bin/env bash

# Example: Install PHP and Composer in a Node.js environment (logic may vary)
# You might need to adjust this based on Render's underlying OS image
sudo apt-get update
sudo apt-get install -y php-cli php-mysql php-curl php-mbstring unzip

# Install Composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"

# Install Laravel dependencies
composer install --no-dev --optimize-autoloader

# Generate key and cache
php artisan key:generate --force
php artisan config:cache
php artisan route:cache