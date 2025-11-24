#!/bin/bash
set -e

echo "Creating directories..."
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p storage/logs
mkdir -p bootstrap/cache
mkdir -p database

echo "Creating database file..."
touch database/database.sqlite

echo "Setting permissions..."
chmod -R 775 storage bootstrap/cache database 2>/dev/null || true

echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "Running migrations..."
php artisan migrate --force

echo "Checking build assets..."
ls -la public/build/ || echo "Build directory not found!"
cat public/build/manifest.json || echo "Manifest not found!"

echo "Testing application..."
php artisan route:list

echo "Testing view rendering..."
php artisan tinker --execute="echo view('landing-v3')->render(); echo PHP_EOL . 'View rendered successfully!' . PHP_EOL;" || echo "View render failed!"

echo "Starting server on port $PORT..."
exec php artisan serve --host=0.0.0.0 --port=$PORT
