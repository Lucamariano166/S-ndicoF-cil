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

echo "Running migrations..."
php artisan migrate --force || echo "Migration failed, continuing..."

echo "Starting server on port $PORT..."
exec php artisan serve --host=0.0.0.0 --port=$PORT
