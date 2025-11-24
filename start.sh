#!/bin/bash

# Criar diretórios necessários
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Criar database se não existir
touch database/database.sqlite

# Ajustar permissões
chmod -R 775 storage bootstrap/cache
chmod 664 database/database.sqlite

# Rodar migrations
php artisan migrate --force

# Limpar e cachear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Iniciar servidor
php artisan serve --host=0.0.0.0 --port=$PORT
