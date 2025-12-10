#!/usr/bin/env bash
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link