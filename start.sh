#!/bin/bash

# zorg dat dependencies up-to-date zijn
composer install --no-dev --optimize-autoloader

# app key genereren als die nog niet bestaat
php artisan key:generate || true

# database migraties uitvoeren
php artisan migrate --force

# Laravel server starten (voor dev)
php artisan serve --host=0.0.0.0 --port=8080

php artisan config:clear
php artisan route:clear
php artisan cache:clear