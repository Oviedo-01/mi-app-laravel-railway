#!/bin/bash

# 1. Ejecutar migraciones y seeders
php artisan migrate --force
php artisan db:seed --force

# 2. Crear enlaces simbólicos para storage
php artisan storage:link

# 3. Optimizar Laravel
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# 4. Servir la aplicación en Railway
php artisan serve --host=0.0.0.0 --port=$PORT
