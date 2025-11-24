#!/bin/bash
set -e

# Configure APP_URL for Railway
if [ ! -z "$RAILWAY_PUBLIC_DOMAIN" ]; then
    export APP_URL="https://$RAILWAY_PUBLIC_DOMAIN"
    export ASSET_URL="https://$RAILWAY_PUBLIC_DOMAIN"
    echo "Configured APP_URL: $APP_URL"
fi

echo "Creating directories..."
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p storage/logs
mkdir -p bootstrap/cache
mkdir -p database

echo "Creating database file..."
touch database/database.sqlite

echo "Setting permissions..."
chmod -R 777 storage
chmod -R 777 bootstrap/cache
chmod 666 database/database.sqlite 2>/dev/null || true

echo "Verifying storage permissions..."
ls -la storage/framework/

echo "Running migrations first..."
php artisan migrate --force

echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "Checking build assets..."
ls -la public/build/ || echo "Build directory not found!"
cat public/build/manifest.json || echo "Manifest not found!"

echo "Testing application..."
php artisan route:list

echo "Starting queue worker in background..."
php artisan queue:work --daemon --tries=3 --timeout=120 --sleep=3 --max-time=3600 &

echo "Starting server on port $PORT..."
exec php artisan serve --host=0.0.0.0 --port=$PORT
