#!/bin/bash

echo "APP_KEY=${APP_KEY}" >> .env
php artisan config:clear
php artisan config:cache
php artisan migrate --force
php artisan db:seed --class=AdminUserSeeder --force
php artisan serve --host=0.0.0.0 --port=$PORT