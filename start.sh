#!/bin/bash
set -e

# Criar diretórios necessários
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Criar database se não existir
touch database/database.sqlite

# Ajustar permissões
chmod -R 775 storage bootstrap/cache database 2>/dev/null || true

# Rodar migrations
php artisan migrate --force --isolated

# Iniciar servidor
exec php artisan serve --host=0.0.0.0 --port=$PORT
